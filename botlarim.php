<?php
require('System/config.php');
$api = new TradingBot();
$api->isLogined();
$botHakki = json_decode($api->botHakki($_SESSION['userId']));
$isBinance = json_decode($api->isBinance($_SESSION['userId']));
$bots = $api->getUserBots($_SESSION['userId']);
 
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
               <h3>Botlarım
               </h3>
               <div class="row">
                  <div class="col-lg-12">
                     
                     <div class="row">
                         <?php
                            if ($isBinance->response == true ) {
                         ?>
                       <div class="col-lg-12">
                               <div class="panel panel-default">
                                  <div class="panel-heading">Tüm Botlarım
                                    
                                     <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
                                     <em class="fa fa-minus"></em>
                                     </a>
                                  </div>
                                  <div class="panel-wrapper collapse in" aria-expanded="true" style=""><div class="table-responsive">
                                     <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                           <tr>
                                              <th>Sembol</th>
                                              <th>Coin Adı</th>
                                              <th>İşlem Miktarı</th>
                                              <th>Durum</th>
                                              <th>Aktif / Pasif</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($bots as $bot) {
                                              
                                            ?>
                                           <tr>
                                              <td class="text-center"><div class="media">
                                              <img src="images/coins/<?=$bot->symbol;?>.png" alt="Image" class="img-responsive img-circle">
                                           </div>
                                        </td>
                                              <td class="text-center">
                                              <?=$bot->symbol;?>
                                              </td>
                                              <td class="text-center">
                                              <?=$bot->qty;?>$
                                              </td>
                                              <td class="text-center">
                                                  <?php
                                                       if($bot->isActive == 1){     
                                                  ?>
                                                 <div class="label label-success">İşlemde</div>
                                                 <?php }else{ ?>
                                                    <div class="label label-danger">Pasif</div>
                                                    <?php } ?>
                                              </td>
                                              <td class="text-center">
                                           <label class="switch">
                                           <?php
                                                       if($bot->isActive == 1){     
                                                  ?>
                                               <input id="setStatus" onclick="setStatusBot(<?=$bot->id;?>,'deactive')" type="checkbox" checked>
                                                 <?php }else{ ?>
                                                    <input id="setStatus" onclick="setStatusBot(<?=$bot->id;?>,'active')" type="checkbox" >
                                                    <?php } ?>

                                          
                                           <span></span>
                                           </label>
                                        </td>

                                        <td class="text-center">
                                        <a onclick="deleteBot(<?=$bot->id;?>)"  class="btn btn-labeled btn-danger m-t-9">
                                   <span  class="btn-label"><i class="fa fa-times"></i>
                                   </span>Sil</a>
                                        </td>
                                           </tr>

                                           <?php } ?>
                                          
                                        </tbody>
                                     </table>
                                  </div></div>
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
          function setStatusBot(id,status)
                {
                    $.ajax({
                            type: "POST",
                            url: 'system/ajax.php',
                            data: {type:'updateBot', botId: id, status: status},
                            success: function(data)
                            {
                                var res = JSON.parse(data);
                                if (res.response === true) {
                                    setTimeout(function(){ location.reload(); },1000);
                                  
                                }
                                else {
                                    $('#responseAlert').show();
                                    $('#responseAlert').html(res.Info);
                                    $('#loadingGif').hide();
                                   
                                }
                            }
                        });
                }

                function deleteBot(id)
                {
                    $.ajax({
                            type: "POST",
                            url: 'system/ajax.php',
                            data: {type:'deleteBot', botId: id,userId: <?=$_SESSION['userId']?>},
                            success: function(data)
                            {
                                var res = JSON.parse(data);
                                if (res.response === true) {
                                    setTimeout(function(){ location.reload(); },1000);
                                    alert('silindi');
                                }
                                else {
                                    $('#responseAlert').show();
                                    $('#responseAlert').html(res.Info);
                                    $('#loadingGif').hide();
                                   
                                }
                            }
                        });
                }
       </script>
  
   </body>

 
</html>