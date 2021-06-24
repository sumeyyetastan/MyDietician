<?php
$num = $baglanti->query("SELECT * FROM personalinformation WHERE userid='$KullaniciID'");
    #echo $num;
    if(mysqli _fetch_array($num)){
    
       // echo "boyle bir kayıt var";
            header("Location:index.php?SayfaKodu=34");
            exit;
    }
    else {
        //echo "boylle bir kayıt YOK";
       header("Location:index.php?SayfaKodu=33");
       exit;
    }
?>