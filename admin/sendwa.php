<?php
    require_once('koneksi.php');
    require_once('ultramsg.class.php'); // if you download ultramsg.class.php
        
    $token="4bg79ah0sc4um523"; // Ultramsg.com token
    $instance_id="instance43915"; // Ultramsg.com instance id
    $client = new UltraMsg\WhatsAppApi($token,$instance_id);
        
    $to="089518068400"; 
    $body="Hello world"; 
    $api=$client->sendChatMessage($to,$body);
    print_r($api);
?>