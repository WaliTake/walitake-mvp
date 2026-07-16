<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Consulta real a la base de datos de Supabase (PostgreSQL)
    $row = DB::selectOne('SELECT version()');
    $version = $row->version ?? 'desconocida';

    return view('welcome', [
        'dbMensaje' => 'Hola desde la BD — PostgreSQL ' . $version,
    ]);
});