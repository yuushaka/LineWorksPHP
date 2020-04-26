# LineWorksPHP
LineWorksのトークボットを作成するためのPHPライブラリ
　
## 💬 Usage

`$ git clone https://github.com/yuushaka/LineWorksPHP.git`

オウム返しのソースコード例
```
<?php
//ライブラリの読み込み
require("/LineWorksPHP/vendor/autoload.php");
use LineWorks\Service\TalkBot;

//LineWorksで取得した情報
$at = __LW_Authorization__;
$ck =  __LW_consumerKey__;
$api_id = __LW_apiId__;

//APIのURL(突如変更になることがあるので注意が必要)
$apiUrl = "https://apis.worksmobile.com/r/{$api_id}/message/v1/bot/".Config::get("app.LW_botNo2")."/message/push";

//トークボットを作る
$TalkBot = new TalkBot($at,$ck);

//トークボットへのcallbackを取得(メッセージとか...)
$callback = $TalkBot->callback();

//相手のアカウントID・メッセージを取得
$accountId = $callback->source->accountId;
$message = $callback->content->text;

//相手に返す内容を作成
$content = array(
"type" => "text",
"text" => $message,
);

//相手に返すための下処理
$TalkBot->create($apiUrl,Config::get("app.LW_botNo2"),"accountId",$accountId,$content);

//LineWorksへpost
$TalkBot->post();

```
## :tada: ね？簡単でしょ？
恐れることは何もありません...

あ、JWTとかJWSには一切対応していないので、固定IPタイプ専用になってます...。

時間があれば、対応できるようにしようかなーって思ってます。 
