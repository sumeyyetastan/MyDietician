
<?php
if(isset($_SESSION["Kullanici"])){

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
?>
<section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter bottom move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                           
                            <img src="icon/bmi.png" alt="">
                            <h4>Vucut Kitle İndexi</h4>
                            
                            <a href="#" class="main-button">
                                <?php echo $BMI_degeri ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    
                </div>
            </div>
        </div>
    </section>
<?php
}
else {
header("Location:index.php");
exit();
}

?>