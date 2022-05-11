<!DOCTYPE html>
<html lang="tr">

 <head>
        <!--SEO Meta Tags-->
        <meta charset="utf-8" />
        <!-- SITE TITLE -->
        <title>CKTRADIFY V1.0</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Crypto sell buy bot" name="description" />
        <meta name="keywords" content="crypto, Bootstrap, bitcoins, ethereum, dogecoin, iota, ripple, siacoin, exchange, trading platform, crypto trading">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="app/css/bootstrap.css">

        <!-- Icon CSS -->
        <link href="css/themify-icons.css" rel="stylesheet">

        <!-- FontAwesome -->
        <link rel="stylesheet" href="plugins/fontawesome/css/font-awesome.css">

        <!-- Owl Carousel CSS -->
        <link href="css/owl.carousel.css" rel="stylesheet">
        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <!-- Magnific-popup -->
        <link rel="stylesheet" href="css/magnific-popup.css">

        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="app/css/app.css">


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
        
    </head>


    <body  data-spy="scroll" data-target="#data-scroll">




        <!-- Navbar -->
        <div class="navbar navbar-custom sticky navbar-dark" role="navigation">
            <div class="container">
                <!-- Navbar-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="ti-menu"></i>
                    </button>
                    <!-- LOGO -->
                    <a class="navbar-brand logo" href="landing.html">
                        <i class="fa fa-bitcoin"></i> CKTRADIFY
                    </a>
                </div>
                <!-- end navbar-header -->

                <!-- menu -->
                
                <!--/Menu -->
            </div>
            <!-- end container -->
        </div>



        <!-- HOME -->
        <section class="home home-small" id="home">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-wrapper home-intro row vertical-content">

                            <div class="col-md-6 col-sm-8">
                                <div class="tabbable-panel">
                                <div class="tabbable-line">
                                   <div class="tab-content tab-content-BuySell m-t-9">

                                      <div class="tab-pane active" id="tab_default_2">
                                        <div class="panel panel-body">
                                            <form class="intro-form" id="loginform" method="post">
                                               <h5><i class="fa fa-key"></i> Giriş Ekranı<span>Mevcut hesabınızla sisteme giriş yapabilirsiniz</span></h5>
                                               <input name="username" class="fname" placeholder="Kullanıcı Adı" type="text" required="required">
                                               <input type="password" placeholder="Parola" name="password" required="required">
                                               <input type="submit" class="btn btn-secondary btn-block">Giriş Yap</button>
                                                <input type="hidden" name="type" value="loginUser">
                                               <p>Üyelik için iletişime geçin</p>
                                               </form>
                                               <center>
                                                <img id="loadingGif" style="display:none;" width="80" src="https://cutewallpaper.org/21/loading-gif-transparent-background/Download-Loading-Gif-Generator-Transparent-Background-PNG-.gif"/>
                                               </center>
                                            <span id="result" style="display:none;">
                                            <div class="alert alert-danger" role="alert">
                                                        Kullanıcı Adı veya Parola Hatalı!
                                                        </div>
                                            </span>
                                        </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- END HOME -->



        <!-- FOOTER -->
       
        <!-- end FOOTER -->


       



        <!-- js placed at the end of the document so the pages load faster -->
        <script src="plugins/jquery/jquery.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Sticky Header -->
        <script src="js/jquery.sticky.js"></script>

        <!-- Jquery easing -->                                                      
        <script type="text/javascript" src="js/jquery.easing.1.4.1.js"></script>

        <!-- Owl Carousel -->                                                      
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>


        <!-- Magnific Popup -->
        <script type="text/javascript" src="js/jquery.magnific-popup.js"></script>

        <!-- Custom js -->
        <script src="js/landing.js"></script>
       

<script type="text/javascript">
    $(document).ready(function() {
            $('#loginform').submit(function(e) {
                $('#loadingGif').show();
                e.preventDefault();
                $.ajax({
                type: "POST",
                url: 'system/ajax.php',
                data: $(this).serialize(),
                success: function(data)
                {
                    var res = JSON.parse(data);
                    if (res.loginStatus === true) {
                        window.location = 'index.php';
                    }
                    else {
                        $('#loadingGif').hide();
                        $('#result').show();
                    }
                }
            });
        });
    });
</script>

    </body>

 </html>