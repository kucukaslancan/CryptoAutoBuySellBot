<?php
session_start();
try {
     $db = new PDO("mysql:host=localhost;dbname=crypto", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}


class TradingBot{
     public $response = [];
     protected $db;

     function __construct() {
          global $db;
          $this->db =  $db;
      }

     // Order Oluştur
     function createOrder($type,$qty,$userId)
     {
          global $db;
          $tarih = date('Y-m-d H:i:s');
          $query = $db->prepare("INSERT INTO orders SET
          orderType = ?,
          orderAmount = ?,
          orderDate = ?,
          userId=?");
          $insert = $query->execute(array(
               $type, $qty, $tarih,$userId
          ));

     }

     // Create Log
     function createLog($info, $userId)
     {
          global $db;
          $tarih = date('Y-m-d H:i:s');
          $query = $db->prepare("INSERT INTO log SET
          logDesc = ?,
          logDate = ?,
          userId = ?");
          $insert = $query->execute(array(
               $info, $tarih, $userId
          ));

     }

     // Aktif botları belirlenen coine göre getir
     function getActiveBotsForSymbol($symbol)
     {
          global $db;
          $userQ = $this->db->query("select u.id as userId,b.symbol,b.qty,u.apiKey,u.keySecret from users u left join bot b ON b.userId = u.id where b.isActive = 1 and b.symbol='{$symbol}'")->fetchAll(PDO::FETCH_ASSOC);
          if ( $userQ ){
               $this->response = $userQ;
          }
          return $this->response;
     }

     // Borsa tanımlı mı
     function isBinance($id)
     {
     
          global $db;
          $userQ = json_encode($db->query("SELECT apiKey,keySecret FROM users WHERE id = '{$id}' ")->fetch(PDO::FETCH_ASSOC));
          if (json_decode($userQ)->apiKey != "" && json_decode($userQ)->keySecret != "" ) {
               $this->response = [
                    'response' => true,
                    'Info' => "Borsa tanımlı!" 
               ];
          }else{
               $this->response = [
                    'response' => false,
                    'Info' => "Borsa API bilgileri tanımlı değil! \n Lütfen Borsa Ayarları sekmesinden Binance API bilgilerini giriniz!" 
               ];
          }
          return json_encode($this->response);
     }


     // Giriş Kontrolü 
     function isLogined()
     {
          $md5Key = md5($_SESSION['username']);
          if($_COOKIE['loginCredentials'] != $md5Key){
               if (isset($_SERVER['HTTP_COOKIE'])) {
                    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
                    foreach($cookies as $cookie) {
                        $parts = explode('=', $cookie);
                        $name = trim($parts[0]);
                        setcookie($name, '', time()-1000);
                        setcookie($name, '', time()-1000, '/');
                    }
               }
               header('location:login.php');
          }
     }

     // Mevcut bot hakkı
     function botHakki($id)
     {
          global $db;
          $userQ = $db->query("SELECT botHakki FROM users WHERE id = '{$id}' ")->fetch(PDO::FETCH_ASSOC);
          return $userQ['botHakki'];
     }

     function updateBotHakki($id,$durum)
     {
          global $db;
          $mevcutHak = $this->botHakki($id);
          if($durum == "up"){
               $guncelHak = $mevcutHak + 1;
          }else{
               $guncelHak = $mevcutHak - 1;
          }
          
          $query = $db->prepare("UPDATE users SET
               botHakki = :botHakki
               WHERE id = :id");
               $update = $query->execute(array(
                    "botHakki" => $guncelHak,
                    "id" => $id
               ));
     }

     function aktifBot($id)
     {
          global $db;
          $userQ = $db->query("SELECT count(id) as botCount FROM bot WHERE userId = '{$id}' and isActive = '1' ")->fetch(PDO::FETCH_ASSOC);
          return $userQ;
     }
     
    function getUserBots($id)
    {
     global $db;
     $userQ = json_encode($db->query("SELECT * FROM bot WHERE userId = '{$id}'")->fetchAll(PDO::FETCH_ASSOC));
     return json_decode($userQ);
    }

     function getUserOrder($userId,$count)
     {
          global $db;
          $userQ = json_encode($db->query("SELECT * FROM orders WHERE userId = '{$userId}' order by id desc LIMIT 5")->fetchAll(PDO::FETCH_ASSOC));
          return json_decode($userQ);
     }

     function getUserInfo($userId)
     {
          global $db;
          $userQ = json_encode($db->query("SELECT * FROM users WHERE id = '{$userId}'")->fetchAll(PDO::FETCH_ASSOC));
          return json_decode($userQ);
     }
    

     // Bot oluştur 
     function createBot($symbol,$qty,$userId)
     {
          global $db;
       if(json_decode($this->botHakki($userId)) > 0)
       {

      
          if($symbol != "" && $qty >= 10 && $userId != "")
          {
               $tarih = date('Y-m-d H:i:s');
               $query = $db->prepare("INSERT INTO bot SET
                    symbol = ?,
                    qty = ?,
                    isActive = ?,
                    userId=?,
                    startDate=?");
                    $insert = $query->execute(array(
                         $symbol, $qty, 1,$userId,$tarih
                    ));
                    if ( $insert ){
                         $this->response = [
                              'response' => true,
                              'Info' => "Bot başarıyla oluşturuldu." 
                         ];
                      $this->updateBotHakki($userId,"down");
                    }else{
                         $this->response = [
                              'response' => false,
                              'Info' => "Hata Oluştu!" 
                         ];
                    }
          }

       }else{
          $this->response = [
               'response' => false,
               'Info' => "Bot Hakkınız bulunmuyor!" 
          ];
       }
          return json_encode($this->response);
     }

}


?>