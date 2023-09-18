<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/booking_service', 'BookingService::index');
$routes->get('/booking_service/booking', 'BookingService::booking');
$routes->post('/api/v1/ddms/token', 'EndPointMotoran::generate_token');
$routes->post('/api/v1/ddms/booking/setstatus', 'EndPointMotoran::booking_setstatus');
$routes->post('/api/v1/ddms/booking/information-detail', 'EndPointMotoran::information_detail');
$routes->post('/api/v1/ddms/booking/checkout', 'EndPointMotoran::booking_checkout');
$routes->post('/api/v1/ddms/booking/pay', 'EndPointMotoran::booking_pay');
$routes->get('/service/payment-notification', 'EndPointMotoran::payment_notification');
// $routes->get('/service/payment-notification/pay', 'EndPointMotoran::booking_notification');
