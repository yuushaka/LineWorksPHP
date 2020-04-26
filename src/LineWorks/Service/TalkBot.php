<?php
  //LineWorksPHP v1.0.0
  namespace LineWorks\Service;

  class TalkBot
  {
    //
    private $_RequestHeader = array();
    private $_MessageData = array();
    private $_ApiUrl;
    private $_CB_accountid;
    private $_CB_message;

    //LineWoksPHPを生成
    public function __construct($lw_authorization,$lw_consumerkey) {
      $this->_RequestHeader = [
        "Authorization: Bearer ".$lw_authorization,
        "consumerKey: ".$lw_consumerkey,
        "Content-Type: application/json",
      ];
    }

    //LineWoksに投げつける準備
    public function create($apiUrl,$botNo,$IdType,$Id,$content){
      $this->_MessageData = array(
        "botNo"=>$botNo,
        $IdType=>$Id,
        "content"=>$content
      );
      $this->_ApiUrl = $apiUrl;
    }

    //LineWoksへ投げつけるやつ
    public function post(){
      $data_json = json_encode($this->_MessageData);
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HTTPHEADER,$this->_RequestHeader);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_URL, $this->_ApiUrl);
      $result=curl_exec($ch);
      curl_close($ch);
      echo $result;
    }

    //LineWoksからのコールバック
    public function callback(){
      $data = file_get_contents('php://input');
      return json_decode($data);
    }
  }
