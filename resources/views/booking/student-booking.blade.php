@include('front-includes.header')
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home')}}">Hostel Manager</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="navbar-brand" aria-current="page" href="{{ route('createStudentBooking')}}">Booking |</a>
            </li>
            <li class="nav-item">
              <a class="navbar-brand" href="#">Gallery |</a>
            </li>
            @if(Session::has('student'))
              <li class="nav-item">
                <a class="navbar-brand" href="{{ route('studentLogout')}}">Sign out</a>
            @else
            <li class="nav-item">
              <a class="navbar-brand" href="{{ route('registerStudent')}}">Sign up</a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
      <!-- Booking Form -->
      <div class="container my-4">
          <h2 class="text-left">Book your room here</h2>
          <hr>
          @if(Session::has('success'))
          <div class="row">
            <div class="alert alert-success col-md-9 mb-3" role="alert">{{ Session::get('success') }}</div>
          </div>  
          @endif
          @if(Session::has('error'))
          <div class="row">
            <div class="alert alert-danger col-md-9 mb-3" role="alert">{{ Session::get('error') }}</div>
          @endif
          <form action="{{ route('savePayment')}}" method="POST">
            <input type="hidden" name="price" value="{{ $room_price->price }}">
            <input type="hidden" name="student_id" id="student" class="student" value="{{ session('data') }}" required >
            @error('student')
            <small class="text-danger student">{{ $message }}</small>
            @enderror
              @csrf
              <div class="row">
                <div class="col-md-8 mb-3">
                    <label>Check-in date<span class="text-danger"> *</span></label>
                    <input type="date" name="check_in" id="check_in" class="form-control form-control-lg checkin-date" required />
                    @error('check_in')
                    <small class="text-danger checkin-date">{{ $message }}</small>
                    @enderror 
                </div> 
                <div class="col-md-8 mb-3">
                    <label>Check-out date<span class="text-danger"> *</span></label>
                    <input type="date" name="check_out" id="check_out" class="form-control form-control-lg checkout-date" required />
                    @error('check_out')
                    <small class="text-danger checkout-date">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-8 mb-3">
                    <label for="">Select available rooms<span class="text-danger"> *</span></label>
                    <select name="room" id="room" class="form-control form-control-lg room-list selection" required>
                        <option value="">Select room name</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                    @error('room')
                    <small class="text-danger room">{{ $message }}</small>
                     @enderror
                </div>
                <!-- PayPal Button Will Load Here  -->
                <div id="paypal-button-container" class="col-md-8 mb-3">
                    <button type="submit" class="btn btn-primary">Book now</button>
                </div>
              </div>
          </form>
      </div>
      <!-- Gallery -->
      <div class="container my-4">
        <h2 class="text-left">Rooms gallery</h2>
        <hr>
        <div class="row my-4">
          @foreach ($rooms as $room)
          <div class="col-md-3">
            <div class="card">
              <h5 class="card-header">{{ $room->name }}</h5>
              <div class="card-body">
                @if($room->room_images)
                  @foreach($room->room_images as $index => $image)
                  <a href="{{asset($image->image_path)}}" data-lightbox="{{$room->id}}">
                    @if($index > 0)
                      <img class="img-fluid hide-image rounded" src="{{asset($image->image_path)}}" style="width:235px;height:200px" /></a>
                    @else
                    <img class="img-fluid rounded" src="{{asset($image->image_path)}}" style="width:235px;height:200px" /></a>
                    @endif
                    @endforeach
                @else
                    <h5>No image were added!</h5>
                @endif
              </div>
            </div>
          </div>
          @endforeach
      </div>
    </div>


    <!-- PAY PAL -->
{{-- <script>
	function getCookie(name) {
    let cookieValue = null;
    if (document.cookie && document.cookie !== '') {
        const cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i].trim();
            // Does this cookie string begin with the name we want?
            if (cookie.substring(0, name.length + 1) === (name + '=')) {
                cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                break;
            }
        }
    }
    return cookieValue;
}

var student = "{{ session('data') }}";
var amount_paid = "{{ $room_price->price }}";
var payment_mode = 'PayPal';

var payment_url = "{{ url ('http://127.0.0.1:8000/student/add-booking') }}";
var redirect_url = "{{ url ('http://127.0.0.1:8000') }}";

	// Render the PayPal button into #paypal-button-container
	paypal.Buttons({

    onClick(){

      var student = $('#student').val();
      var check_in = $('#check_in').val();
      var check_out = $('#check_out').val();
      var room = $('#room').val();

      if (room.length == 0){
        $('.room').text('*Room field required!');
      }
      else{
        $('.room').text('');
      } 
       if (check_in.length == 0){
        $('.checkin-date').text('*Check-in date required!');
      }
      else{
        $('.checkin-date').text('');
      } 
       if (check_out.length == 0){
        $('.checkout-date').text('*Check-out date required!');
      }else{
        $('.checkout-date').text('');
      } 
       if (student.length == 0){
        $('.student').text('*Please login first before booking!');
      }
      else{
        $('.student').text('');
      } 
       if (room.length == 0 || check_in.length == 0 || check_out.length == 0 || student.length == 0){
        return false;
      }
    },

		style: {
			color: 'blue',
			shape: 'rect',
			label: 'pay',
			height: 40
		},

		// Set up the transaction
		createOrder: function(data, actions) {

			return actions.order.create({
				purchase_units: [{
					amount: {
						value: amount_paid,
					}
				}]
			});
		},

    onApprove: function(data, actions) {
			return actions.order.capture().then(function(details) {
        // console.log(amount_paid, student, payment_mode, details.id, redirect_url);
				sendDataFromPayPal();
				function sendDataFromPayPal(){
					fetch(payment_url, {
						method: "POST",
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						body: JSON.stringify({
							'student': student,
              'total_amount': amount_paid,
              'transaction_id': details.id,
              'payment_mode': payment_mode,
						}),
					})
				  .then((response) => response.json())
				  .then(() => {
						window.location.href = redirect_url;
					});
				}
			});
		}
    }).render('#paypal-button-container');

</script> --}}

@include('front-includes.footer')