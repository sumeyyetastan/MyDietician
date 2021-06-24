<?php
/*
ob_start();
include("Ayarlar/ayar.php");
include("Ayarlar/sitesayfalari.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
                                <label for="uname"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="sifre" required>

                                <label for="uname"><b>Password Again</b></label>
                                <input type="password" placeholder="Again Enter Password" name="sifretekrar" required>

                                
                                <button  name="resetpass" type="submit" class="loginbtn">Reset Your Password</button>
                                <label>
                                
                                </label>
                            </div>

                                <div class="container" style="background-color:#f1f1f1">
                                <a href="index.php"> <button type="button"  style="background-color:#ed7507;" class="cancelbtn">Anasayfa Dön </button> </a>
                                   
                                </div>
                                </form>
                          </div>
                      
                    </div>
                </div>
            </div>
        </div>





<?php

if(isset($_GET["AktivasyonKodu"])){
    $AktivasyonKodu=Guvenlik($_GET["AktivasyonKodu"]);
    //echo $AktivasyonKodu;
  }
  else {
    $AktivasyonKodu="";
  }

  if(isset($_GET["email"])){
    $GelenEmail=Guvenlik($_GET["email"]);
    //echo $GelenEmail;
  }
  else {
    $GelenEmail="";
  }


 


if(isset($_POST["resetpass"])) {

if(($AktivasyonKodu!="") AND ($GelenEmail!="") ){
  
   // echo "1 ciye girdi ";
  if ($baglanti->query("SELECT * FROM uyeler WHERE email='$GelenEmail' AND aktivasyonkodu='$AktivasyonKodu' "))  {
  
    if(isset($_POST["sifre"])){
        $SifreDegis=Guvenlik($_POST["sifre"]);
        //echo $AktivasyonKodu;
      }
      else {
        $SifreDegis="";
      }

      if(isset($_POST["sifretekrar"])){
        $SifreDegisTekrar=Guvenlik($_POST["sifretekrar"]);
        //echo $AktivasyonKodu;
      }
      else {
        $SifreDegisTekrar="";
      }

      $HashingSifre= password_hash($SifreDegis,PASSWORD_DEFAULT,["cost" => 8]);
  
      if($SifreDegis!=$SifreDegisTekrar) {
            
        //phpAlert("Girdiginiz Şifreler Uyuşmamaktadır. Lütfen tekrar deneyiniz .");
          header("Location:index.php?SayfaKodu=26");
          exit();

       ///////////// en son buarada kaldınnn /////////
       }
       else{
        if($baglanti->query("UPDATE  uyeler SET pass='$HashingSifre' WHERE email='$GelenEmail' and aktivasyonkodu='$AktivasyonKodu' ")){

          header('Location:index.php?SayfaKodu=31');
          exit();
        }
         }
    
   }

  else {
    /* Anasayfa yolla  */  
   
    header("Location:index.php?SayfaKodu=5");
    exit();
  }

}
}

?>


<?php ob_end_flush();?>