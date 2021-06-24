<?php 
include("Ayarlar/ayar.php");
#echo $KullaniciID;

$sorgu = $baglanti->query("select * from personalinformation  WHERE userid ='$KullaniciID'");
$sonuc = $sorgu->fetch_assoc();


 $cinsiyetkayit = $sonuc['gender'];
 $dogumtarihikayit = $sonuc['birthdate'];
 $sehirlerkayit = $sonuc['city'];
 $kangrupkayit = $sonuc['bloodgroup'];
 $kilokayit = $sonuc['weight'];
 $boykayit = $sonuc['height'];
 $hedefkilokayit = $sonuc['targetweight'];
 $userid = $sonuc['userid'];
 
 echo shell_exec("diyetListesial.py $cinsiyetkayit $dogumtarihikayit $sehirlerkayit $kangrupkayit $kilokayit $boykayit $hedefkilokayit $userid");


 header("Location:index.php?SayfaKodu=36");
?>
