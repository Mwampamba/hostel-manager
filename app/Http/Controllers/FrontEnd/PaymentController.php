<?php

namespace App\Http\Controllers\FrontEnd;

use Throwable;
use Omnipay\Omnipay;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId('Ae2sJBCK9x0UDfDDDMa7iQCFAjgeXDh0GXxGaxM09OfUa09ogCnyUMlYQ6Xm_jQlTuSAISPkLTf0YfFO');
        $this->gateway->setSecret('EO48znXDlLmOHD8SwM3P7L9xdGOt74lT6BoWqHXyRcyCPXZl5imIa_dvHBhiRuHcckbNukkhs2vtLsIz');
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {

        try {

            $response = $this->gateway->purchase([
                'amount' => $request->price,
                'currency' => 'USD',
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ])->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }

    public function success(Request $request)
    {
        $random_transaction_id = Str::random(10);

        if ($request->student_id && $request->price && $request->check_in && $request->check_out && $request->room) {
            $transaction = $this->gateway->completePurchase([
                'payer_id' => $request->student_id,
                'transactionReference' => $random_transaction_id
            ]);

            $response = $transaction->send();

            dd($response);

            if ($response->isSuccessful()) {
                $arr = $response->getData();

                $payment = new Payment();
                $payment->student_id = $arr['payer']['payer_info']['payer_id'];
                $payment->transaction_ID = $random_transaction_id;
                $payment->total_amount = $arr['transactions'][0]['amount']['total'];
                $payment->payment_mode = 'PayPal';

                $payment->save();

                return redirect()->back()->with('success', 'Booking has been completed successfully!');
            } else {
                return $response->getMessage();
            }
        }

        return redirect()->back()->with('error', 'You have to login in first');
    }
    public function error()
    {
        return redirect()->back()->with('error', 'You have cancelled the payment proccess');
    }
}
