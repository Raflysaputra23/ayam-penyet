<?php 

// MEMBUAT SESSION
if (empty(session_id())) session_start();

// MEMANGGIL FILE INIT
require_once 'app/init.php';

// MEMANGGIL FILE UTAMA
if (file_exists('app/core/App.php')) {
 	new App();
 } 