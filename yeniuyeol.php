<?php
ob_start();
include("Ayarlar/ayar.php");
include("Ayarlar/sitesayfalari.php");

 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  border-radius: 10px;
}


#iconpassword{
color:black;
}
#iconpassword:hover{
color:#4CAF50;
}



/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;

}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
  border-radius:10px;
}
.singupbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #ed7507;
  border-radius:10px;

}
.loginbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #4CAF50;
  border-radius:12px;
  width: 100%;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}

.container {
  padding: 10px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modallogin {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1000; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modallogin-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 60%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)}
  to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
  from {transform: scale(0)}
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
  .singupbtn {
     width: 100%;
  }
}

@media screen and  ( min-width: 301px) and (max-width: 425px) {
  .modallogin-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 95%; /* Could be more or less, depending on screen size */
  }
}
@media screen and  ( min-width: 426px) and (max-width: 800x) {
  .modallogin-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 60%; /* Could be more or less, depending on screen size */
  }
}
@media screen and  ( min-width: 801px) {
  .modallogin-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 40%; /* Could be more or less, depending on screen size */
  }
}



</style>
</head>
<body>

<div id="id01" class="modallogin">

  <form class="modallogin-content animate" action="" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="icon/chatbot-customer-icon.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter Username" name="emailgiris" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" id="password" placeholder="Enter Password" name="passwordgiris"  minlength="8" required>
     <i id="iconpassword" style="margin-left:90%; "class="fa fa-eye" onclick="togglePassword()"> </i>



      <button  name="login" type="submit" class="loginbtn">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

        <div class="container" style="background-color:#f1f1f1">
          <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
          <button type="button" onclick="document.getElementById('id01').style.display='none'; document.getElementById('id02').style.display='block'" class="singupbtn">Register</button>
          <span class="psw">Forget <a href="index.php?SayfaKodu=19">password?</a></span>
        </div>
      </form>
    </div>



<!--                   Buradan sonrası register sayfası                                                              -->
<div id="id02"  class="modallogin">

  <form class="modallogin-content animate" action="" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="icon/chatbot-customer-icon.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Name Surname</b></label>
      <input type="text" placeholder="Enter Name" name="namesurnamekayit" required>

      <label for="unmae"><b>Email</b></label>
      <input type="text" placeholder="Enter a e-mail adresses" name="emailkayit" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="passwordkayit" required>

      <label for="psw"><b>AAgain Password</b></label>
      <input type="password" placeholder="Please Again Enter Password" name="againpasswordkayit" required>
       
      <label>
        <input type="checkbox" value="1"  name="sozlesmeonay"><a href="index.php?SayfaKodu=2" target="_blank"> Üyelik Sözleşmesini Okudum ve Onaylıyorum</a>
      </label>

      <button name="register"  type="submit" class="loginbtn" >Register</button>
      
    </div>

  </form>
</div>




<script>
// Get the modal
var modal = document.getElementById('id01');
var register=document.getElementById('id02');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
window.onclick = function(event) {
    if (event.target == register) {
        modal.style.display = "block";
    }
}


            function login() {
              window.onclick = function(event) {
                  if (event.target == modal) {
                      modal.style.display = "none";
                      register.style.display="block";
                  }
              }
            }

            function register() {
                register.style.display = 'block';
            }



    function togglePassword() {
    var element = document.getElementById('password');
    element.type = (element.type == 'password' ? 'text' : 'password');
}

</script>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Frameworks/PHPMailer/src/Exception.php';
require 'Frameworks/PHPMailer/src/PHPMailer.php';
require 'Frameworks/PHPMailer/src/SMTP.php';


if(isset($_POST["emailkayit"])){
    $GelenEmailAdresi=Guvenlik($_POST["emailkayit"]);
}
else {
    $GelenEmailAdresi="";
}
if(isset($_POST["passwordkayit"])){
    $GelenSifre=Guvenlik($_POST["passwordkayit"]);
}
else {
    $GelenSifre="";
}
if(isset($_POST["namesurnamekayit"])){
    $GelenIsimSoyisim=Guvenlik($_POST["namesurnamekayit"]);
}
else {
    $GelenIsimSoyisim="";
}
if(isset($_POST["againpasswordkayit"])){
    $GelenSifreTekrar=Guvenlik($_POST["againpasswordkayit"]);
}
else {
    $GelenSıfreTekrar="";
}

if(isset($_POST["sozlesmeonay"])){
    $GelenSozlesmeOnay=Guvenlik($_POST["sozlesmeonay"]);
}
else {
    $GelenSozlesmeOnay="";
}

$AktivasyonKodu=AktivasyonKoduUret();
$HashingSifre= password_hash($GelenSifre,PASSWORD_DEFAULT,["cost" => 8]);




if(($GelenEmailAdresi!="") and ($GelenSifre!="") and ($GelenSifreTekrar!="") and ($GelenIsimSoyisim!="") ){

    if($GelenSozlesmeOnay!=1){
        //phpAlert( "onaysız sözleşme" );
        header("Location:index.php?SayfaKodu=14");
        exit;
    }
    else {
        if($GelenSifre!=$GelenSifreTekrar) {
            
            //phpAlert("Girdiginiz Şifreler Uyuşmamaktadır. Lütfen tekrar deneyiniz .");
              header("Location:index.php?SayfaKodu=13");
              exit;

        }
        else {
                if($baglanti->query("INSERT INTO uyeler (namesurname,pass,email,durumu,kayitTarihi,kayitIpAdresi,aktivasyonkodu) VALUES ('$GelenIsimSoyisim','$HashingSifre','$GelenEmailAdresi','0','$ZamanDamgasi','$IPAdresi','$AktivasyonKodu')")){
                  $mail = new PHPMailer(true);
                  $MailIcerigiHazirla =' Merhaba Sayın ' .$GelenIsimSoyisim.'<br/> sitemize yapmış
                    olduğunuz üyelik kaydını tamamlamak için lütfen 
                

                    <a href= "'.$SiteLinki.'/aktivasyon.php?AktivasyonKodu='.$AktivasyonKodu.'&email='.$GelenEmailAdresi.'"  >BURAYA TIKLAYNIZ </a>

                    . <br /> <br/ > <br />
                    '. $SiteAdi .' Web Sİte 
                    ';

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
              $mail->addAddress(DonusumleriGeriDondur($GelenEmailAdresi), DonusumleriGeriDondur($GelenIsimSoyisim));
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
                 
                  header("Location:index.php?SayfaKodu=9");
              }
              else{
                   header("Location:index.php?SayfaKodu=8");
              }
              }catch(Exception $e){
                  echo 'Mail Gönderim Hatası <br /> Hata Açıklaması : ' , $mail->ErrorInfo;
                }
                  
            }
            else{
              header('Location:index.php?SayfaKodu=10');
              exit;
            }
        
        }

 }
}


if(isset($_POST["emailgiris"])){
  $GelenEmailAdresiGiris=Guvenlik($_POST["emailgiris"]);
}
else {
  $GelenEmailAdresiGiris="";
}
if(isset($_POST["passwordgiris"])){
  $GelenSifreGiris=Guvenlik($_POST["passwordgiris"]);
}
else {
  $GelenSifreGiris="";
}



if(($GelenEmailAdresiGiris!="") and ($GelenSifreGiris!="") ){
  $sorgu = $baglanti->query("SELECT * FROM uyeler WHERE email='$GelenEmailAdresiGiris'");

  if ($baglanti->query("SELECT  id , email from uyeler WHERE  email='$GelenEmailAdresi'"))  {

    $sonuc = $sorgu->fetch_assoc();
    if (password_verify($GelenSifreGiris, $sonuc['pass'])) {

      if($sonuc['durumu']=='1'){
        $_SESSION['Kullanici'] = $GelenEmailAdresiGiris;
        if($_SESSION['Kullanici']==$GelenEmailAdresiGiris){
          // herşey okeyy başarılı
          header("Location:index.php?SayfaKodu=25");
          exit();
        }
        else{
          header("Location:index.php?SayfaKodu=22");
          exit();
        }

      }

      else {
        //Aktivasyon Kodu Göndericez 
        
        $mail = new PHPMailer(true);
        $MailIcerigiHazirla =' Merhaba Sayın ' .$sonuc['namesurname'].'<br/> sitemize yapmış
          olduğunuz üyelik kaydını tamamlamak için lütfen 
      

          <a href= "'.$SiteLinki.'/aktivasyon.php?AktivasyonKodu='.$sonuc['aktivasyonkodu'].'&email='.$sonuc['email'].'"  >BURAYA TIKLAYNIZ </a>

          . <br /> <br/ > <br />
          '. $SiteAdi .' Web Sİte 
          ';

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
       
        header("Location:index.php?SayfaKodu=24");
    }
    else{
         header("Location:index.php?SayfaKodu=23");
    }
    }catch(Exception $e){
        echo 'Mail Gönderim Hatası <br /> Hata Açıklaması : ' , $mail->ErrorInfo;
      }

 

        header("Location:index.php?SayfaKodu=20");
        exit();
      }

    }
    else{
      //şifre hatalı
      header("Location:index.php?SayfaKodu=26");
        exit();
    }
  }

  else {
    header("Location:index.php?SayfaKodu=21");
    exit();
  }


}


?>

</body>
</html>
<?php ob_end_flush();?>
