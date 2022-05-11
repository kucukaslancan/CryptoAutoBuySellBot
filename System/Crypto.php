<?php
include 'vendor/autoload.php';

class Crypto{
    private $api;
    public $response;
    protected $result = [];

    function __construct($apiKey,$apiSecret) {
        $this->api = new Binance\API($apiKey,$apiSecret);
        $this->api->useServerTime();
    }

    // get coin price realtime
    function getSymbolPrice($symbol)
    {
        $this->response = $this->api->price($symbol);
        return $this->response;
    }

    // get binance account's info
    function getAccountInfo()
    {
        $this->response = $this->api->account();
        return $this->response;
    }

    // get symbol balances
    function getSymbolBalances($symbol)
    {
        $symbol = str_replace('USDT','',$symbol);
        $balances =  $this->api->balances();
        foreach ($balances as $balance => $value) {
            if($balance == $symbol){
                $this->response = intval($value['available'],0);
            }
        }
        return $this->response;
    }

 

    // ALIM İŞLEMİ - MARKET
    function buyMarket($qty,$symbol)
    {
        $symbolPrice = $this->getSymbolPrice($symbol);
        $buyCoinLimit = intval($qty / $symbolPrice,0);
        $this->response  = json_encode($this->api->buy($symbol, $buyCoinLimit, 0, "MARKET",['newOrderRespType' => 'ACK']));
        $parseRes = json_decode($this->response);
        if($parseRes->orderId != null){
            $this->result = 
            [
                'status' => true,
                'orderId' => $parseRes->orderId,
                'clientOrderId' => $parseRes->clientOrderId,
                'Info' => $buyCoinLimit." Adet ".$symbol." ".$symbolPrice."$ Fiyatından Alındı"
            ]; 
        }else{
            $this->result = 
            [
                'status' => false,
                'orderId' => $parseRes->orderId,
                'clientOrderId' => $parseRes->clientOrderId,
                'Info' => 'Alım yapılırken bir sorun oluştu.'
            ]; 
        }
        return json_encode($this->result);
    }

    // SATIM İŞLEMİ - MARKET
    function sellMarket($symbol)
    {
        $neKadarSatilacak = $this->getSymbolBalances($symbol);
        $flags = ['newOrderRespType' => 'ACK'];
        $this->response  = json_encode($this->api->order('SELL', $symbol, $neKadarSatilacak,0,'MARKET', $flags));
        $parseRes = json_decode($this->response);
        if($parseRes->orderId != null){
            $this->result = 
            [
                'status' => true,
                'orderId' => $parseRes->orderId,
                'clientOrderId' => $parseRes->clientOrderId,
                'Info' => $neKadarSatilacak." Adet ".$symbol." Satıldı"
            ]; 
        }else{
            $this->result = 
            [
                'status' => false,
                'orderId' => $parseRes->orderId,
                'clientOrderId' => $parseRes->clientOrderId,
                'Info' => 'Alım yapılırken bir sorun oluştu.'
            ]; 
        }
        return json_encode($this->result);
    }

}