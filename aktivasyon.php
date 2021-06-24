<?php 
session_start();
ob_start();
include("Ayarlar/ayar.php");
include("Ayarlar/fonksiyonlar.php");


?>

<?php


if(isset($_GET["AktivasyonKodu"])){
    $AktivasyonKodu=Guvenlik($_GET["AktivasyonKodu"]);
}
else {
    $AktivasyonKodu="";
}
if(isset($_GET["email"])){
    $GelenEmail=Guvenlik($_GET["email"]);
}
else {
    $GelenEmail="";
}
/*
if(isset($_GET["durumu"])){
    $Durum=Guvenlik($_GET["durumu"]);
}
else {
    $Durum="";
} 
*/
/*
echo "AktivasyonKodu".$AktivasyonKodu;
echo " Mail :".$GelenEmail;
die();

*/
$durum_0=0;
$durum_1=1;
if(($AktivasyonKodu!="") and ($GelenEmail!="")  ){

    
        
            if($baglanti->query("SELECT * FROM uyeler WHERE email='$GelenEmail' AND aktivasyonkodu='$AktivasyonKodu'")){

                if($baglanti->query("SELECT * FROM uyeler WHERE durumu='$durum_0'")){
                    if($baglanti->query("UPDATE  uyeler SET durumu='1' WHERE email='$GelenEmail'")){

                        header('Location:index.php?SayfaKodu=11');
                        exit();
                    }
                }
                else
                {
                    header('Location:index.php?SayfaKodu=11');
                    exit();
                }
                  
                
            }
           

            else{
                echo "1";
                die();
                header("Location:$SiteLinki");
                exit();
            }
        
        

 
}
else {
    echo "2";
    die();
    header("Location:$SiteLinki");
     exit();
}



?>



<?php
$baglanti = null;
ob_end_flush();
?>