<?php
include("yeniuyeol.php");
if(empty($_SESSION["SiteDili"])){
include("diltr.php");
}else{
if($_SESSION["SiteDili"]== "Turkish"){
    include("diltr.php");
}elseif($_SESSION["SiteDili"]== "English"){
    include("dilen.php");
    }
elseif($_SESSION["SiteDili"]== "French"){
    include("dilfransızca.php");
    }
}
?>
<?php
if(isset($_REQUEST["SayfaKodu"])){
    $SayfaKoduDegeri =SayiliİcerikleriFiltrele($_REQUEST["SayfaKodu"]);
}else{
    $SayfaKoduDegeri = 0;
}
?>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="TemplateMo">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/templatemo-lava.css">
<link rel="stylesheet" href="assets/css/owl-carousel.css">
<link rel="stylesheet" href="css/chatbot.css">
<title>My Dietician | Onine Dietician System </title>
</head>

<body>
<?php
if(empty($_SESSION["SiteDili"]) or $_SESSION["SiteDili"]== "Turkish") {
?>
<a style="height: 100px; weight:100px; ;position:fixed; z-index:1;bottom:75px; padding-right:3%; right:5px;" href="chatbot-tr.php" title="ChatBot"><img src="assets/images/chatbot-logo.png"></a>
<?php
}
else if(empty($_SESSION["SiteDili"]) or $_SESSION["SiteDili"]== "English") {
?>
<a style="height: 100px; weight:100px; ;position:fixed; z-index:1;bottom:75px; padding-right:3%; right:5px;" href="chatbot-en.php" title="ChatBot"><img src="assets/images/chatbot-logo.png"></a>
<?php
}

?>


<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <img src="assets/images/logo.png" class="logo">  </img>

                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <?php
                    if(isset($_SESSION["Kullanici"])){
?>
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="index.php?SayfaKodu=0" ><?php echo ANASAYFA;?></a></li>
                        <li class="scroll-to-section"><a href="index.php?SayfaKodu=1"><?php echo HAKKIMIZDA;?></a></li>
                        <li class="scroll-to-section"><a href="index.php?SayfaKodu=5">BLOG</a></li>
                        
                        <li class="scroll-to-section">
                        <a href="index.php?SayfaKodu=25" ><?php echo HESABIM;?></a>
    
                        </li>
                        <li class="scroll-to-section"><a href="index.php?SayfaKodu=32"><?php echo CIKISYAP;?></a></li>
                        <li class="submenu">
                            <a href="javascript:;"><?php DİLSECİMİ;?> </a>
                            <ul>

                                <li><a href="secim.php?DilSecimi=Turkish" >TR</a></li></li>
                                <li><a href="secim.php?DilSecimi=English" >EN</a></li>

                            </ul>
                        </li>
                    

                    </ul>
              <?php } 
              
              else {
              ?>      
               <ul class="nav">
                        <li class="scroll-to-section"><a href="index.php?SayfaKodu=0" ><?php echo ANASAYFA;?></a></li>
                        <li class="scroll-to-section"><a href="index.php?SayfaKodu=1"><?php echo HAKKIMIZDA;?></a></li>
                        <li class="scroll-to-section"><a href="index.php?SayfaKodu=5">BLOG</a></li>
                        </li>
                        
                        <li class="scroll-to-section">
                        <a href="" onclick="document.getElementById('id01').style.display='block'" class="menu-item"><?php echo GİRİSYAP;?></a>
    
                        </li>
                       
                        <li class="submenu">
                            <a href="javascript:;"><?php echo DİLSECİMİ;?></a>
                            <ul>

                                <li><a href="secim.php?DilSecimi=Turkish" >TR</a></li></li>
                                <li><a href="secim.php?DilSecimi=English" >EN</a></li>

                            </ul>
                        </li>
                    </ul> 
               <?php } 
              
              ?>     
                   
                    
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>

</header>
    <!-- ***** Header Area End ***** -->
    <?php 
    
    if((!$SayfaKoduDegeri) or ($SayfaKoduDegeri=="") or ($SayfaKoduDegeri==0)){
        include($SayfaKodu[0]);
    }else{
        include($SayfaKodu[$SayfaKoduDegeri]);
    }
    
    ?>
<body>

</body>



    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
