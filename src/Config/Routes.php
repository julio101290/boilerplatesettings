<?php

$routes->group('admin', function ($routes) {

     $routes->resource('settings', [
        'filter'     => 'permission:settings-permissions',
        'namespace'  => 'julio101290\boilerplatesettings\Controllers',
        'controller' => 'BaseController',
    ]);


    /**
     * Save Settings Route
     */
    $routes->post('settings/save', 'SettingsController::save');
});
