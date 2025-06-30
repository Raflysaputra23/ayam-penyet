<?php 

require_once dirname(__FILE__) . '/midtrans/Midtrans.php'; 
$data = json_decode(file_get_contents('php://input'), true);
//SAMPLE REQUEST START HERE

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-jC0wBbVI9Xlg4STOaYujaUBb';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;



$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => intval($data["totalHarga"]["total"]),
    ),
    'item_details' => $data["dataProduk"],
    'customer_details' => array(
        'first_name' => $data["dataUser"]["Username"],
        'email' => $data["dataUser"]["Email"],
        'phone' => $data["dataUser"]["NoTelp"],
    ),
);


$snapToken = \Midtrans\Snap::getSnapToken($params);
echo $snapToken;