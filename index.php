<?php
require('System/config.php');
$api = new TradingBot();
$api->isLogined();
$isBinance = json_decode($api->isBinance($_SESSION['userId']));
$aktifBot = $api->aktifBot($_SESSION['userId']);
$orders = $api->getUserOrder($_SESSION['userId'],5);
 
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
   </head>
   <body>


 <div id="overlayLoader">
    <div id="preloader">
      <span></span>
      <span></span>
   </div>
</div>


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
               <h3>Ana Ekran
               </h3>
               <div class="row">
                  <div class="col-md-9">
                     <!-- First Row Starts Here -->
                     <div class="row">
                        <div class="col-lg-3 col-sm-6">
                           <div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="100" class="panel widget">
                              <div class="panel-body bg-primary">
                                 <div class="row row-table row-flush">
                                    <div class="col-xs-12">
                                       <h4 class="m0"><?=$aktifBot['botCount'];?>
                                       </h4>
                                       <h4 class="m0">Aktif Botlar</h4>
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                           <div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="500" class="panel widget">
                              <div class="panel-body bg-warning">
                                 <div class="row row-table row-flush">
                                    <div class="col-xs-12">
                                       <h4 class="m0">23</h4>
                                       <h4 class="m0">İşlem Hareketleri</h4>
                                       <span class="f-left m-t-10">
                                    
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                           <div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="1000" class="panel widget">
                              <div class="panel-body bg-danger">
                                 <div class="row row-table row-flush">
                                    <div class="col-xs-12">
                                       <h4 class="m0">5</h4>
                                       <h4 class="m0">Toplam Sat Emri</h4>
                                      
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                           <div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="1000" class="panel widget">
                              <div class="panel-body bg-success">
                                 <div class="row row-table row-flush">
                                    <div class="col-xs-12">
                                       <h4 class="m0">5</h4>
                                       <h4 class="m0">Toplam Alım Emri</h4>
                                      
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- First Row Ends Here -->
                     <div class="row">
                        <div class="col-lg-12">
                        <?php
                        if ($isBinance->response == false) {
                        ?>
                               <div class="panel panel-default">
                                  <div class="panel-heading">Sistem Uyarı!</div>
                                  <div class="panel-body">
                                     <div class="alert alert-danger"><?=$isBinance->Info;?> <a href="#" class="alert-link">Borsa Ayarları</a>.</div>
                                  </div>
                               </div>
                           <?php } ?>
                        </div>
                     </div>
                 
                     <!-- Chart Ends Here -->
          
                  </div>
                  <div class="col-md-3">
                
                     <!-- Coin Status Ends Here -->
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <div class="pull-right"><i class="fa fa-bullhorn"></i></div>
                           <div class="panel-title">Duyurular</div>
                        </div>
                        <div class="list-group">
                           <a href="#" class="list-group-item">
                              <div class="media">
                                 <div class="media-body">
                                    <strong class="media-heading text-primary">Administrator</strong>
                                    <p><small>Yayınlanama Tarihi: <span class="__cf_email__" >21.02.2021</span></small></p>
                                    <p class="mb-sm">
                                       <small>BTC/USDT Botu aktif edilmiştir.</small>
                                    </p>
                                 </div>
                              </div>
                           </a>
                           <a href="#" class="list-group-item">
                              <div class="media">
                                 <div class="media-body">
                                    <strong class="media-heading text-primary">Administrator</strong>
                                    <p><small>Yayınlanama Tarihi: <span class="__cf_email__" >19.02.2021</span></small></p>
                                    <p class="mb-sm">
                                       <small>Bakım bitmiştir, sistem tekrar aktif</small>
                                    </p>
                                 </div>
                              </div>
                           </a>
                        </div>
                  
                        <div class="panel-footer clearfix">
                           <p>Sistem hakkında genel bildiriler burada yer alır</p>
                        </div>
                     </div>
                  </div>
               </div>
           
               <!-- Orders Book -->
               <div class="row">
                    
                   
                     <!-- Market History -->
                     <div class="col-lg-12">
                        <div class="panel panel-default">
                           <div class="panel-heading">İşlem Geçmişi (Son 5 işlem)
                              <a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="Collapse Panel" class="pull-right">
                              <em class="fa fa-minus"></em>
                              </a>
                           </div>
                           <div class="table-responsive">
                              <table class="table table-bordered table-hover">
                                 <thead>
                                    <tr>
                                       <th>Tarih</th>
                                       <th>Alım/Satım</th>
                                       <th>Tip</th>
                                       <th>Miktar</th>
                                      
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       foreach ($orders as $order) {
                                      
                                    ?>
                                    <tr>
                                       <td>
                                         <?=$order->orderDate;?>
                                       </td>
                                       <?php
                                          if($order->orderType == "BUY"){
                                             echo ' <td class="text-green">Alım <i class="fa fa-arrow-up"></i></td>';
                                          }else{
                                             echo ' <td class="text-danger">Satım <i class="fa fa-arrow-down"></i></td>';
                                          }
                                       ?>
                                      
                                       <td>MARKET</td>
                                       <td> <?=$order->orderAmount;?></td>
                                    </tr>
                                    <?php } ?>
                                    
                                 </tbody>
                              </table>
                           </div>
                           <div class="panel-footer">
                               
                           </div>
                        </div>
                     </div>
                     <!-- My Order History -->
                    
               </div>
            </section>
         </section>
      </section>
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
         $(document).ready(function() {
            // Candlestick
            $.getJSON('tradify/data.json', function (data) {

                // create the chart
                Highcharts.stockChart('candlestickChart', {

                  chart: {
                },


                    rangeSelector: {
                        selected: 1
                    },

                    series: [{
                        type: 'candlestick',
                        name: 'SC-BTC',
                        data: data,
                        dataGrouping: {
                            units: [
                                [
                                    'week', // unit name
                                    [1] // allowed multiples
                                ], [
                                    'month',
                                    [1, 2, 3, 4, 6]
                                ]
                            ]
                        }
                    }]
                });
            });
            });
      </script>
   </body>

 
</html>