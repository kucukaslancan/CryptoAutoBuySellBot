<?php
function sendMessage( $messaggio) {
    $token = "";
    $chatID = "";
     

    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=" . urlencode($messaggio)."&parseMode=Markdown";
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}



// ALIM ESAJI
//$msg= "\xF0\x9F\x9A\xA8 ALIŞ SİNYALİ  \xF0\x9F\x9A\xA8 \n\n\n \xE2\xAC\x86 #DOGEUSDT Paritesinde 0,0056845 Fiyatından 10,55458$ Alım Yapıldı!";

// SATIM ESAJI
$msg= "\xF0\x9F\x9A\xA8 SATIŞ SİNYALİ  \xF0\x9F\x9A\xA8 \n\n\n \xE2\xAC\x87 #DOGEUSDT Paritesinde 0,## Fiyatından ##$ Satış Yapıldı!";


 sendMessage("\xF0\x9F\x9A\xA8 ALIŞ SİNYALİ  \xF0\x9F\x9A\xA8 \n\n\n \xE2\xAC\x86 #DOGEUSDT Paritesinde 0,## Fiyatından ##$ Alım Yapıldı!");
