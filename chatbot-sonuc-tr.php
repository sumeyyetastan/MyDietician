<?php
 
$name = $_POST['kullanici_gonder'];

$time2= date("H:i:s");
$htmlContent = '
<html>
<head>
<style>
.container {
    border: 2px solid #dedede;
    background-image: linear-gradient(45deg, transparent, #c4d8a7 )
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
  }
  
  .darker {
    border-color: #ccc;
    background-color: #ddd;
  }
  
  .container::after {
    content: "";
    clear: both;
    display: table;
  }
  
  .container img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
  }
  
  .container img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
  }
  
  .time-right {
    float: right;
    color: #aaa;
  }
  
  .time-left {
    float: left;
    color: #999;
  }
</style>
</head>
<body>

<div class="container">
<img src="assets/images/user.png"  style="width:100%;">
  <p> '.$name.'</p>

  <span class="time-right">'.$time2.'</span>
</div>
';

echo shell_exec("C:/xampp/htdocs/odev-sevval/chat-tr.py  $name");
$time= date("H:i:s");
$dosya = fopen('chat2.txt','r');
$dosya_boyutu = filesize('chat2.txt');
$oku = fread($dosya, $dosya_boyutu);
fclose($dosya);

$htmlicerik='
<div class="container darker">
<img src="assets/images/chatbot-logo-dialog.png " class="right"  style="width:100%;">
  <p> '.$oku.' </p>
  <span class="time-left">'.$time.'</span>
 </div>

</body>
</html>
';


echo $htmlContent;
echo $htmlicerik;
 
?>
