<?php

$servername = "localhost";
$database = "dietician";
$username = "root";
$password = "";

$baglanti = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($baglanti,"UTF-8");

if($baglanti){
  //  echo "Connection success";
}
else{
 //   echo "Connection Failed";
}


  $AyarlarSorgusu = $baglanti->query("SELECT * FROM ayarlar LIMIT1");
  
  if($AyarlarSorgusu){
      while($Kayitlar=mysqli_fetch_assoc($AyarlarSorgusu)){
           $SiteAdi = $Kayitlar["SiteAdi"];
           $SiteTitle = $Kayitlar["SiteTitle"];
           $SiteDescription = $Kayitlar["SiteDescription"];
           $SiteKeywords = $Kayitlar["SiteKeywords"];
           $SiteCopy = $Kayitlar["SiteCopyrightMetni"];
           $SiteLogosu = $Kayitlar["SiteLogosu"];
           $SiteEmailAdresi = $Kayitlar["SiteEmailAdresi"]; 
           $SiteEmailSifresi = $Kayitlar["SiteEmailSifresi"];
           $SiteLinki = $Kayitlar["SiteLinki"];
          
      }
      
  }
  else{
    die();
  }

  $MetinlerSorgusu = $baglanti->query("SELECT * FROM sozlesmelervemetinler LIMIT1");
  
  if($MetinlerSorgusu){
      while($Metinler=mysqli_fetch_assoc($MetinlerSorgusu)){
           $HakkimizdaMetni = $Metinler["HakkimizdaMetni"];
           $UyelikSozlemesiMetni = $Metinler["UyelikSozlemesiMetni"];
           $KullanimKosullariMetni= $Metinler["KullanimKosullariMetni"];
           $GizlilikSozlesmesiMetni = $Metinler["GizlilikSozlesmesiMetni"];
   
      }
     
  }
  
  
  

if(isset($_SESSION["Kullanici"])){
  
$Kullanici =  $_SESSION["Kullanici"];
  if($baglanti->query("SELECT * FROM uyeler WHERE email ='$Kullanici'")){
    $sorgu = $baglanti->query("SELECT * FROM uyeler WHERE email ='$Kullanici'");
    $sonuc = $sorgu->fetch_assoc();
    
           $KullaniciID = $sonuc["id"];
           $KullaniciAdiSoyadi = $sonuc["namesurname"];
           $KullaniciSifre = $sonuc["pass"];
           $KullaniciMail = $sonuc["email"];
           $KullaniciDurum = $sonuc["durumu"];
           $KullaniciKayitTarihi = $sonuc["kayitTarihi"];
           $KullaniciKayitIpAdresi = $sonuc["kayitIpAdresi"];
           $AktivasyonKodu = $sonuc["aktivasyonkodu"]; 
      
  }
  
}

  



?>