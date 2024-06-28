<?php

// PANGGIL SEMUA FILE YANG ADA DI DALAM FOLDER CORE
spl_autoload_register( function($class) {
	require_once __DIR__.'/core/'.$class.'.php';
});