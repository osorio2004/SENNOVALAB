<?php
return [
    "/" => [
        "controller" => 'App\Controllers\Homecontroller',
        "action" => 'index'
    ],
    '/home' => [
        "controller" => 'App\Controllers\Homecontroller',
        "action" => 'index'
    ],
    '/hello' => [
        "controller" => 'App\Controllers\Homecontroller',
        "action" => 'saludar'
    ],
    '/proyecto/index' => [
        "controller" => 'App\Controllers\ProyectoController',
        "action" => 'index'
    ],
    '/proyecto/view' => [
        "controller" => 'App\Controllers\ProyectoController',
        "action" => 'view'
    ],
    '/proyecto/new' => [
        "controller" => 'App\Controllers\ProyectoController',
        "action" => 'newProyecto'
    ],
    '/proyecto/create' => [
        "controller" => 'App\Controllers\ProyectoController',
        "action" => 'createProyecto'
    ],
    '/proyecto/view/(\d+)' => [
        "controller" => 'App\Controllers\ProyectoController',
        "action" => 'viewProyecto'
    ],
    '/proyecto/edit/(\d+)' => [
        "controller" => 'App\Controllers\ProyectoController',
        "action" => 'editProyecto'
    ],
    '/proyecto/update' => [
        "controller" => 'App\Controllers\ProyectoController',
        "action" => 'updateProyecto'
    ],
    '/proyecto/delete/(\d+)' => [
        "controller" => 'App\Controllers\ProyectoController',
        "action" => 'deleteProyecto'
    ],
    '/usuario/index' => [
        "controller" => 'App\Controllers\UsuarioController',
        "action" => 'index'
    ],
    '/usuario/view' => [
        "controller" => 'App\Controllers\UsuarioController',
        "action" => 'view'
    ],
    '/usuario/new' => [
        "controller" => 'App\Controllers\UsuarioController',
        "action" => 'newUsuario'
    ],
    '/usuario/create' => [
        "controller" => 'App\Controllers\UsuarioController',
        "action" => 'createUsuario'
    ],
    '/usuario/view/(\d+)' => [
        "controller" => 'App\Controllers\UsuarioController',
        "action" => 'viewUsuario'
    ],
    '/usuario/edit/(\d+)' => [
        "controller" => 'App\Controllers\UsuarioController',
        "action" => 'editUsuario'
    ],
    '/usuario/update' => [
        "controller" => 'App\Controllers\UsuarioController',
        "action" => 'updateUsuario'
    ],
    '/usuario/delete/(\d+)' => [
        "controller" => 'App\Controllers\UsuarioController',
        "action" => 'deleteUsuario'
    ],
    '/tipoUsuario/index' => [
        "controller" => 'App\Controllers\TipoUsuarioController',
        "action" => 'index'
    ],
    '/tipoUsuario/view' => [
        "controller" => 'App\Controllers\TipoUsuarioController',
        "action" => 'view'
    ],
    '/tipoUsuario/new' => [
        "controller" => 'App\Controllers\TipoUsuarioController',
        "action" => 'newTipoUsuario'
    ],
    '/tipoUsuario/create' => [
        "controller" => 'App\Controllers\TipoUsuarioController',
        "action" => 'createTipoUsuario'
    ],
    '/tipoUsuario/view/(\d+)' => [
        "controller" => 'App\Controllers\TipoUsuarioController',
        "action" => 'viewTipoUsuario'
    ],
    '/tipoUsuario/edit/(\d+)' => [
        "controller" => 'App\Controllers\TipoUsuarioController',
        "action" => 'editTipoUsuario'
    ],
    '/tipoUsuario/update' => [
        "controller" => 'App\Controllers\TipoUsuarioController',
        "action" => 'updateTipoUsuario'
    ],
    '/tipoUsuario/delete/(\d+)' => [
        "controller" => 'App\Controllers\TipoUsuarioController',
        "action" => 'deleteTipoUsuario'
    ],
    '/registroIngreso/index' => [
        "controller" => 'App\Controllers\RegistroIngresoController',
        "action" => 'index'
    ],
    '/registroIngreso/view' => [
        "controller" => 'App\Controllers\RegistroIngresoController',
        "action" => 'view'
    ],
    '/registroIngreso/new' => [
        "controller" => 'App\Controllers\RegistroIngresoController',
        "action" => 'newRegistroIngreso'
    ],
    '/registroIngreso/create' => [
        "controller" => 'App\Controllers\RegistroIngresoController',
        "action" => 'createRegistroIngreso'
    ],
    '/registroIngreso/view/(\d+)' => [
        "controller" => 'App\Controllers\RegistroIngresoController',
        "action" => 'viewRegistroIngreso'
    ],
    '/registroIngreso/edit/(\d+)' => [
        "controller" => 'App\Controllers\RegistroIngresoController',
        "action" => 'editRegistroIngreso'
    ],
    '/registroIngreso/update' => [
        "controller" => 'App\Controllers\RegistroIngresoController',
        "action" => 'updateRegistroIngreso'
    ],
    '/registroIngreso/delete/(\d+)' => [
        "controller" => 'App\Controllers\RegistroIngresoController',
        "action" => 'deleteRegistroIngreso'
    ],
    '/controlProgreso/index' => [
        "controller" => 'App\Controllers\ControlProgresoController',
        "action" => 'index'
    ],
    '/controlProgreso/view' => [
        "controller" => 'App\Controllers\ControlProgresoController',
        "action" => 'view'
    ],
    '/controlProgreso/new' => [
        "controller" => 'App\Controllers\ControlProgresoController',
        "action" => 'newControlProgreso'
    ],
    '/controlProgreso/create' => [
        "controller" => 'App\Controllers\ControlProgresoController',
        "action" => 'createControlProgreso'
    ],
    '/controlProgreso/view/(\d+)' => [
        "controller" => 'App\Controllers\ControlProgresoController',
        "action" => 'viewControlProgreso'
    ],
    '/controlProgreso/edit/(\d+)' => [
        "controller" => 'App\Controllers\ControlProgresoController',
        "action" => 'editControlProgreso'
    ],
    '/controlProgreso/update' => [
        "controller" => 'App\Controllers\ControlProgresoController',
        "action" => 'updateControlProgreso'
    ],
    '/controlProgreso/delete/(\d+)' => [
        "controller" => 'App\Controllers\ControlProgresoController',
        "action" => 'deleteControlProgreso'
    ],
    '/login/init' => [
        "controller" => 'App\Controllers\LoginController',
        "action" => 'initLogin'
    ],
    '/login/test' => [
        "controller" => 'App\Controllers\LoginController',
        "action" => 'testBcrypt'
    ],
    '/login/logout' => [
        "controller" => 'App\Controllers\LoginController',
        "action" => 'LogoutLogin'
    ],
    '/register/new' => [
        "controller" => 'App\Controllers\RegisterController',
        "action" => 'newUsuario'
    ],
    '/usuario/create' => [
        "controller" => 'App\Controllers\RegisterController',
        "action" => 'createUsuario'
    ],
];
