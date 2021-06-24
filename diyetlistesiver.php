<?php
if(isset($_SESSION["Kullanici"])){
   $current_kalori=0;
    if($baglanti->query("SELECT * FROM analyse WHERE user_id ='$KullaniciID'")){
        $sorgu = $baglanti->query("SELECT * FROM analyse WHERE user_id ='$KullaniciID'");
        $sonuc = $sorgu->fetch_assoc();
               $p_one = $sonuc["predict_one"];
               $p_two= $sonuc["predict_two"];
               $p_three = $sonuc["predict_three"];
               $p_four = $sonuc["predict_four"];
               $p_five = $sonuc["predict_five"];
               $p_six = $sonuc["predict_six"];
               $p_seven = $sonuc["predict_seven"];            
      }

   
    if($p_three=='Tatli yemek' ||  $p_three=='Caya veya Kahveye Seker atmak'){
      $p_three_num=8;
 
    } 
   else if ($p_three=='Hicbiri' ||  $p_three=='Ekmek'){
      $tatli_isim='Tatli hakkınız bulunmamaktadır';
      $tatli_kalori=0;
      $tatli_gram=0;
      $p_three_num=0;
     
    } 
     else {
      $tatli_isim='Tatli hakkınız bulunmamaktadır';
      $tatli_kalori=0;
      $tatli_gram=0;
      $p_three_num=0;
     }


      if($p_two=='Beyaz Ekmek'){
            $p_two_num=1;
           
      } 
      else if ($p_two=='Kepekli Ekmek'){
            $p_two_num=2;
          
      }
      else if ($p_two=='Ekmek Kullanmıyorum'){
            $p_two_num=3;
         
      }





    if($p_five=='Et'){
          $p_five_num=1;
         
    } 
    else if ($p_five=='Sebze'){
          $p_five_num=2;
          
    }
    
    else if($p_five=='Baklagil'){
          $p_five_num=3;
          
    }


    if($p_seven=='Yesillikli Salatalar'){
      $p_seven_num=7;
      
     }  
     else if ($p_seven=='Yogurtlu Salatalar'){
      $p_seven_num=4;
    
      } 


      if($p_four=='Kuru Yemis'){
            $p_four_num=5;
          
     } 
      else if($p_four=='Yas Meyve'){
            $p_four_num=6;
           
      }

    if($baglanti->query("SELECT * FROM personalinformation WHERE userid ='$KullaniciID'")){
        $sorgu = $baglanti->query("SELECT * FROM personalinformation WHERE userid ='$KullaniciID'");
        $sonuc = $sorgu->fetch_assoc();
        
               $cinsiyet = $sonuc["gender"];
               $kilo= $sonuc["weight"];
               $boy = $sonuc["height"];
               $hedef_kilo = $sonuc["targetweight"];
               $dogum_gunu = $sonuc["birthdate"];
                 
      }

   

    $boy_metre=$boy/100;

    $bugun = date("Y-m-d");
    $diff = date_diff(date_create($dogum_gunu), date_create($bugun));
    $yas=$diff->format('%y');

  
    if($cinsiyet=='Erkek'){
    $BMR=(66+((13.7)*($kilo)) +(5*$boy)-((6.8)*($yas)));
  
    $Ideal_Kilo=( 50 + (2.3 / 2.54) * ($boy - 152.4));
    $Ideal_Kilo=(float)number_format($Ideal_Kilo,2);
   
    $Toplam_su_miktari =  -2.097 + (0.3362 * $kilo) + (0.1074 * $boy);
   
    $islem = pow($boy,2);
    $islem2 = pow($kilo,2);
    $yagsiz_vucut_agirligi = ((1.10 * $kilo) - 128 * ($islem2 / $islem ));
   
    }

    else if ($cinsiyet=='Kadın'){
    $step1=(665+((9.6)*($kilo)) +((1.8)*$boy)-((4.7)*($yas)));
    $step1=$step1*1.1;
    $step2=($step1*10)/100;
    $BMR=$step1+$step2;

    $Ideal_Kilo=(45.5 + (2.3 / 2.54)*($boy - 152.4));
    $Ideal_Kilo=(float)number_format($Ideal_Kilo,2);

    $Toplam_su_miktari =  -2.097 + (0.2466 * $kilo) + (0.1069 * $boy);
  
    $islem = pow($boy,2);
    $islem2 = pow($kilo,2);
    
    $yagsiz_vucut_agirligi = ((1.07 * $kilo) - 148 * ($islem2 / $islem ));

    }
   
  
    $BMI=$kilo/($boy_metre*$boy_metre);
    
    $BMI=(float)number_format($BMI,2);
   
    if($BMI>0 && $BMI<=18.4){
        $BMI_degeri="zayıf";
    }
    else if($BMI>18.4 && $BMI<=24.9){
         $BMI_degeri="normal";
    }
    else if($BMI>24.9 && $BMI<=29.9){
          $BMI_degeri="kilolu";
    }
    else if($BMI>29.9 && $BMI<=34.9){
          $BMI_degeri="obez";
    }
    else if($BMI>34.9 && $BMI<=44.9){
          $BMI_degeri="ikinci derece obez";
    }
    else if($BMI>44.9){
           $BMI_degeri="üçüncü derece obez";
    }

 if($baglanti->query("SELECT * FROM kahvalti WHERE typec ='$p_five_num'")){
     
      $sorgu = $baglanti->query("SELECT * FROM kahvalti WHERE typec ='$p_five_num'");
      $i=0;
      $arr_p_five=array("Neyi Tercih Edersiniz");
      while( $sonuc = $sorgu->fetch_assoc()){
            array_push($arr_p_five,$sonuc['id']);
      }

      $arr_p_five_length = count($arr_p_five);
      $kahvalti_kalorisi=($BMR*30)/100;
      $yumurta_isim='Haşlanmış yumurta';
      $yumurta_kalori=70;
      $yumurta_gram='1 adet';

      $peynir_isim='Peynir';
      $peynir_kalori=80;
      $peynir_gram='Kibrit kutusu kadar';

      $current_kalori=$yumurta_kalori + $peynir_kalori;

      $list_kahvalti = array();
      while($current_kalori<$kahvalti_kalorisi){
            $sayi = rand(1,$arr_p_five_length-1);
            $sorgu_2 = $baglanti->query("SELECT * FROM kahvalti WHERE id ='$arr_p_five[$sayi]'");
            $sonuc_2 = $sorgu_2->fetch_assoc();
            $kahvaltilik=$sonuc_2['isim'];
            $kalori=$sonuc_2['kalori'];
            $gram=$sonuc_2['gram'];
            $current_kalori=$current_kalori+$kalori;
        
            if($current_kalori<$kahvalti_kalorisi){   
                  array_push($list_kahvalti,array($kahvaltilik,$kalori,$gram));
                  $cal1=$current_kalori;
            }
      }
      array_push($list_kahvalti,array($peynir_isim,$peynir_kalori,$peynir_gram));
      array_push($list_kahvalti,array($yumurta_isim,$yumurta_kalori,$yumurta_gram));
      $global_calori=$current_kalori;
     
   }


    $current_kalori=0;

    if($baglanti->query("SELECT * FROM ogleyemegi WHERE typec ='$p_five_num'")){
      $sorgu = $baglanti->query("SELECT * FROM ogleyemegi WHERE typec ='$p_five_num' && oncelik ='1'");
      $i=0;
      $arr_p_five=array("Çorba");
      while( $sonuc = $sorgu->fetch_assoc()){
            array_push($arr_p_five,$sonuc['id']);
      }
      $arr_p_five_length = count($arr_p_five);
     
      $sorgu = $baglanti->query("SELECT * FROM ogleyemegi WHERE typec ='$p_five_num' && oncelik ='2'");
      $arr_p_five_2=array("Yemek");
      while( $sonuc = $sorgu->fetch_assoc()){
            array_push($arr_p_five_2,$sonuc['id']);
      }
      $arr_p_five_length_2 = count($arr_p_five_2);
     
      $ogle_kalorisi=($BMR*30)/100; 
      $corba=rand(1,($arr_p_five_length-1));
      
      $sorgu = $baglanti->query("SELECT * FROM ogleyemegi WHERE id ='$arr_p_five[$corba]'");
      $sonuc = $sorgu->fetch_assoc();
      $corba_isim=$sonuc['isim'];
      $corba_kalori=$sonuc['kalori'];
      $corba_gram=$sonuc['gram'];
      $list_ogleyemegi = array();
 
      $current_kalori=$current_kalori+$corba_kalori;
      array_push($list_ogleyemegi,array($corba_isim,$corba_kalori,$corba_gram));
      while($current_kalori<$ogle_kalorisi){
            $sayi = rand(1,($arr_p_five_length_2-1));
            $sorgu_2 = $baglanti->query("SELECT * FROM ogleyemegi WHERE id ='$arr_p_five_2[$sayi]'");
            $sonuc_2 = $sorgu_2->fetch_assoc();
            $ogleyemegi=$sonuc_2['isim'];
            $kalori=$sonuc_2['kalori'];
            $gram=$sonuc_2['gram'];
            $current_kalori=$current_kalori+$kalori;

            if($current_kalori<$kahvalti_kalorisi){   
               
                  array_push($list_ogleyemegi,array($ogleyemegi,$kalori,$gram));
                 $cal2=$current_kalori;
            }
      }
      $global_calori=$global_calori+$current_kalori;
   }
     $current_kalori=0;

   if($baglanti->query("SELECT * FROM aksamyemegi WHERE typec ='$p_five_num'")){
    
       $sorgu = $baglanti->query("SELECT * FROM aksamyemegi WHERE typec ='$p_five_num'");
       $i=0;
       $arr_p_five=array("Çorba");
       while( $sonuc = $sorgu->fetch_assoc()){
             array_push($arr_p_five,$sonuc['id']);
       }
       $arr_p_five_length = count($arr_p_five);

       $aksam_kalori=($BMR*30)/100;  
       $corba=rand(1,($arr_p_five_length-1));

       $corba_isim='Çorba';
       $corba_kalori=150;
       $corba_gram='1 kase';
       $list_aksamyemegi = array();
 
       $current_kalori=$current_kalori+$corba_kalori;
       array_push($list_aksamyemegi,array($corba_isim,$corba_kalori,$corba_gram));
       
       while($current_kalori<$aksam_kalori){
             $sayi = rand(1,($arr_p_five_length-1));
             $sorgu = $baglanti->query("SELECT * FROM aksamyemegi WHERE id ='$arr_p_five[$sayi]'");
             $sonuc = $sorgu->fetch_assoc();
             $aksamyemegi=$sonuc['isim'];
             $kalori=$sonuc['kalori'];
             $gram=$sonuc['gram'];
             $current_kalori=$current_kalori+$kalori;
           
             if($current_kalori<$aksam_kalori){   
                   array_push($list_aksamyemegi,array($aksamyemegi,$kalori,$gram));
                   $cal3=$current_kalori;
             }
       }
       $global_calori=$global_calori+$current_kalori;
    }

   $current_kalori=0;
   $ekmek_control = $baglanti->query("SELECT * FROM atistirmalik WHERE typec ='$p_two_num'");
   if(mysqli_fetch_array($ekmek_control)){
      $ekmek_control = $baglanti->query("SELECT * FROM atistirmalik WHERE typec ='$p_two_num'");
      $sonuc = $ekmek_control->fetch_assoc();
      $ekmek_isim= $sonuc['isim'];
      $ekmek_kalori=$sonuc['kalori']; 
      $ekmek_gram=$sonuc['gram']; 
      $atistirmalik_kalori=($BMR*8)/100;
      $current_kalori=$current_kalori+$ekmek_kalori;
   }
   else {
      $ekmek_isim='ekmek Hakkınız Bulunmamaktadır';
      $ekmek_kalori=0;
      $ekmek_gram=0;
   }

   $tatli_control = $baglanti->query("SELECT * FROM atistirmalik WHERE typec ='$p_three_num'");
   if(mysqli_fetch_array($tatli_control)){
      $tatli_control = $baglanti->query("SELECT * FROM atistirmalik WHERE typec ='$p_three_num'");
      $sonuc = $tatli_control->fetch_assoc();
      $tatli_isim= $sonuc['isim'];
      $tatli_kalori=$sonuc['kalori'];
      $tatli_gram=$sonuc['gram'];
      $atistirmalik_kalori=($BMR*8)/100;
      $current_kalori=$current_kalori+$tatli_kalori;
   }
   else {
      $tatli_isim='Tatli hakkınız bulunmamaktadır';
      $tatli_kalori=0;
      $tatli_gram=0;
   }

   $salata_control = $baglanti->query("SELECT * FROM atistirmalik WHERE typec ='$p_seven_num'");
   if(mysqli_fetch_array($salata_control)){
      $salata_control = $baglanti->query("SELECT * FROM atistirmalik WHERE typec ='$p_seven_num'");
      $sonuc = $salata_control->fetch_assoc();
      $salata_isim= $sonuc['isim'];
      $salata_kalori=$sonuc['kalori'];
      $salata_gram=$sonuc['gram'];
      $atistirmalik_kalori=($BMR*8)/100;
      $current_kalori=$current_kalori+$salata_kalori;
   }
   else {
      $salata_isim='Tatli hakkınız bulunmamaktadır';
      $salata_kalori=0;
      $salata_gram=0;
   }

   $meyve_control = $baglanti->query("SELECT * FROM atistirmalik WHERE typec ='$p_four_num'");
   if(mysqli_fetch_array($meyve_control)){
      $meyve_control = $baglanti->query("SELECT * FROM atistirmalik WHERE typec ='$p_four_num'");
      $sonuc = $meyve_control->fetch_assoc();
      $meyve_isim= $sonuc['isim'];
      $meyve_kalori=$sonuc['kalori'];
      $meyve_gram=$sonuc['gram'];
      $atistirmalik_kalori=($BMR*8)/100;
      $current_kalori=$current_kalori+$meyve_kalori;
   }
   else {
      $meyve_isim='Tatli hakkınız bulunmamaktadır';
      $meyve_kalori=0;
      $meyve_gram=0;
   }
   $global_calori=$cal1+$cal2+$cal3+$current_kalori;
   $eksik_calori=$BMR-$global_calori;
}

else {
header("Location:index.php");
exit();
}

?>
<section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table">
                  <thead style="background-color:#fba70b; border-radius:%10;">
                        <tr>
                             
                              <th style ="color:white; " scope="col"><?php echo $KullaniciAdiSoyadi;?></th>
                              <th style ="color:white; " scope="col"> Yaş: <?php echo $yas;?></th>
                              <th style ="color:white; " scope="col"> Kilo: <?php echo $kilo;?></th>
                              <th style ="color:white; " scope="col"> Boy: <?php echo $boy;?></th>
                              <th style ="color:white; " scope="col"> Hedef Kilo: <?php echo $hedef_kilo;?></th>


                        </tr>
                  </thead>
            </table>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
    <th scope="col"></th>
    <td scope="col"> Vücut Kitle İndeksi : </td>
                  <td scope="col"><?php echo $BMI_degeri;?></td>
                  
    </tr>
    <tr>
    <th scope="col"></th>
    <td scope="col">Günlük Kalori Miktarı : </td>
                  <td scope="col"><?php echo $BMR;?></td>
    </tr>
    <tr>
    <th scope="col"></th>
    <td scope="col">İdeal Kilo : </td>
                  <td scope="col"><?php echo $Ideal_Kilo;?></td>
    </tr>
    <tr>
    <th scope="col"></th>
                  <td scope="col">Yağsız Vucut Ağırlığı :</td>
                  <td scope="col"><?php echo (float)number_format($yagsiz_vucut_agirligi,2);?>
                  </td>
                  
    </tr>
    <tr> 
    <th scope="col"></th>
                  <td scope="col">Tüm vucut Su Miktarı :</td>
                  <td scope="col"> <?php echo (float)number_format($Toplam_su_miktari,2);?>
                  </td>
                  
    </tr>
  </tbody>
</table>
           

            <table class="table">
            <thead  style="background-color:#c2fb12 !important;">
            <tr>
                  <th scope="col">Öğünler</th>
                 <th scope="col">Ürün</th>
                  <th scope="col">Kalori</th>
                  <th scope="col">Miktarı </th>
              
            </tr>
            </thead>
            <tbody>
            <tr>
                  <th scope="row">Kahvaltılık</th>
            
                  <?php  $kahvalti_sayi = count($list_kahvalti); ?>
                  <td>
                  <?php

                        for($i = 0; $i < count($list_kahvalti); ++$i) {
                              ?> <tr> <td> </td> <?php
                              for($y = 0; $y < 3; ++$y) {
                              //echo 'merhaba';
                        ?> 
                        <td> <?php   echo $list_kahvalti[$i][$y]; ?> </td>
                      
                       <?php
                       }
                       ?> <tr> <?php
                  }
                       ?>
                  </td>
            </tr>
            <tr>
                  <th scope="row">Öğle Yemeği</th>
            
                  <?php  $ogleyemegi_sayi = count($list_ogleyemegi); ?>
                  <td>
                  <?php

                        for($i = 0; $i < count($list_ogleyemegi); ++$i) {
                              ?> <tr> <td> </td> <?php
                              for($y = 0; $y < 3; ++$y) {
                              //echo 'merhaba';
                        ?> 
                        <td> <?php   echo $list_ogleyemegi[$i][$y]; ?> </td>
                      
                       <?php
                       }
                       ?> <tr> <?php
                  }
                       ?>
                  </td>
            </tr>

            <tr>
                  <th scope="row">Akşam Yemeği</th>
            
                  <?php  $ogleyemegi_sayi = count($list_aksamyemegi); ?>
                  <td>
                  <?php

                        for($i = 0; $i < count($list_aksamyemegi); ++$i) {
                              ?> <tr> <td> </td> <?php
                              for($y = 0; $y < 3; ++$y) {
                              //echo 'merhaba';
                        ?> 
                        <td> <?php   echo $list_aksamyemegi[$i][$y]; ?> </td>
                      
                       <?php
                       }
                       ?> <tr> <?php
                  }
                       ?>
                  </td>
            </tr>

            <tr>
                  <th scope="row">Ara Öğünler ve Atıştırmalıklar</th>
            

                  <td>
                  <tr>
                   <td> </td>
                   <td> <?php   echo $salata_isim ?> </td> 
                   <td> <?php   echo $salata_kalori ?></td>
                   <td> <?php   echo $salata_gram ?></td>
                  <tr> 
                  <tr>
                   <td> </td>
                   <td> <?php   echo $tatli_isim ?> </td> 
                   <td> <?php   echo $tatli_kalori ?></td>
                   <td> <?php   echo $tatli_gram ?></td>
                  <tr> 
                  <tr>
                   <td> </td>
                   <td> <?php   echo $ekmek_isim ?> </td> 
                   <td> <?php   echo $ekmek_kalori ?></td>
                   <td> <?php   echo $ekmek_gram ?></td>
                  <tr> 
                  <tr>
                   <td> </td>
                   <td> <?php   echo $meyve_isim ?> </td> 
                   <td> <?php   echo $meyve_kalori ?></td>
                   <td> <?php   echo $meyve_gram ?></td>
                  <tr> 
                  
                     
                     
                  </td>
            </tr>

            
            </tbody>
            </table>

            <table class="table">
                  <thead style="background-color:#fba70b;  border-radius:%10;">
                        <tr>
                              <th scope="col" style="color:white;"> Diyet Listeniz Toplamda : <?php echo $global_calori;?>  kaloridir .</th>
                              <th scope="col" style="color:white;"> Diyet Listeniz haricinde ek: <?php echo $eksik_calori;?>  kalori hakkınız bulunmakatdır .</th>
                        </tr>
                  </thead>
            </table>

                </div>
            </div>
        </div>
 </section>
