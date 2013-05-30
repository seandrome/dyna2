<?
// Dynazon - Dynamic & Responsive Amazon Landing Page
// by C#7 STÒÓDIO2.com - an Internet Marketing Agency
// http://stoodio2.com/dynazon
// @CharlieNumber7
$asin= $_GET[asin];
$opr = 'Lookup';
include('info.php');
include('function.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=$judul;?> | <?=$storeName;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/css/bootstrap-combined.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	background-color: #E1E6E8;
	background: top center url('http://labs.stoodioo.com/dynazon/dynazon-background.jpg') repeat #414852;
      }
    </style>
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">

<script type="text/javascript">
        (function() {
            $("[rel=popover]").popover();
        })();
    </script>

  </head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container"><div class="span8 offset2">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><?=$storeName;?></a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a data-toggle="modal" href="#about">About</a></li>
              <li><a data-toggle="modal" href="#privacy">Privacy Policy</a></li>
            </ul><div style="float:right;margin-right:30px;"><a href="<?=$beli;?>" target="_blank" class="btn btn-warning" title="Buy NOW"><font color="black">Buy NOW!</font></a></div>
          </div><!--/.nav-collapse --></div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
      <div class="span8 offset2">
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit" style="background-color:white;">
        <h1 style="font-size:45px;"><?=$judul;?></h2><hr>
      <div class="row">
        <div class="span2">
        <a data-toggle="modal" href="#larger"><img src="<?=$gambar;?>" title="&laquo; Click to Enlarge &raquo;"></a>
        </div>
        <div class="span4">
         <p><?=$konten. ' '.$konten1; ?> <span class="label label-warning">New</span></p>
        <p><a class="btn btn-warning btn-large" href="<?=$beli;?>" target="_blank"><font color="black">Buy NOW from Amazon &raquo;</a></a></p>
        <div style="width:150px; float:right;">
        <div style="width:50px; float:left;">
	<a href="http://pinterest.com/pin/create/button/?url=<?=curPageURL();?>&media=<?=$gambar;?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
        </div>
        <div class="fb-like" style="float:right;" data-href="<?=curPageURL();?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div></div>
        </div>
      </div>
      </div>

      <div class="row">

		<div class="span4">
		  <h2>Featured Product</h2>
                  <p><?=$feat;?></p> 
                  <div class="row">
                  <div class="span2">
                  <h3>Dimensions</h3>
                  <p>
                  Height <?=$item_height;?> inch, Length <?=$item_length;?> inch<br>
                  Width <?=$item_width;?> inch, Weight <?=$item_weight;?> pounds.
                  </p>

		  <p><a class="btn btn-warning" data-toggle="modal" href="#review">View Customer Review &raquo;</a> </p>
                  </div>
                  <div class="span2">
                  <h3>Related Product</h3>
                  <div class="row"><div class="span1">
                  <? if ($sim_asin) { ?><a href="product.php?asin=<?=$sim_asin;?>" class="thumbnail" title="<?=$sim_judul;?>"><img src="<?=$sim_gambar;?>"></a><? } ?>
                  </div><div class="span1">
                  <? if ($sim_asin1) { ?><a href="product.php?asin=<?=$sim_asin1;?>" class="thumbnail" title="<?=$sim_judul1;?>"><img src="<?=$sim_gambar1;?>"></a><? } ?>
                  </div></div>                   
                  </div>
                  </div>
		</div>
		<div class="span4">
		  <h2>Product Descriptions</h2>
                  <p><?=$keterangan;?></p> 
		      <div class="alert alert-success">
		      <a class="close" data-dismiss="alert" href="#">×</a>
		      <h4 class="alert-heading">Warranty:</h4>
		      <p><?=$garansi;?></p>
		      </div> 
                </div>
      </div>


      <hr>

      <footer>
        <p align="center">&copy; <?=$storeName;?> 2012 | <strong>Dynazon</strong> Dynamic & Responsive Amazon Landing Page by <a href="http://stoodio2.com" title="STÒÓDIO2.com - an Internet Marketing Agency">STÒÓDIO2.com</a> </p>
      </footer>
    </div></div>
    </div> <!-- /container -->

		<div id="larger" class="modal hide fade">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3><?=$judul;?></h3>
			</div>
			<div class="modal-body" style="text-aligment: center;">
				<p align="center">
			<img src="<?=$gambar;?>"></p>
			</div>
			<div class="modal-footer">
			<a href="<?=$beli;?>" class="btn btn-warning" title="Buy NOW"><font color="black"><?=$harga;?></font></a>
                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                        </div>
		</div>

		<div id="review" class="modal hide fade">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Customer Reviews</h3>
			</div>
			<div class="modal-body" style="text-aligment: center;">

			<iframe width="500px" height="400px" frameborder="1" src="<?=$review;?>"></iframe>
			</div>
			<div class="modal-footer">
                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                        </div>
		</div>

		<div id="about" class="modal hide fade">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>About <?=$storeName;?></h3>
			</div>
			<div class="modal-body" style="text-aligment: center;">
			<p>Certain content that appears on this Landing Page comes from Amazon Services LLC. This content prvoided 'as is' and is subject to change or removal at any time.</p>
			<p>This Landing Page serve the products as Amazon Associates.</p>
			<p>Product prices and availability are accurate and served realtime from Amazon Services. Any price and availability information displayed on Amazon.com at the time of purchase will apply to the purchase of this product.</p>
			</div>
			<div class="modal-footer">
                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                        </div>
		</div>

		<div id="privacy" class="modal hide fade">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Privacy Policy</h3>
			</div>
			<div class="modal-body" style="text-aligment: center;">
			<p>We are committed to protecting your privacy. We will only use the information we collect about you lawfully (in accordance with the Data Protection Act 1998). Please read on if you wish to learn more about our privacy policy.</p>
<h4>What Information do we collect?</h4>

<p>We keep only the information about how you have navigated our website. We temporarily keep information on the products you have added to your basket. We do not keep any personal information that would identify you in the future. When processing your order at Amazon there are other details that will be required - see Amazon Privacy Policy for full details.</p>

<p>We also record usage data such as the pages visited. This information is completely anonymous.</p>

<p>Any information we hold is secured in accordance with our internal security policy.</p>

<h4>Do we use cookies?</h4>

<p>We use cookies to enable you to hold the content of your shopping basket between visits and to record anonymous traffic data. We do not store any personally identifying information in these cookies.</p>

<h4>Will we sell your information?</h4>

<p>We does not sell any information about their customers; as simple as that. We will not forward your details on to any third party at any time.</p>
			</div>
			<div class="modal-footer">
                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                        </div>
		</div>






    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/js/bootstrap.min.js"></script>
	<script src="http://twitter.github.com/bootstrap/1.4.0/bootstrap-popover.js"></script>
	<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
  </body>
</html>

