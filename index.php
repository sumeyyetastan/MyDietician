<?php 
session_start();
ob_start();
include("Ayarlar/ayar.php");
include("Ayarlar/fonksiyonlar.php");
include("Ayarlar/sitesayfalari.php");
include("header.php"); 
/*
if(isset($_REQUEST["SK"])){
  $SayfaKoduDegeri = SayiliIceriklerFiltrele($_REQUEST["SK"]);
}
else{
    $SayfaKoduDegeri = 0;
}
*/
?>

<html>
<head>
<meta charset="utf-8">
<title><?php echo $SiteTitle;?></title>
<meta name="description" content="<?php echo DonusumleriGeriDondur($SiteDescription);?>">
<script type="text/javascript" src="Ayarlar/fonksiyonlar.js" language="javascript"></script>
</head>
<body>
<!--<div class="welcome-area" id="welcome">

    <div class="header-text">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-6 col-md-12 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <h1>Simple App that we <em>CREATE</em></h1>
                    <p>Lava <a href="#">HTML landing page</a> template is provided by <a href="#">TemplateMo</a>.
                       You can modify and use it for your commercial websites for free of charge. This template is last updated on 29 Oct 2019.</p>
                    <a href="#promotion" class="main-button-slider">KNOW US BETTER</a>
                </div>
            </div>
        </div>-->
    </div>
    <!-- ***** Header Text End ***** -->
</div>

</body>
</html>
<?php include("footer.php"); ?>
<?php
$baglanti = null;
ob_end_flush();
?>