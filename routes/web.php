<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\{
    HomeController,
    StudentRegistrationController,
    StudentBookingController,
    PaymentController
};
use App\Http\Controllers\Admin\{
    DormitoryController,
    RoomController,
    Authentication,
    UserController,
    StudentController,
    BookingController,
    
};
#FRONTEND
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
});
#DORMITORY
Route::controller(DormitoryController::class)->group(function () {
    Route::get('admin/doms', 'index')->name('dormitories');
    Route::get('admin/dom/add-dormitory', 'add_new_dormitory')->name('addDormitory');
    Route::post('admin/dom/add-dormitory', 'save_dormitory')->name('saveDormitory');
    Route::get('admin/dom/{dom_id}', 'edit_dormitory');
    Route::put('admin/dom/{dom_id}', 'update_dormitory');
    Route::get('admin/dom/delete-dom/{dom_id}', 'destroy');
});
#ROOM
Route::controller(RoomController::class)->group(function () {
    Route::get('admin/rooms', 'index')->name('rooms');
    Route::get('admin/room/add-room', 'add_new_room')->name('addRoom');
    Route::post('admin/room/add-room', 'save_room')->name('saveRoom');
    Route::get('admin/room/view/{room_id}', 'view_room_details');
    Route::get('admin/room/{room_id}', 'edit_room');
    Route::put('admin/room/{room_id}', 'update_room');
    Route::get('admin/room/delete-image/{image_id}', 'delete_product_image');
    Route::get('admin/room/delete-room/{room_id}', 'destroy');
});
#STUDENT-BOOKING
Route::controller(StudentBookingController::class)->group(function () {
    Route::get('pay', 'create_student_booking')->name('createStudentBooking');
    // Route::post('student/add-booking', 'save_student_booking')->name('saveStudentBooking');
    Route::get('student/available-rooms/{checkin_date}', 'available_rooms');
});
#PAYMENT
Route::controller(PaymentController::class)->group(function () {
    Route::post('pay', 'pay')->name('savePayment');
    Route::get('success', 'success');
    // Route::get('error', 'error');
});
#ADMIN-BOOKING
Route::controller(BookingController::class)->group(function () {
    Route::get('admin/bookings', 'index')->name('bookings');
    Route::get('admin/bookings/{booking_id}', 'view_booking_details');
    Route::get('admin/add-booking', 'create')->name('createBooking');
    Route::post('admin/add-booking', 'save')->name('saveBooking');
    Route::get('admin/available-rooms/{checkin_date}', 'available_rooms');
});
#STAFF
Route::controller(UserController::class)->group(function () {
    Route::get('admin/', 'dashboard')->name('dashboard');
    Route::get('admin/dashboard', 'dashboard')->name('dashboard');
    Route::get('admin/users', 'index')->name('users');
    Route::get('admin/user/add-user', 'add_new_user')->name('addUser');
    Route::post('admin/user/add-user', 'save_user')->name('saveUser');
    Route::get('admin/user/{user_id}', 'edit_user');
    Route::put('admin/user/{user_id}', 'update_user');
    Route::get('admin/user/delete-user/{user_id}', 'destroy');
    #PROFILE
    // Route::get('/admin/profile/{staff_id}', [UserController::class, 'profile']);
    // Route::put('/admin/profile/{staff_id}', [UserController::class, 'profile_update']);
    #LOGOUT
    Route::get('admin/logout', [UserController::class, 'logout'])->name('staffLogout');
});
#MANAGE-STUDENT 
Route::controller(StudentController::class)->group(function () {
    Route::get('admin/students', 'index')->name('students');
    Route::get('admin/student/{student_id}', 'view_student_details');
    Route::get('admin/student/delete-student/{student_id}', 'destroy');
});
#STUDENT-REGISTRATION
Route::controller(StudentRegistrationController::class)->group(function () {
    Route::get('student/registration', 'register_student')->name('registerStudent');
    Route::post('student/registration', 'save_student')->name('saveStudent');
    Route::get('student/logout', 'student_logout')->name('studentLogout');
});

#STAFF-AUTHENTICATION
Route::controller(Authentication::class)->group(function () {
    Route::get('login', 'get_login')->name('getLogin');
    Route::post('login', 'post_login')->name('postLogin');
    Route::get('forgot-password', 'get_forgot_password')->name('getForgotPassword');
    Route::post('forgot-password', 'post_forgot_password')->name('postForgotPassword');
    Route::get('reset-password/{token}', 'reset_password')->name('resetPassword');
    Route::put('update-password', 'update_password')->name('updatePassword');
});