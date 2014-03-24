<?php
$url = 'https://android.googleapis.com/gcm/send';
$serverApiKey = "Your_server_API_key"; # см. регистрацию приложения
$reg = "Your_registration_key"; # сюда поставить Registration key, который выведется в логе при регистрации клиента в GCM

$headers = array(
    'Content-Type:application/json',
    'Authorization:key=' . $serverApiKey
);

$data = array(
    'registration_ids' => array($reg),
    'data' => array(
        'message' => 'Hello, World!'
));

print (json_encode($data) . "\n\n");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
if ($headers)
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);

curl_close($ch);
print ($response);

?>
