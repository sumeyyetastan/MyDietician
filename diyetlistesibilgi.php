<?php

if(isset($_SESSION["Kullanici"])){
    $num = $baglanti->query("SELECT * FROM personalinformation WHERE userid='$KullaniciID'");
    #echo $num;
    if(mysqli_fetch_array($num)){
    
       // echo "boyle bir kayıt var";
            header("Location:index.php?SayfaKodu=34");
            exit;
    }
    else{
?>

<head>
    <link rel="stylesheet" href="css/get-diet.css">
    <style>
       .kaydetbutton {
        margin-top: 35px;
        display: inline-block;
        font-size: 14px;
        border-radius: 25px;
        padding: 15px 25px;
        background-color: #fba70b;
        text-transform: uppercase;
        color: #fff;
        font-weight: 600;
        letter-spacing: 1px;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
       }
    </style>

</head>

<section class="section" id="about">
        <div class="container">
               <!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ --> 
                        
            <div class="carousel-one">
                <form method="post">
                <div class="mySlides fade-In">
                    <div class="number-text">1/3</div>
                    <div class="middle-part">
                        <div class="container">
                          

                                <center><h1 style="color:#f4813f; padding-top:2%; padding-bottom:2%;  font-weight:900px !important; font-family:Helvetica; font-size:40px !important; ">Lütfen Cinsiyetinizi Seçiniz ? </h1> </center>
                          
                        </div>
                    </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <center><img style="padding-bottom:5%; padding-top:5%; width:150px;" src="assets/images/kadin-icon.png"></center>
            <ul class="radio" style="list-style:none">
                <center><li><input type="radio" name="cinsiyet" value="Kadın" /><label></label></li></center>
            </ul>
        </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="about_box" style="text-align:justify !important;">
            <center><img style="padding-bottom:5%; padding-top:5%; width:150px;" src="assets/images/erkek-icon.png"></center>
            <ul class="radio" style="list-style:none;">
            <center><li><input type="radio" name="cinsiyet" value="Erkek"/><label></label></li></center>
            </ul>
                </div>

            </div>
        </div>

            </div>
        </fieldset>
            <div class="mySlides fade-In">
                    <div class="number-text">2/3</div>
                    <div class="middle-part">
                      <div class="container">
                   
                           <center><h1 style="color:#f4813f; padding-top:2%; padding-bottom:2%; font-weight:900px !important; font-family:Helvetica; font-size:40px !important;">Lütfen Doğum tarihini giriniz ? </h1></center>
                    
                     </div>
                    </div>

                <center>Doğum günü (tarih ve saat): <input type="datetime-local" name="bdaytime"></center>
                <!--<input type="submit">-->

                </div>
                <div class="mySlides fade-In">
                <div class="number-text">1/3</div>
                <div class="middle-part">
                    <div class="container">
                 
                     <center> <h1 style="color:#f4813f; padding-top:2%; padding-bottom:2%;  font-weight:900px !important; font-family:Helvetica; font-size:40px !important;">Lütfen Yaşadığınız Yeri Seçiniz </h1></center>

                    </div>
                </div>
                    <div class="number-text"></div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <center>Şehirler : </center>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <center><select name="sehirler" style="padding-top:10;"></center>
                                <option value="sehirler"></option>
                                <option value="Marmara">Marmara</option>
                                <option value="Karadeniz">Karadeniz </option>
                                <option value="Akdeniz">Akdeniz</option>
                                <option value="Ege">Ege</option>
                                <option value="DoguAnadolu">Doğu Anadolu</option>
                                <option value="GuneyDoguAnadolu">Güneydoğu Anadolu ></option>
                                <option value="IcAnadolu">İç Anadolu</option>
                                    </select>
                        </div>


                </div>
                </div>
                <div class="mySlides fade-In">
                    <div class="number-text">1/3</div>
                    <div class="middle-part">
                      <div class="container">
                   
                         <center><h1 style="color:#f4813f; padding-top:2%; padding-bottom:2%;  margin:auto; font-weight:900px !important; font-family:Helvetica; font-size:40px !important;">Lütfen Kan Grubunuzu Seçiniz </h1></center>
            
                      </div>
                    </div>
                        <div class="number-text"></div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <center>Kan Grubu: </center>
                        </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <center>  <select name="kangrup" style="padding-top:5%;"> </center>
                            <option value="kangrubu"></option>
                            <option value="ARh+">A Rh+</option>
                            <option value="ARh-">A Rh-</option>
                            <option value="BRh+">B Rh+</option>
                            <option value="BRh-">B Rh-</option>
                            <option value="ABRh+">AB Rh+</option>
                            <option value="ABRh-">AB Rh-</option>
                            <option value="0Rh+">0 Rh+</option>
                            <option value="0Rh-">0 Rh-</option>
                            </select>
                    </div>
                    </div>
                </div>

                    <div class="mySlides fade-In">
                        <div class="number-text"></div>
                        <div class="middle-part">
                            <div class="container">
                         
                              <center> <h1 style="color:#f4813f; padding-top:2%; padding-bottom:2%;  margin:auto; font-weight:900px !important; font-family:Helvetica; font-size:40px !important;">Lütfen Kilo ve Boyunuzu Giriniz </h1></center>

                            </div>
                        </div>

                    <center>  Kilo(kg): <input type="text"  name="kilo" size="5" style="width:50%;"><br /></center>
                    <center>  Boy(cm): <input type="text" name="boy" size="5" style="width:50%;"><br /></center>

                    <!--<input type="submit" value="Kaydet" />-->


                    </div>

                    <div class="mySlides fade-In">
                            <div class="number-text"></div>
                            <div class="middle-part">
                            <div class="container">
                         
                              <center><h1  style="color:#f4813f; padding-top:2%; padding-bottom:2%;  font-weight:900px !important; font-family:Helvetica; font-size:40px !important;">Lütfen Hedef Kilonuzu Belirtin. </h1></center>

                            </div>
                            </div>

                    <center>Hedef - Kilo(kg): <input type="text" name="hedefkilo" size="10" style="width:50%;"><br /></center>

                    <center><input  class="kaydetbutton" type="submit" name="kayitinformation"  value="Bilgilerinizi Kaydediniz Lütfen"/></input></center>

                        </div>



                <!--Next and previous buttons start-->
                <a class="prev-slide" style="padding-top:20%;">&#10094;</a>
                <a class="next-slide" style="padding-top:20%;">&#10095;</a>
                <!--Next and previous buttons end-->
        </div>
        <br />
        </form>
        </div>

                        <div class="dots" style="padding-top:3%; padding-bottom:3%;">
                            <span class="dot dot1"></span>
                            <span class="dot dot2"></span>
                            <span class="dot dot3"></span>
                            <span class="dot dot4"></span>
                            <span class="dot dot5"></span>
                            <span class="dot dot6"></span>
                            <span class="dot dot7"></span>

                        </div>

                <!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^  --> 
            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

  <script>
      //carousel start

      var slideIndex = 1;
      showSlides(slideIndex);

      //Next and previous buttons start
      $(".prev-slide").click(function() {
          plusSlides(-1);
      });

      $(".next-slide").click(function() {
          plusSlides(1);
      });

      function plusSlides(n) {
          showSlides(slideIndex += n);
      }
      //Next and previous buttons end

      //dots start
      $(".dot1").click(function() {
          currentSlide(1);
      });
      $(".dot2").click(function() {
          currentSlide(2);
      });
      $(".dot3").click(function() {
          currentSlide(3);
      });

      function currentSlide(n) {
          showSlides(slideIndex = n);
      }
      //dots end


      function showSlides(n) {
          var i;
          var slides = $(".mySlides");
          var dots = $(".dot");
          if (n > slides.length) {
              slideIndex = 1;
          }
          if (n < 1) {
              slideIndex = slides.length;
          }
          for (var i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
          }

          for (var i = 0; i < dots.length; i++) {
              dots[i].className.replace("active", "");
              dots[i].classList.remove("active");
          }
          slides[slideIndex - 1].style.display = "block";
          dots[slideIndex - 1].className += " active";
      }

  </script>

<?php


    $Kullanici_Id = $KullaniciID ;
    if(isset($_POST["kayitinformation"])){
            $cinsiyetkayit = $_POST['cinsiyet'];
            $dogumtarihikayit = $_POST['bdaytime'];
            $sehirlerkayit = $_POST['sehirler'];
            $kangrupkayit = $_POST['kangrup'];
            $kilokayit = $_POST['kilo'];
            $boykayit = $_POST['boy'];
            $hedefkilokayit = $_POST['hedefkilo'];
            //$userid = $KullaniciID;
            

           if( $baglanti->query("INSERT INTO personalinformation (userid,gender,birthdate,city,bloodgroup,weight,height,targetweight ) VALUES ('$Kullanici_Id','$cinsiyetkayit','$dogumtarihikayit','$sehirlerkayit','$kangrupkayit','$kilokayit','$boykayit','$hedefkilokayit')")) {
                  /*   Buradan farklı adrese giderek devam edecek ayrıca */
                  header("Location:index.php?SayfaKodu=34");
           }
           else{
               echo " Hata oluştu";
           }
           
    }
  }
 }

else {
header("Location:index.php");
exit();
}

?>