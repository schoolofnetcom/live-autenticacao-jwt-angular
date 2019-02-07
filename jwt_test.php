<?php
//header.payload.signature

//header
$header = [
    'alg' => 'HS256', //HMAC - SHA256
    'typ' => 'JWT'
];

$header_json = json_encode($header);
$header_base64 = base64_encode($header_json);
echo "Cabecalho JSON: $header_json";
echo "\n";
echo "Cabecalho JWT: $header_base64";

$payload = [
    'first_name' => 'Luiz',
    'last_name' => 'Diniz',
    'email' => 'argentinaluiz@gmail.com',
    'exp' => (new \DateTime())->getTimestamp()
];

echo "\n\n";

$payload_json = json_encode($payload);
$payload_base64 = base64_encode($payload_json);
echo "Payload JSON: $payload_json";
echo "\n";
echo "Payload JWT: $payload_base64";

$key = '7869876sfgsjhkgsdfkjhg868976xzvczx1111';

echo "\n\n";

$signature = hash_hmac('sha256', "$header_base64.$payload_base64", $key, true);
$signature_base64 = base64_encode($signature);

echo "Signature RAW: $signature";
echo "\n";
echo "Signature JWT: $signature_base64";

$token = "$header_base64.$payload_base64.$signature_base64";
echo "\n\n";
echo "TOKEN: $token";