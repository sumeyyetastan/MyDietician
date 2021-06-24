<?php
if(isset($_SESSION["Kullanici"])){

?>

<footer  id="contact-us">
            <div class="container">
            <div class="footer-content">
            <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                 <center><h4 style="color:white;  "><?php echo KURUMSAL;?></h4></center>
                     
                         
                             <div class="contact">
                                <ul>

                                  <center> <li><a style="color:white; " href="index.php?SayfaKodu=1"> <?php echo HAKKIMIZDA;?></a></li></center>
                                  
                                </ul>
                             </div>
                          
                     
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                   <center><h4 style="color:white;  ">ÜYELİK&HİZMETLERİ</h4></center>
                   
                          
                             <div class="contact">
                                <ul class="lik">
                                <center><li><a  style="  color:white;" href="index.php?SayfaKodu=25"> Hesabım </a></li></center>
                                <center><li><a  style="  color:white;" href="index.php?SayfaKodu=32"> Çıkış Yap </li></center>
                                </ul>
                         

                          </div>
              </div>


             <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <center><h4 style="color:white; ">SÖZLEŞMELER</h4></center>
               
                 
                      <div class="contact">
                       <ul class="lik">
                       <center> <li><a  style="  color:white;" href="index.php?SayfaKodu=2">Üyelik Sözleşmesi</a> </li></center>
                       <center><li> <a  style="  color:white;" href="index.php?SayfaKodu=3">Kullanım Koşulları</a></li></center>
                       <center> <li> <a  style="  color:white;" href="index.php?SayfaKodu=4">Gizlilik Sözleşmesi</a></li></center>
                        </ul>
                    
                      </div>
                </div>
            </div>
         </div>
      </div>
            <div class="copyright">
            <center><p style="padding-bottom:1%; color:white;"><?php echo DonusumleriGeriDondur($SiteCopy);?></p></center>
            </div>


<?php 
 }
else {
?>

<footer  id="contact-us">
            <div class="container">
            <div class="footer-content">
            <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                 <center><h4 style="color:white;  ">KURUMSAL</h4></center>
                     
                         
                             <div class="contact">
                                <ul>

                                  <center> <li><a style="color:white; " href="index.php?SayfaKodu=1"> Hakkımızda</a></li></center>
                                  
                                </ul>
                             </div>
                          
                     
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                   <center><h4 style="color:white;  ">ÜYELİK&HİZMETLERİ</h4></center>
                   
                          
                             <div class="contact">
                                <ul class="lik">
                                <center><li><a  style="  color:white;" href="#"> Giriş Yap </a></li></center>
                                <center><li><a  style="  color:white;" href="#">Yeni Üye Ol </li></center>
                                </ul>
                         

                          </div>
              </div>


             <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <center><h4 style="color:white; ">SÖZLEŞMELER</h4></center>
               
                 
                      <div class="contact">
                       <ul class="lik">
                       <center> <li><a  style="  color:white;" href="index.php?SayfaKodu=2">Üyelik Sözleşmesi</a> </li></center>
                       <center><li> <a  style="  color:white;" href="index.php?SayfaKodu=3">Kullanım Koşulları</a></li></center>
                       <center> <li> <a  style="  color:white;" href="index.php?SayfaKodu=4">Gizlilik Sözleşmesi</a></li></center>
                        </ul>
                    
                      </div>
                </div>
            </div>
         </div>
      </div>
            <div class="copyright">
            <center><p style="padding-bottom:1%; color:white;"><?php echo DonusumleriGeriDondur($SiteCopy);?></p></center>
            </div>



<?php 
 }
?>

    </div>
    </footer>











