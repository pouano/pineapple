<?php

//　初期設定１
$shopgaiyou = "
-----------------------
NexSeed
Vein Carry Asia Pte. Ltd (Singapore)
本社所在地：東京都渋谷区道玄坂一丁目14番6号 渋谷ヒューマックスビル3階
mail:　vca-support@veincarry.jp

" ; //ショップ概要

$bodycontent = (

htmlspecialchars(($_SESSION['postdatacontact']['name']), ENT_QUOTES, 'UTF-8'). " 様\n
ーー This is an automated mail ー please do not reply ーー\n
ーーこのメールは自動送信メールですーー\n
この度は、NexSeedウェブサイトをご覧いただきありがとうございます。\n
お客様からご送信いただきました、お問い合わせ内容は以下の通りです。
弊社にて確認後、スタッフから折り返し連絡させていただきますので、今しばらくお待ちください。
なお、返信には時間がかかる場合がございます。
また、数日たっても返信がない場合は受信エラーの場合がございますので、
お手数ですが、vca-support@veincarry.jp 宛に直接メールをご送信ください。
\n
▼ご送信内容
================================================================
お名前     -" . htmlspecialchars(($_SESSION['postdatacontact']['name']), ENT_QUOTES, 'UTF-8') . "様
電話番号        -" . htmlspecialchars(($_SESSION['postdatacontact']['tel']), ENT_QUOTES, 'UTF-8') . "
メールアドレス        -" . htmlspecialchars(($_SESSION['postdatacontact']['mail']), ENT_QUOTES, 'UTF-8') . "
カウンセリング希望日程
第1希望      -" . htmlspecialchars(($_SESSION['postdatacontact']['firstyear']), ENT_QUOTES, 'UTF-8') ."年　". htmlspecialchars(($_SESSION['postdatacontact']['firstmonth']), ENT_QUOTES, 'UTF-8')  ."月　".  htmlspecialchars(($_SESSION['postdatacontact']['firstday']), ENT_QUOTES, 'UTF-8') ."日　". htmlspecialchars(($_SESSION['postdatacontact']['firsttime']), ENT_QUOTES, 'UTF-8') . "時
第2希望      -" . htmlspecialchars(($_SESSION['postdatacontact']['secondyear']), ENT_QUOTES, 'UTF-8') ."年　". htmlspecialchars(($_SESSION['postdatacontact']['secondmonth']), ENT_QUOTES, 'UTF-8')  ."月　".  htmlspecialchars(($_SESSION['postdatacontact']['secondday']), ENT_QUOTES, 'UTF-8') ."日　". htmlspecialchars(($_SESSION['postdatacontact']['secondtime']), ENT_QUOTES, 'UTF-8') . "時
第3希望      -" . htmlspecialchars(($_SESSION['postdatacontact']['thirdyear']), ENT_QUOTES, 'UTF-8') ."年　". htmlspecialchars(($_SESSION['postdatacontact']['thirdmonth']), ENT_QUOTES, 'UTF-8')  ."月　".  htmlspecialchars(($_SESSION['postdatacontact']['thirdday']), ENT_QUOTES, 'UTF-8') ."日　". htmlspecialchars(($_SESSION['postdatacontact']['thirdtime']), ENT_QUOTES, 'UTF-8') . "時
面談方法  （skype）      -" . htmlspecialchars(($_SESSION['postdatacontact']['skype']), ENT_QUOTES, 'UTF-8') . "
面談方法  （直接面談）      -" . htmlspecialchars(($_SESSION['postdatacontact']['face']), ENT_QUOTES, 'UTF-8') . "
SkypeID      -" . htmlspecialchars(($_SESSION['postdatacontact']['skypeid']), ENT_QUOTES, 'UTF-8') . "
予定留学期間" . htmlspecialchars(($_SESSION['postdatacontact']['wishyear']), ENT_QUOTES, 'UTF-8') ."年　". htmlspecialchars(($_SESSION['postdatacontact']['wishmonth']), ENT_QUOTES, 'UTF-8')  ."月頃　".  htmlspecialchars(($_SESSION['postdatacontact']['wishweek']), ENT_QUOTES, 'UTF-8') ."週間
カウンセリングに関する要望-" . htmlspecialchars(($_SESSION['postdatacontact']['demand']), ENT_QUOTES, 'UTF-8') . "
お問い合わせ内容（その他コメント）-" . htmlspecialchars(($_SESSION['postdatacontact']['comment']), ENT_QUOTES, 'UTF-8') . "
================================================================\n
\n
\n
" . $shopgaiyou . "\n
\n


");
?>