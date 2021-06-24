<?php
 
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
                       
                          <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php?SayfaKodu=0" ><?php echo ANASAYFA;?></a></li>
                            <li class="scroll-to-section"><a href="index.php?SayfaKodu=1"><?php echo HAKKIMIZDA;?></a></li>
                            <li class="scroll-to-section"><a href="index.php?SayfaKodu=5">ILETİŞİM</a></li>
                            </li>
                         
                            <li class="submenu">
                            <a href="" onclick="document.getElementById('id01').style.display='block'" class="menu-item">Login</a>
        
                            </li>
                            <li class="scroll-to-section"><a href="#contact-us" class="menu-item">Yeni Üye ol</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Dil Seçimi</a>
                                <ul>

                                    <li><a href="secim.php?DilSecimi=Turkish" >TR</a></li></li>
                                    <li><a href="secim.php?DilSecimi=English" >EN</a></li>

                                </ul>
                            </li>
                     

                        </ul>
                       
                        
                      <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>

    </header>
        <div class="welcome-area" id="welcome">

            <div class="header-text">
                <div class="container">
                    <div class="row">
                        <div class="left-text col-lg-12 col-md-12 col-sm-12 col-xs-12"
                            data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                            <center><h1>Mailiniz Başarılı bir şekilde gönderilmiştir</h1></center>
                            <center><p>Anasayfaya Dönmek İçin </p></center>
                            
                        <center> <a href="index.php" class="main-button-slider">Tıklayınız</a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- ***** Header Text End ***** -->
</div>

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
