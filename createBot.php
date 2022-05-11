<?php
require('System/config.php');
$api = new TradingBot();
$api->isLogined();
$botHakki = json_decode($api->botHakki($_SESSION['userId']));
$isBinance = json_decode($api->isBinance($_SESSION['userId']));
?>

<!DOCTYPE html>
<html lang="tr">
   
 <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
      <meta content="Crypto Trading User Interface" name="description" />
        <meta name="keywords" content="crypto, Bootstrap, bitcoins, ethereum, dogecoin, iota, ripple, siacoin, exchange, trading platform, crypto trading">
      <meta name="author" content="">
      <title>CKTradify - Trading Bot v1.0</title>
      <link rel="stylesheet" href="app/css/bootstrap.css">
      <link rel="stylesheet" href="plugins/fontawesome/css/font-awesome.css">
      <link rel="stylesheet" href="plugins/animo/animate%2banimo.css">
      <link rel="stylesheet" href="plugins/csspinner/csspinner.min.css">
      <link rel="stylesheet" href="app/css/app.css">
      <script src="plugins/modernizr/modernizr.js"></script>
      <script src="plugins/fastclick/fastclick.js"></script>
      <style>
      
.rounded-lg {
  border-radius: 1rem !important;
}

.text-small {
  font-size: 0.9rem !important;
}

.custom-separator {
  width: 5rem;
  height: 6px;
  border-radius: 1rem;
}

.text-uppercase {
  letter-spacing: 0.2em;
}

       </style>
   </head>
   <body>


  

      <section class="wrapper">
         <nav class="navbar navbar-default navbar-top navbar-fixed-top">
            <div class="navbar-header">
               <a href="#" class="navbar-brand">
                  <div class="brand-logo"><i class="fa fa-bitcoin"></i> CKTRADIFY</div>
                  <div class="brand-logo-collapsed"><i class="fa fa-bitcoin"></i></div>
               </a>
            </div>
            <div class="nav-wrapper">
               <ul class="nav navbar-nav mt0">
                  <li>
                     <a href="#" data-toggle="aside">
                     <em class="fa fa-align-left"></em>
                     </a>
                  </li>
               </ul>
               <ul class="nav navbar-nav navbar-right mt0">
                  
                
                  <li class="dropdown">
                     <a href="#" data-toggle="dropdown" data-play="fadeIn" class="dropdown-toggle">
                     <em class="fa fa-user"></em>
                     </a>
                     <ul class="dropdown-menu">
                        <li><a href="#">Profile</a>
                        </li>
                        <li><a href="#">Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#">Logout</a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
         <aside class="aside">
            <?php
include ('inc/nav.html');
            ?>
         </aside>
         <section>
            <section class="main-content">
               <button type="button" class="btn btn-labeled btn-primary pull-right">
               <span class="btn-label"><i class="fa fa-dollar"></i>
               </span>Goto Wallet</button>
               <h3>Bot Oluştur
               </h3>
               <div class="row">
                  <div class="col-lg-12">
                     
                     <div class="row">
                         <?php
                            if ($isBinance->response == true ) {
                         ?>
                        <div class="col-lg-12">
                       
                               <div class="panel panel-default">
                                  <div class="panel-heading">Hazır Botlar (Mevcut bot hakkınız <strong><?=$botHakki;?> </strong>) </div>
                                  <div class="panel-body">
                                  <section>
                                            <div class="container py-5">
                                                <div class="row text-center align-items-end">
                                                <!-- Pricing Table-->
                                                <div class="col-lg-4 mb-5 mb-lg-0">
                                                    <div class="bg-white p-5 rounded-lg shadow">
                                                    
                                                    <h2 class="h1 font-weight-bold">BTC/USDT<span class="text-small font-weight-normal ml-2"></span></h2>

                                                    <div class="custom-separator my-4 mx-auto bg-primary"></div>

                                                    <ul class="list-unstyled my-5 text-small text-left">
                                                        <li class="mb-3">
                                                        <i class="fa fa-check mr-2 text-primary"></i> 4 saatlik grafiğe göre</li>
                                                        
                                                    </ul>
                                                    <a <?php if($botHakki == 0){echo 'disabled="disabled"';}else{echo 'onclick="showSymbol(\'btcusdt\')" data-toggle="modal" data-target="#myModal"';} ?>   class="btn btn-primary btn-block p-2 shadow rounded-pill">
                                                        <?php
                                                        if($botHakki > 0){
                                                            echo "Oluştur";
                                                        }else{
                                                            echo "Limite Ulaştınız";
                                                        }
                                                        ?>
                                                    </a>
                                                    </div>
                                                </div>
                                                <!-- END -->


                                               <!-- Pricing Table-->
                                               <div class="col-lg-4 mb-5 mb-lg-0">
                                                    <div class="bg-white p-5 rounded-lg shadow">
                                                    
                                                    <h2 class="h1 font-weight-bold">ETH/USDT<span class="text-small font-weight-normal ml-2"></span></h2>

                                                    <div class="custom-separator my-4 mx-auto bg-primary"></div>

                                                    <ul class="list-unstyled my-5 text-small text-left">
                                                        <li class="mb-3">
                                                        <i class="fa fa-check mr-2 text-primary"></i> 4 saatlik grafiğe göre</li>
                                                        
                                                    </ul>
                                                    <a <?php if($botHakki == 0){echo 'disabled="disabled"';}else{echo ' onclick="showSymbol(\'ethusdt\')" data-toggle="modal" data-target="#myModal"';} ?>   class="btn btn-primary btn-block p-2 shadow rounded-pill">
                                                        <?php
                                                        if($botHakki > 0){
                                                            echo "Oluştur";
                                                        }else{
                                                            echo "Limite Ulaştınız";
                                                        }
                                                        ?>
                                                    </a>
                                                    </div>
                                                </div>
                                                <!-- END -->

                                          <!-- Pricing Table-->
                                          <div class="col-lg-4 mb-5 mb-lg-0">
                                                    <div class="bg-white p-5 rounded-lg shadow">
                                                    
                                                    <h2 class="h1 font-weight-bold">DOGE/USDT<span class="text-small font-weight-normal ml-2"></span></h2>

                                                    <div class="custom-separator my-4 mx-auto bg-primary"></div>

                                                    <ul class="list-unstyled my-5 text-small text-left">
                                                        <li class="mb-3">
                                                        <i class="fa fa-check mr-2 text-primary"></i> 4 saatlik grafiğe göre</li>
                                                        
                                                    </ul>
                                                    <a <?php if($botHakki == 0){echo 'disabled="disabled"';}else{echo ' onclick="showSymbol(\'dogeusdt\')" data-toggle="modal" data-target="#myModal"';} ?>   class="btn btn-primary btn-block p-2 shadow rounded-pill">
                                                        <?php
                                                        if($botHakki > 0){
                                                            echo "Oluştur";
                                                        }else{
                                                            echo "Limite Ulaştınız";
                                                        }
                                                        ?>
                                                    </a>
                                                    </div>
                                                </div>
                                                <!-- END -->
                                                </div>
                                            </div>
                                            </section>

                                  </div>
                               </div>
                           
                        </div>
                     <?php }else{ ?>

                        <div class="panel panel-default">
                                  <div class="panel-heading">Sistem Uyarı!</div>
                                  <div class="panel-body">
                                     <div class="alert alert-danger"><?=$isBinance->Info;?> <a href="#" class="alert-link">Borsa Ayarları</a>.</div>
                                  </div>
                               </div>
<?php } ?>
                    
                     </div>
                 
                     <!-- Chart Ends Here -->
          
                  </div>
                   
            
            </section>
         </section>
      </section>



      <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                              <h4 id="myModalLabel" class="modal-title"></h4>
                           </div>
                           <input id="userId" type="hidden" name="userId" value="<?=$_SESSION['userId'];?>">
                           <input id="symbolCoin" name="symbolCoin" type="hidden" value="">
                           <div class="modal-body">
                           <div class="form-group">
                                 <label>Bakiyenizin Ne Kadarıyla İşlem Yapılacak (Birim - Minimum 10$)</label>
                                 <input id="qty" type="number" placeholder="10" class="form-control" value="10" min="10">
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-default">İptal</button>
                              <button id="createBot" type="button" class="btn btn-primary">Oluştur</button>
                           </div>
                           <center>
                                                <img id="loadingGif" style="display:none;" width="80" src="https://cutewallpaper.org/21/loading-gif-transparent-background/Download-Loading-Gif-Generator-Transparent-Background-PNG-.gif"/>
                                               </center>
                           <div style="display:none;" id="responseAlert" class="alert alert-success"></div>
                        </div>
                     </div>
                  </div>
                  </div>


       <script src="plugins/jquery/jquery.js"></script>
      <script src="plugins/velocity/velocity.js"></script>
      <script src="plugins/velocity/velocity.ui.js"></script>
      <script src="plugins/bootstrap/js/bootstrap.js"></script>
      <script src="plugins/chosen/chosen.jquery.js"></script>
      <script src="plugins/slider/js/bootstrap-slider.js"></script>
      <script src="plugins/filestyle/bootstrap-filestyle.js"></script>
      <script src="plugins/animo/animo.js"></script>
      <script src="plugins/sparklines/jquery.sparkline.js"></script>
      <script src="plugins/slimscroll/jquery.slimscroll.js"></script>
      <script src="plugins/datatable/media/js/jquery.dataTables.js"></script>
      <script src="plugins/datatable/extensions/datatable-bootstrap/js/dataTables.bootstrap.js"></script>
      <script src="plugins/datatable/extensions/datatable-bootstrap/js/dataTables.bootstrapPagination.js"></script>
      <script src="tradify/highcharts.js"></script>
      <script src="tradify/exporting.js"></script>
      <script src="plugins/datatable/extensions/ColVis/js/dataTables.colVis.js"></script>
      <!--[if lt IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
      <script src="app/js/tradify.js"></script>
      <script>
          function showSymbol(symbol){
            var symbol = symbol.toUpperCase();
                $('#symbolCoin').val(symbol);
                $('#myModalLabel').html(symbol.toUpperCase() +" için işlem yapılıyor");
          }
         $(document).ready(function() {
            // $('#create').click(function(){
            //     var symbol = $('#create').data("symbol").toUpperCase();
            //     $('#symbolCoin').val($(this).data("symbol").toUpperCase());
            //     $('#myModalLabel').html($(this).data("symbol").toUpperCase() +" için işlem yapılıyor");
            // });

            $('#createBot').click(function(){
                $('#loadingGif').show();
                var symbol = $("#symbolCoin").val();
                var qty = $("#qty").val();
                var user = $("#userId").val();
                if(qty < 10){
                    alert("Minimum 10$ ile işlem oluşturabilirsiniz!");
                }else{
                        $.ajax({
                            type: "POST",
                            url: 'system/ajax.php',
                            data: {type:'createBot', symbolC: symbol, qtyC: qty,userIds: user},
                            success: function(data)
                            {
                                var res = JSON.parse(data);
                                if (res.response === true) {
                                    $('#responseAlert').show();
                                    $('#responseAlert').html(res.Info);
                                    $('#loadingGif').hide();
                                    setTimeout(function(){ location.reload(); },2000);
                                }
                                else {
                                    $('#responseAlert').show();
                                    $('#responseAlert').html(res.Info);
                                    $('#loadingGif').hide();
                                   
                                }
                            }
                        });
                }
                
            });

         });
            
           
      </script>
   </body>

 
</html>