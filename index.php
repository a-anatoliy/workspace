<?php
/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 22.10.2017
 * Time: 21:35
 */

  date_default_timezone_set('CET');
  error_reporting(E_ALL);
  //    ini_set('display_errors', 0);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  set_include_path(get_include_path()
    .PATH_SEPARATOR.'core'
    .PATH_SEPARATOR.'objects'
  );

  spl_autoload_extensions("_class.php");
  spl_autoload_register();
  session_start();

  define("ROOT_DIR"  , $_SERVER['DOCUMENT_ROOT'] );
  define('_ATHREERUN', 1 );
  define('CONFIG'    , ROOT_DIR . '/data/cfg/config.php');
  define('DB_CONFIG' , ROOT_DIR . '/data/cfg/rnd_string.php');

  $cfg = array_merge(
    require_once CONFIG,    // get main configuration
    require_once DB_CONFIG  // get the database configuration
  );

//  require_once ROOT_DIR . '/lib/Utils_class.php';
  $email = ROOT_DIR . $cfg['site']['email'];
  $tableRowTemplate = ROOT_DIR . $cfg['site']['tdTmpl'];
  $fp    = fopen( $email, "r") or die("Unable to open file!");
  $eText = fread($fp,filesize($email));
  fclose($fp);

  // establish the db connection
  $d = new Data($cfg);
  $totalemails = $d->getValue(QueryMap::SELECT_TOTAL); $totalemails = $totalemails['total'];

  $newItems = 0;

?>

<!DOCTYPE html><html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Perl jobs activities</title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap theme -->
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link href="css/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
  <script type="text/javascript" src="/js/customs.js"></script>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header"><a class="navbar-brand" href="#">Perl subscribers</a></div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#stat">Statistics <span class="badge badge-important"><?=$totalemails?></span></a></li>
                <li><a href="#news">New Items <span class="badge badge-important"><?=$newItems?></span></a></li>
                <li><a href="https://jobs.perl.org" target="_blank">Site</a></li>
            </ul>
        </div>
    </nav>
</div>

<br><br><br><br>

<div class="container">
    <!-- Send mail Section -->
    <section id="sendNew" class="container content-section">
        <div class="row">
            <div class="col-12">
              <!-- base table start -->
              <table class="table table-striped table-hover thead-dark">
                <thead>
                <tr><th>#</th><th>date</th><th>link</th><th>email</th><th>acts</th></tr>
                </thead>
                <tbody>
                <?php
                $Utils = new Utils();
                $xml='https://jobs.perl.org/rss/standard.rss';
                $xmlDoc = new DOMDocument();
                $xmlDoc->load($xml);
                $x=$xmlDoc->getElementsByTagName('item');
                $counter=1;$i=0;

                do {
                  $title=$x->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
                  $link=$x->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
                  $date=$x->item($i)->getElementsByTagName('date')->item(0)->childNodes->item(0)->nodeValue;
                  $desc=$x->item($i)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;
                  $i++;
                  $content = $Utils->getHtml($link);
                  $contact = $Utils->extractEmail($content);

                  if($contact=== []) {
                    printf("<div>E-mail address not detected. <a href='%s' target='_blank'>%s</a></div>\n",
                      $link,$title);
                    continue;
                  } else {
                    $string = $contact[0];
                    $drTot = $d->getAll(QueryMap::SELECT_BY_EMAIL, $string);
                    if($drTot === []) {
                      include $tableRowTemplate;
                      $counter++;
                    } else {
                      //printf("<pre>The [%s] already exists.</pre>", $string);
                      continue;
                    }
                  }
//                        printf("<div>%s</div>",$desc);
//                        printf("<div>%s</div>",$content);
                } while($counter <=$cfg['site']['items']);
                ?>

                </tbody>
              </table>
              <!-- base table stop -->
            </div>
        </div>
    </section>

  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="panel panel-primary drop-shadow">
          <div class="panel-heading">
            <h3 class="panel-title" data-toggle="collapse" data-target="#tmpl">Template</h3>
            <small><i class="icon-chevron-down"></i></small>
          </div>
          <div class="panel-body collapse in" id="tmpl">
            <?=$eText?>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><h3 class="panel-title">Main site</h3></div>
          <div class="panel-body">
            <p><!-- span class="label label-default"><?=ROOT_DIR?></span></p -->
              <!-- all of used emails goes here -->
            <ul><li>first@email.com</li><li>second@email.com</li></ul>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Statistics Section -->
    <section id="statistics" class="container content-section">
        <div class="row">
            <div class="col-12">
                <h4 class="text-center">here is my Statistics in short</h4>
                <p>right here, right now</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <hr>
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Yukai 2017</p>
        </div>
    </footer>
</div>


</body>
</html>
