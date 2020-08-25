<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://app-pertades.aplikasiku.online/Cronjob/hitung_keuntungan");
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);

curl_close($ch);
?>