<?php

// echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
//         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOVlxNJ1AqALCeNnqGz4hKiMpE7j6Facw&amp;language=pt"></script>
//         <script src="maps.google.polygon.containsLatLng.js"></script>';

require_once('service/vendor/autoload.php');

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

date_default_timezone_set('America/Sao_Paulo');

    $signer = new Sha256();

    $token = (new Builder())->setIssuer('lavamosnos.co')
                                ->set('dthm', date('YmdH'))
                                ->set('csm', 'laundry')
                                ->set('mod', 'user')
                                ->sign($signer, 'bG4tYXBwcw==')
                                ->getToken();

    echo $token;


// echo base64_encode('ln-apps-wam');

// $header = [
//             'typ'   =>  'JWT',
//             'alg'   =>  'HS256'
//           ];

// $header = base64_encode(json_encode($header));

// $payload = [
//             'iss'     =>  'lavamosnos.co',
//             'type'    =>  'serviço',
//             'name'    =>  'Chris'
//           ];

// $payload = base64_encode(json_encode($payload));


// $signature = hash_hmac('sha256', "$header.$payload", "bob-esponja", true);

// $signature = base64_encode($signature);


// echo "$header.$payload.$signature";
 

