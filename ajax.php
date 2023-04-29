<?php
// < GET通信編 >
if(isset($_GET["url"]) && preg_match("/^https?:/",$_GET["url"])){
    
// 1. curlの処理を始めるためのコネクションを開く
$get_curl = curl_init();

//$get_http_url = 'https://you-ranking.com/';
    $get_http_url = $_GET["url"];

// 2. HTTP通信のRequest-設定情報をSetする
curl_setopt($get_curl, CURLOPT_URL, $get_http_url); // url-setting
curl_setopt($get_curl, CURLOPT_CUSTOMREQUEST, "GET"); // メソッド指定 Ver. GET
curl_setopt($get_curl, CURLOPT_HTTPHEADER, array("Content-type: text/plain")); // HTTP-HeaderをSetting
curl_setopt($get_curl, CURLOPT_SSL_VERIFYPEER, false); // サーバ証明書の検証は行わない。
curl_setopt($get_curl, CURLOPT_SSL_VERIFYHOST, false);  
curl_setopt($get_curl, CURLOPT_RETURNTRANSFER, true); // レスポンスを文字列で受け取る
curl_setopt($get_curl, CURLOPT_HTTPHEADER, ['User-Agent: AppleWebKit/10000']);
// 3. curl(HTTP通信)を実行する => レスポンスを変数に入れる
$get_response = curl_exec($get_curl);

// 4. HTTP通信の情報を得る
$get_http_info = curl_getinfo($get_curl);

// 5. curlの処理を終了 => コネクションを切断
curl_close($get_curl);

// 6. レスポンスを出力する
//var_export($get_response);
// < 出力結果 >

// '{
//     "userId": 1,
//     "id": 1,
//     "title": "delectus aut autem",
//     "completed": false
//   }' 
    
    echo $get_response;
}else{
    echo "error";
}