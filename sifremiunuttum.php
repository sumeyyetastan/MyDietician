<?php
ob_start();
include("Ayarlar/ayar.php");
include("Ayarlar/sitesayfalari.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/*
require 'Frameworks/PHPMailer/src/Exception.php';
require 'Frameworks/PHPMailer/src/PHPMailer.php';
require 'Frameworks/PHPMailer/src/SMTP.php';
*/
 ?>
<div class="welcome-area" id="welcome">

            <div class="header-text">
                <div class="container">
                    <div class="row">
                        
                          <div style="display:block;" id="" class="modallogin">

                            <form class="modallogin-content animate" action="" method="post">
                            <div class="imgcontainer">
                                
                                <img src="icon/chatbot-customer-icon.png" alt="Avatar" class="avatar">
                            </div>

                            <div class="container">
                                <label for="uname"><b>Email</b></label>
                                <input type="text" placeholder="Enter Username" name="emailyenile" required>

                                



                                <button  name="login" type="submit" class="loginbtn">Reset Your Password</button>
                                <label>
                                
                                </label>
                            </div>

                                <div class="container" style="background-color:#f1f1f1">
                                <a href="index.php"> <button type="button"  style="background-color:#ed7507;" class="cancelbtn">Anasayfa Dön </button> </a>
                                    
                                    <span class="psw">Forget <a href="index.php?SayfaKodu=19">password?</a></span>
                                </div>
                                </form>
                          </div>
                      
                    </div>
                </div>
            </div>
        </div>





<?php
if(isset($_POST["emailyenile"])){
  $EmailYenile=Guvenlik($_POST["emailyenile"]);
}
else {
  $EmailYenile="";
}


if(($EmailYenile!="")){
  

  if ($baglanti->query("SELECT * FROM uyeler WHERE email='$EmailYenile'"))  {
    $sorgu = $baglanti->query("SELECT * FROM uyeler WHERE email='$EmailYenile'");
    $sonuc = $sorgu->fetch_assoc();

        //Aktivasyon Kodu Göndericez 
        
        $mail = new PHPMailer(true);
        $MailIcerigiHazirla =' Merhaba Sayın ' .$sonuc['namesurname'].'<br/> sitemizde bulunan hesabınızın şifresini sıfırlamak için
        <a href= "'.$SiteLinki.'/index.php?SayfaKodu=30&AktivasyonKodu='.$sonuc['aktivasyonkodu'].'&email='.$sonuc['email'].'"  >BURAYA TIKLAYNIZ </a>
        . <br /> <br/ > <br />'. $SiteAdi .' Web Site ';

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
    $mail->addAddress(DonusumleriGeriDondur($sonuc['email']), DonusumleriGeriDondur($sonuc['namesurname']));
    $mail->addReplyTo(DonusumleriGeriDondur($SiteEmailAdresi), DonusumleriGeriDondur($SiteAdi));
    $mail->isHTML(true);
    $mail->Subject = "$SiteAdi.'Yeni Üyelik Aktivasyonu '";
    $mail->MsgHTML($MailIcerigiHazirla);
    $htmlicerik ='
    <div class="welcome-area" id="welcome">

        <div class="header-text">
              <div class="container">
                  <div class="row">
                      <div class="left-text col-lg-12 col-md-12 col-sm-12 col-xs-12"
                          data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                          <center><h1>Mailiniz Başarılı bir şekilde gönderilmiştir</h1></center>
                          <center><p>Anasayfaya Dönmek İçin </p></center>
                          
                        <center> <a href="index.php" class="main-button-slider">Tıklayınız</a></center>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    ';
    if ($mail->send()){
       
        header("Location:index.php?SayfaKodu=28");
        exit();
    }
    else{
         header("Location:index.php?SayfaKodu=29");
         exit();
    }
    }catch(Exception $e){
        echo 'Mail Gönderim Hatası <br /> Hata Açıklaması : ' , $mail->ErrorInfo;
      }
  
    
   }

  else {
    /* Böyle bir kullanıcı bulunmamaktadır  */  
   
    header("Location:index.php?SayfaKodu=27");
    exit();
  }

}


?>


<?php ob_end_flush();?>