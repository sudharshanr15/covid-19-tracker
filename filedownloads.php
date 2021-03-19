<?php
$fileUrl = "https://api.covid19india.org/csv/latest/case_time_series.csv";
$saveTo = __DIR__."\\records\\dailyrecords.csv";
$fp = fopen($saveTo, 'w+');
// if($fp === false){
//     throw new Exception('Could not open: ' . $saveTo);
// }
$ch = curl_init($fileUrl);

//Pass our file handle to cURL.
curl_setopt($ch, CURLOPT_FILE, $fp);

//Timeout if the file doesn't download after 20 seconds.
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//Execute the request.
curl_exec($ch);

//If there was an error, throw an Exception
// if(curl_errno($ch)){
//     throw new Exception(curl_error($ch));
// }

//Get the HTTP status code.
$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//Close the cURL handler.
curl_close($ch);

//Close the file handler.
fclose($fp);

// if($statusCode == 200){
//     echo 'Downloaded!';
// } else{
//     echo "Status Code: " . $statusCode;
// }

$fileUrl = "https://api.covid19india.org/csv/latest/state_wise_daily.csv";
$saveTo = __DIR__."\\records\\states.csv";
$fp = fopen($saveTo, 'w+');
// if($fp === false){
//     throw new Exception('Could not open: ' . $saveTo);
// }
$ch = curl_init($fileUrl);

//Pass our file handle to cURL.
curl_setopt($ch, CURLOPT_FILE, $fp);

//Timeout if the file doesn't download after 20 seconds.
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//Execute the request.
curl_exec($ch);

//If there was an error, throw an Exception
// if(curl_errno($ch)){
//     throw new Exception(curl_error($ch));
// }

//Get the HTTP status code.
$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//Close the cURL handler.
curl_close($ch);

//Close the file handler.
fclose($fp);

// if($statusCode == 200){
//     echo 'Downloaded!';
// } else{
//     echo "Status Code: " . $statusCode;
// }