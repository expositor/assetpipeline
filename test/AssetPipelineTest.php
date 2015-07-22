<?php
require ('../vendor/autoload.php');

use Wollnerstudios\AssetPipeline\AssetPipeline;

$pipeline = new AssetPipeline();
$pipeline->setAssetPath('src/assets/');
$pipeline->addCSS('Open Sans')->withoutBaseURL();
$pipeline->addCSS('font awesome');
$pipeline->addJS('jQuery')->version('2.1.4')->withoutBaseURL();
$pipeline->addAsset('bootstrap');
$pipeline->addAsset('wow');
$pipeline->addAsset('waves');
$pipeline->addAsset('skrollr');
$pipeline->addAsset('slick slider');
$pipeline->addAsset('slider revolution');
$pipeline->addAsset('magnific popup');
$pipeline->addAsset('slick forms');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>
	
<?= $pipeline->showCSS(); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    
   
    <div class="container">
 <div class="moo" style="background-color:orange;width:50px;height:50px"></div>
      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead"> <i class="fa fa-facebook"></i> Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
        <a href="#" class="button">Click Here</a>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<?= $pipeline->showJS(); ?>
<script>
  Waves.attach('.moo',['waves-block']);
  Waves.init();
</script>
  </body>
</html>
