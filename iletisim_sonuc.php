<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Frameworks/PHPMailer/src/Exception.php';
require 'Frameworks/PHPMailer/src/PHPMailer.php';
require 'Frameworks/PHPMailer/src/SMTP.php';

if(isset($_POST["IsimSoyisim"])){
    $GelenIsimSoyisim = Guvenlik($_POST["IsimSoyisim"]);
}else{
    $GelenIsimSoyisim = "";
}
if(isset($_POST["EmailAdresi"])){
    $GelenEmailAdresi = Guvenlik($_POST["EmailAdresi"]);
}else{
    $GelenEmailAdresi = "";
}

if(isset($_POST["TelefonNumarasi"])){
    $GelenTelefonNumarasi= Guvenlik($_POST["TelefonNumarasi"]);
}else{
    $GelenTelefonNumarasi = "";
}

if(isset($_POST["Mesaj"])){
    $GelenMesaj= Guvenlik($_POST["Mesaj"]);
}else{
    $GelenMesaj = "";

}

if(($GelenIsimSoyisim!="") and ($GelenEmailAdresi!="") and ($GelenTelefonNumarasi!="") and ($GelenMesaj!="")){

    $MailIcerigiHazirla = "Isim Soyisim : " .$GelenIsimSoyisim . "<br /> E-Mail Adresi : " . $GelenEmailAdresi . "<br /> Telefon Numarası : " .$GelenTelefonNumarasi . "<br /> Mesaj : " . $GelenMesaj;
    $mail = new PHPMailer(true);

    try{
    $mail->isSMTP();
    $mail->SMTPKeepAlive = true;
    $mail->SMTPAuth = true;
    $mail -> CharSet = 'UTF-8';
    $mail->SMTPSecure = 'tls'; //ssl
    
    $mail->Port = 587; //25 , 465 , 587
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    
$mail->Host = "smtp.gmail.com";

$mail->Username = DonusumleriGeriDondur($SiteEmailAdresi);
$mail->Password = DonusumleriGeriDondur($SiteEmailSifresi);
$mail->setFrom(DonusumleriGeriDondur($SiteEmailAdresi), DonusumleriGeriDondur($SiteAdi));
$mail->addAddress(DonusumleriGeriDondur($SiteEmailAdresi), DonusumleriGeriDondur($SiteAdi));
$mail->addReplyTo($GelenEmailAdresi , $GelenIsimSoyisim);
$mail->isHTML(true);
$mail->MsgHTML($MailIcerigiHazirla);
$htmlicerik ='
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        *{margin: 0;padding: 0; }
        .wrap{
            font-family: helvetica;
            background-image: linear-gradient(45deg, #4abb10, white); 
            background-size: cover;
            background-position: center;
            padding: 50px;
        }
        .inner{
            text-align: center;
            line-height: 21px;
            color: #333;
            letter-spacing: 1.4px;
        }
        .top{
            font-weight: bold;
            font-size: 29px;
            font-style: italic;
            color: #111;
        }
        .middle p{
            line-height: 21px;
            font-size: 14px;
            padding: 30px;
            font-weight:600;
        }
        .middle a{
            width: 120px;
            margin: 0px auto;
            outline: none;
            text-decoration: none;
            line-height: 35px;
            transition: all 0.2s ease-in;
            color:black;


        }
        .middle a:hover{

        }
        .bottom{
            padding: 30px;
            letter-spacing: 1.1px;
            font-size: 11px;
        }
        .bottom a{
            color: #007cc0;
        }
    </style>
</head>
<body style="background-image: linear-gradient(45deg, #4abb10, white); padding-bottom:10%; padding-top:10%">
    <div class="wrap">
        <div class="inner">
        <div class="top">
            Mailiniz Başarılı Bir Şekilde Gönderilmiştir
        </div>
            <div class="bottom">
                 <a href="index.php" style="font-size:20px;"> ANASAYFAYA YÖNLENDİRMEK İÇİN TIKLAYINIZ.  </a>
            </div>
        </div>
    </div>
</body>
</html>
';
if ($mail->send()){
   
    echo $htmlicerik;
}
else{
    echo "Maalesef olmadı.";
}
}catch(Exception $e){
    echo 'Mail Gönderim Hatası <br /> Hata Açıklaması : ' , $mail->ErrorInfo;
  }
}





?>