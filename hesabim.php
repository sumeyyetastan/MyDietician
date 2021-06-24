
<?php

if(isset($_SESSION["Kullanici"])){

?>

<section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            
                            <img src="icon/hesabim-icon.png" alt="">
                            <h4>Üyelik Bilgilerim</h4>
                             <p>Üyelik Bilgilerinizi güncelleyebilir veya ek bilgiler ekleyebilirsiniz.</p>
                            <a href="" class="main-button">
                                TIKLAYINIZ
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter bottom move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                           
                            <img src="icon/diyet-listesi-al.png" alt="">
                            <h4>Diyet Listesi Oluştur</h4>
                            <p>Yapay Zekalı Diyetisyenimiz sayesinde size özel diyet listenizi oluşturabilirsiniz</p>
                            <a href="index.php?SayfaKodu=33" class="main-button">
                                TIKLAYINIZ
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            
                            <img src="icon/bmi.png" alt="">
                            <h4>VKI Hesapla</h4>
                            <p>Vücüt kitle indexisi hesaplayıp ve günlük kalori miktarınızı görebilirsiniz.</p>
                            <a href="index.php?SayfaKodu=37" class="main-button">
                                TIKLAYINIZ
                            </a>
                        </div>
                    </div>
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