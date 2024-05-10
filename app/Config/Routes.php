<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/dashboard', 'Dashboard::index');

//Reporte maquina
$routes->get('reporte-maquina', 'ReporteMaquinaController::index');
$routes->get('reporte-maquina/generarReporte', 'ReporteMaquinaController::generarReporte');

//Control de bultos
$routes->get('bultos', 'BultosController::index');
$routes->get('bultos/nuevo', 'BultosController::create');
$routes->post('bultos/store', 'BultosController::store');

//Pedidos Corte
$routes->get('pedidos', 'PedidosController::index');

//Bultos Reporte
$routes->get('bultos/reporte', 'BultosController::reporte');

//Cortes Defectos
$routes->get('corte/registrar-defectos', 'CorteController::registrarDefectos');
$routes->get('corte/ver-registro', 'CorteController::verRegistro');
$routes->post('corte/store', 'CorteController::store');

//Repartidores
$routes->get('repartidor', 'RepartidorController::index');
$routes->get('repartidor/nuevo', 'RepartidorController::create');
$routes->post('repartidor/store', 'RepartidorController::store');

//Cortes
$routes->get('cortes/nuevo', 'CorteController::create');
$routes->post('cortes/store', 'CorteController::storeNuevo');

//Maquina
$routes->get('maquina', 'MaquinaController::index');
$routes->get('maquina/nuevo', 'MaquinaController::create');
$routes->post('maquina/store', 'MaquinaController::store');

//Linea de Produccion
$routes->get('linea', 'LineaProduccionController::index');
$routes->get('linea/nuevo', 'LineaProduccionController::create');
$routes->post('linea/store', 'LineaProduccionController::store');
