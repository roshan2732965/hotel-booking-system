<?php

    // Dashboard
    Route::resource('/','DashboardController');

    // Clients
    Route::resource('clients','ClientsController');
    Route::get('/clients/data','ClientsController@data')->name('clients.data');

    // Rooms
    Route::resource('rooms','RoomController');

    //Booking
    Route::resource('enquiries','EnquiryController');
    Route::get('enquiry/status/{id}','EnquiryController@status')->name('enquiry.status');

    //Notes
    Route::resource('notes','NoteController');
    Route::get('note/status/{id}','NoteController@status')->name('note.status');


    // Bookings
    Route::resource('booking','BookingController');

    // Payments
    Route::resource('payment','PaymentController');

    // Cancel Bookings
    Route::post('booking/{room_id}/{booking_id}','BookingController@cancel')->name('booking.cancel');

    // Canceled Bookings
    Route::get('bookings/canceled','BookingController@canceledBookings')->name('booking.canceled');

    // Sessions
    Route::get('/login','SessionsController@create')->name('login');
    Route::post('/login','SessionsController@store');
    Route::get('/logout','SessionsController@destroy');

    // User
    Route::get('/user','UserController@index');

    Route::get('/room/available','RoomController@availableRooms');

    Route::get('/room/not-available','RoomController@bookedRooms');

    Route::post('/clients/search','ClientsController@searchClient');