<?php

include('system/config.php');
include('system/Crypto.php');




if(@$_GET['securityKey'] == '2c61ebff5a7f675451467527df66788d'){

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
    

    $db = new TradingBot();

    // TRADINGVIEW'dan gelen bilgiler


    $api = new Crypto("CGN067Y27OLO2SxNwUwVkn0a1GlO","yn2E0MqDWGQbE7KSzCFHuH5KBcHNrW");
    $buy = json_decode($api->buyMarket(11,'DOGEUSDT'));
    
   if($buy->status){ 
       $db->createOrder($bot->symbol,"BUY",$buy->dolarFiyat,$buy->symbolPrice,$buy->alimAdet, $bot->userId, $signalId);
       $db->createLog($buy->Info,$bot->userId);
       sendMessage("\xF0\x9F\x9A\xA8 Alış Sinyali TEST \xF0\x9F\x9A\xA8 \n\n\n \xE2\xAC\x86 #".$bot->symbol." Paritesinde ".$buy->symbolPrice." Fiyatından Alım Yapıldı!");
   }
 



}else{

    echo 'Erişim izniniz yok!';

    exit;

}

