<?php
$IPAdresi = $_SERVER["REMOTE_ADDR"];
$ZamanDamgasi = time();
$TarihSaat= date("d.m.Y H:i:s" ,$ZamanDamgasi);



function TarihBul($Deger){
    $Cevir= date("d.m.Y H:i:s" ,$Deger);
    $Sonuc = $Cevir;
    return $Sonuc;

}

function RakamlarHaricTumKarakterleriSil($Deger){
    $Islem = preg_replace("/[0-9]/","",$Deger);
    $Sonuc = $Islem;
    return $Sonuc;
}

function DonusumleriGeriDondur($Deger){
    $GeriDondur = htmlspecialchars_decode($Deger, ENT_QUOTES);
    $Sonuc = $GeriDondur;
    return $Sonuc;
}



function Guvenlik($Deger){
    $BoslukSil = trim($Deger);
    $TaglariTemizle = strip_tags($BoslukSil);
    $EtkisizYap = htmlspecialchars($TaglariTemizle);
    $Sonuc = $EtkisizYap;

    return  $Sonuc;
}
function SayiliİcerikleriFiltrele($Deger){
    $BoslukSil = trim($Deger);
    $TaglariTemizle = strip_tags($BoslukSil);
    $EtkisizYap = htmlspecialchars($TaglariTemizle);
    $Temizle  =  RakamlarHaricTumKarakterleriSil($EtkisizYap);
    $Sonuc = $EtkisizYap;

    return  $Sonuc;
}

function AktivasyonKoduUret(){
    $ilkbes= rand(100000,99999);
    $ikincibes= rand(10000,99999);
    $ucuncubes= rand(10000,99999);
    $kod=$ilkbes."-".$ikincibes."-".$ucuncubes;
    $sonucaktivasyon=$kod;
    return $sonucaktivasyon;

}



?>