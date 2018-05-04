<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/key', function() {
    return str_random(32);
});

$router->group(['prefix'=>'ota-blue-api'], function () use ($router){
    $router->get('reservations',
        'ReservationController@showAllReservations'
    );
  
    $router->get('new_reservations',
        'ReservationController@showNewReservations'
    );

    $router->get('reservations/{id}', 
        'ReservationController@showOneReservation'
    );

    $router->post('reservations', 
        'ReservationController@create'
    );

    $router->put('reservations/{id}', 
        'ReservationController@update'
    );

    $router->delete('reservations/{id}', 
        'ReservationController@delete'
    );

    //===================Invoices=======================//

    $router->get('invoices',
        'InvoiceController@showAllInvoices'
    );

    $router->get('invoices/{id}', 
        'InvoiceController@showOneInvoice'
    );

    $router->post('invoices', 
        'InvoiceController@create'
    );

    $router->put('invoices/{id}', 
        'InvoiceController@update'
    );

    $router->delete('invoices/{id}', 
        'InvoiceController@delete'
    );

    //====================Review==================//

    $router->get('reviews',
        'ReviewController@showAllreviews'
    );

    $router->get('reviews/{id}', 
        'ReviewController@showOneInvoice'
    );

    $router->post('reviews', 
        'ReviewController@create'
    );

    $router->put('reviews/{id}', 
        'ReviewController@update'
    );

    $router->delete('reviews/{id}', 
        'ReviewController@delete'
    );
});




//Github webhook1
$router->post('deploy', 'DeployController@deploy');

//Refresh Hook DO NOT TOUCH
$router->get('refresh', 'RefreshController@refresh');