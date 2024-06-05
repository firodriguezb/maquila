<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/dashboard', 'Dashboard::index');

//Control de bultos
$routes->get('bultos', 'ControlBultosController::index');
$routes->get('bultos/nuevo', 'ControlBultosController::create');
$routes->post('bultos/store', 'ControlBultosController::store');
$routes->get('bultos/editar/(:num)', 'ControlBultosController::editar/$1');
$routes->post('bultos/actualizar/(:num)', 'ControlBultosController::actualizar/$1');
$routes->get('bultos/eliminar/(:num)', 'ControlBultosController::eliminar/$1');
$routes->get('bultos/reporte-excel', 'ControlBultosController::generarReporteExcel');
// $routes->get('bultos', 'BultoCorteController::index');
// $routes->get('bultos/nuevo', 'BultoCorteController::create');
// $routes->post('bultos/store', 'BultoCorteController::store');
// $routes->get('bultos/editar/(:num)', 'BultoCorteController::editar/$1');
// $routes->post('bultos/actualizar/(:num)', 'BultoCorteController::actualizar/$1');
// $routes->get('bultos/eliminar/(:num)', 'BultoCorteController::eliminar/$1');
// $routes->get('bultos/reporte', 'BultoCorteController::reporte');

//Pedidos Corte
$routes->get('pedidos', 'PedidosController::index');

//Cortes Defectos
$routes->get('corte/registrar-defectos', 'CorteController::registrarDefectos');
$routes->post('corte/store', 'CorteController::store');

//Repartidores
$routes->get('repartidor', 'RepartidorController::index');
$routes->get('repartidor/nuevo', 'RepartidorController::create');
$routes->post('repartidor/store', 'RepartidorController::store');

//Cortes
$routes->get('cortes', 'CorteController::index');
$routes->get('cortes/nuevo', 'CorteController::create');
$routes->get('cortes/editar/(:num)', 'CorteController::editar/$1');
$routes->post('cortes/actualizar/(:num)', 'CorteController::actualizar/$1');
$routes->get('cortes/eliminar/(:num)', 'CorteController::eliminar/$1');
$routes->post('cortes/store', 'CorteController::storeNuevo');
$routes->get('cortes/reporte-excel', 'CorteController::generarReporteExcel');

//Maquina
$routes->get('maquina', 'MaquinaController::index');
$routes->get('maquina/nuevo', 'MaquinaController::create');
$routes->get('maquina/editar/(:num)', 'MaquinaController::editar/$1');
$routes->post('maquina/actualizar/(:num)', 'MaquinaController::actualizar/$1');
$routes->get('maquina/eliminar/(:num)', 'MaquinaController::eliminar/$1');
$routes->post('maquina/store', 'MaquinaController::store');
$routes->get('maquina/reporte-excel', 'MaquinaController::generarReporteExcel');

//Mantenimiento
$routes->get('mantenimiento', 'MantenimientoController::index');
$routes->get('mantenimiento/nuevo', 'MantenimientoController::create');
$routes->get('mantenimiento/editar/(:num)', 'MantenimientoController::editar/$1');
$routes->post('mantenimiento/actualizar/(:num)', 'MantenimientoController::actualizar/$1');
$routes->get('mantenimiento/eliminar/(:num)', 'MantenimientoController::eliminar/$1');
$routes->post('mantenimiento/store', 'MantenimientoController::store');
$routes->get('mantenimiento/reporte-excel', 'MantenimientoController::generarReporteExcel');

//Linea de Produccion
$routes->get('linea', 'LineaProduccionController::index');
$routes->get('linea/nuevo', 'LineaProduccionController::create');
$routes->post('linea/store', 'LineaProduccionController::store');

//Operaciones
$routes->get('operacion', 'OperacionController::index');
$routes->get('operacion/nuevo', 'OperacionController::create');
$routes->post('operacion/store', 'OperacionController::store');
$routes->get('operacion/editar/(:num)', 'OperacionController::editar/$1');
$routes->post('operacion/actualizar/(:num)', 'OperacionController::actualizar/$1');
$routes->get('operacion/eliminar/(:num)', 'OperacionController::eliminar/$1');
