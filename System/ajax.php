<?php
require("config.php");
$api = new TradingBot();
$response = [];
 if ($_POST) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                if (isset($_SERVER['HTTP_REFERER'])) {
                    $process = $_POST['type'];
                    switch ($process) {
                        case 'loginUser':
                            $md5 = md5($_POST['password']);
                            $username = htmlspecialchars($_POST['username']);
                            $userQ = json_encode($db->query("SELECT username,id,isActive FROM users WHERE username = '{$username}' AND password = '{$md5}' ")->fetch(PDO::FETCH_ASSOC));
                            if (json_decode($userQ) && json_decode($userQ)->isActive == 1) {
                                $response["loginStatus"] = true;
                                $_SESSION['isLogin'] = true;
                                $_SESSION['userId'] = json_decode($userQ)->id;
                                $_SESSION['username'] = json_decode($userQ)->username;

                                 
                                setcookie("loginCredentials", md5(json_decode($userQ)->username), time() * 60,"/"); // Expiring after 2 hours
                                
                            }else{
                                $response["loginStatus"] = false;
                            }

                            echo json_encode($response,true);
                             
                        break;
                        
                        case 'createBot':
                              $res = json_decode($api->createBot($_POST['symbolC'],$_POST['qtyC'],$_POST['userIds']));
                              if($res->response == true){
                                $response["response"] = true;
                                $response["Info"] = "Başarıyla oluşturuldu.";
                              }else{
                                $response["response"] = false;
                              }
                              echo json_encode($response,true);
                        break;


                        case 'updateBot':
                            $id = $_POST['botId'];
                            if($_POST['status'] == 'active'){
                               
                                $userQ = json_encode($db->query("update bot set isActive = 1 where id = '{$id}' ")->fetch(PDO::FETCH_ASSOC));
                            }else{
                                $userQ = json_encode($db->query("update bot set isActive = 0 where id = '{$id}' ")->fetch(PDO::FETCH_ASSOC));
                            }
                            $response["response"] = true;
                            echo json_encode($response,true);
                            break;

                            case 'deleteBot':
                                 
                             
                                    $query = $db->prepare("DELETE FROM bot WHERE id = :id");
                                    $delete = $query->execute(array(
                                       'id' => $_POST['botId']
                                    ));
                                    if($delete){
                                        $response["response"] = true;
                                        $api->updateBotHakki($_POST['userId'],'up');
                                    }
                            
                                echo json_encode($response,true);
                                break;

                         case 'borsaEkle':
                            $id = $_POST['userId'];
                           
                            if($_POST['islem'] == "free"){
                                $userQ = $db->prepare("UPDATE users SET
                                apiKey = :apiKey,
                                keySecret = :keySecret
                                WHERE id = :id");
                                $update = $userQ->execute(array(
                                    "apiKey" => "",
                                    "keySecret" => "",
                                    "id" => $id 
                                ));
                            
                            if($update){
                                $response["response"] = true;
                            }
                            }else{
                                $apikey = $_POST['apikey'];
                                $secretKey = $_POST['secretKey'];
                                if($_POST['apikey'] != "" && $_POST['secretKey'] != "" && $id != ""){
                                    $userQ = $db->prepare("UPDATE users SET
                                        apiKey = :apiKey,
                                        keySecret = :keySecret
                                        WHERE id = :id");
                                        $update = $userQ->execute(array(
                                            "apiKey" => $apikey,
                                            "keySecret" => $secretKey,
                                            "id" => $id 
                                        ));
                                    
                                    if($update){
                                        $response["response"] = true;
                                    }
                                }
                            }
                               
                                echo json_encode($response,true);
                            break;
                    }
                }
            }
        }
    }
}