<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/booking_service', 'BookingService::index');
$routes->get('/booking_service/booking', 'BookingService::booking');
$routes->post('/api/v1/ddms/booking/setstatus', 'EndPoint::booking_setstatus');
$routes->post('/api/v1/ddms/booking/information-detail', 'EndPoint::information_detail');
