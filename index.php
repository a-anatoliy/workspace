<?php
/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 22.10.2017
 * Time: 21:35
 */
    $root  = $_SERVER['DOCUMENT_ROOT']; $tmplName = $root . "/data/email.html";
    $fp    = fopen( $tmplName, "r") or die("Unable to open file!");
    $eText = fread($fp,filesize($tmplName));
    $totalemails = 16;
    $newItems = 24;

    fclose($fp);
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

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

<div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Perl subscribers</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#stat">Statistics
                        <span class="badge badge-important">
                            <?=$totalemails?>
                        </span>
                    </a>
                </li>
                <li><a href="#news">New Items
                        <span class="badge badge-important">
                            <?=$newItems?>
                        </span>
                    </a>
                </li>
                <li><a href="https://jobs.perl.org" target="_blank">Site</a></li>
            </ul>
        </div>
    </nav>
</div>
      <br><br><br><br>
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
                <div class="panel-heading">
                    <h3 class="panel-title">Main site</h3>
                </div>
                <div class="panel-body">

                    <p><span class="label label-default"><?=$root?></span></p>
                    <ul>
                        <li>Lori.yunk@endurance.com</li>
                        <li>thomasw@eligo.co.uk</li>
                        <li>jobs@7binaryoptions.com</li>
                        <li>mikem@digitalwork.com</li>
                        <li>LAMPDev@fourthestate.com</li>
                        <li>mike@ascentsourcing.com</li>
                        <li>debs@perl.careers</li>
                        <li>pete@perl.careers</li>
                        <li>charlie@marshallrp.com</li>
                        <li>dservideo@ctsalbany.com</li>
                        <li>hola@airbnbcupon.com</li>
                        <li>itlead@drjays.com</li>
                        <li>carl.pickett@adrianflux.co.uk</li>
                        <li>frank.pacheco@lexisnexisrisk.com</li>
                        <li>resumes@PerlHunter.com</li>
                        <li>sshaw@homeaway.com</li>
                        <li>iwanttowork@adestra.com</li>
                        <li>joseph@cdrecruiting.com</li>
                        <li>jill@wellnessgeeky.com</li>
                        <li>uriel@aytomic.com</li>
                        <li>stephanie.thompson@shiftboard.com</li>
                        <li>garett@gss.us</li>
                        <li>stephane.tougard@ameex-mobile.com</li>
                        <li>chris.travers@adjust.com</li>
                        <li>careers@mediaalpha.com</li>
                        <li>matt.rigdon@rht.com</li>
                        <li>contact@wearebettors.com</li>
                        <li>c.de.zeeuw@office.caiw.nl</li>
                        <li>altchilerm@cargotel.com</li>
                        <li>jobs@geizhals.at</li>
                        <li>jobs@ams-ix.net</li>
                        <li>Jamiea@adzuna.com</li>
                        <li>jobs@bet.me</li>
                        <li>robert@sawinery.net</li>
                        <li>resumes@bestpractical.com</li>
                        <li>HR@enigmamedia.se</li>
                        <li>d.ahmed@computerfutures.com</li>
                        <li>careers@cricviz.com</li>
                        <li>Raj@grmi.Net</li>
                        <li>Noor.genuineit@gmail.com</li>
                        <li>amy@mediaalpha.com</li>
                        <li>andreaj@phmgmt.com</li>
                        <li>clarin@bbaw.de</li>
                        <li>personalstelle@bbaw.de</li>
                        <li>nrandall@TEKsystems.com</li>
                        <li>dvolz@brooksource.com</li>
                        <li>il@netapp-monitoring.info</li>
                        <li>hr@transfer-to.com</li>
                        <li>rachel.kane@vectorsolutions.com</li>
                        <li>ceo@tokeet.com</li>
                        <li>anastasia@getseennow.co.uk</li>
                        <li>matt@osrecruit.com</li>
                        <li>info@binaryoptionsaustralia.com</li>
                        <li>praca@sidnet.pl</li>
                        <li>jobs@nuvolagroup.com.au</li>
                        <li>Nick.edelman@revolutiontechnology.co.uk</li>
                        <li>lucile.leboucher@kuehne-nagel.com</li>
                        <li>may.tay@capitasingapore.com</li>
                        <li>itc1@capitasingapore.com</li>
                        <li>kiran.bhumana@sap.com</li>
                        <li>nimesh.rawal@xoriant.com</li>
                        <li>jobonlycity88@gmail.com</li>
                        <li>jobs@sipwise.com</li>
                        <li>jobs@directfreight.com</li>
                        <li>rakesh@mroads.com</li>
                        <li>rdouville@cypresshcm.com</li>
                        <li>vishal@mroads.com</li>
                        <li>vishal@mroads.com</li>
                        <li>itjob@dotmed.com</li>
                        <li>cgarcia@skillsetgroup.com</li>
                        <li>phanmichelle@prahs.com</li>
                        <li>job-7359@webcdr.com</li>
                        <li>nweill@altaits.com</li>
                        <li>hrdepartment@brandify.com</li>
                        <li>will.townsley@inphoria.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <!-- Send mail Section -->
    <section id="sendNew" class="container content-section">
        <div class="row">
            <div class="col-12">
                <h4 class="text-center">let's send another several e-mails</h4>
                <p>
<!--                    <script language="JavaScript" src="http://jobs.perl.org/rss/standard.js"></script>-->
                    <?php
                    $xml='https://jobs.perl.org/rss/standard.rss';
                    $xmlDoc = new DOMDocument();
                    $xmlDoc->load($xml);

                    $x=$xmlDoc->getElementsByTagName('item');
                    for ($i=0; $i<=10; $i++) {
                        $item_title=$x->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
                        $item_link=$x->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
                        $item_date=$x->item($i)->getElementsByTagName('date')->item(0)->childNodes->item(0)->nodeValue;
//                        $item_desc=$x->item($i)->getElementsByTagName('description')
//                            ->item(0)->childNodes->item(0)->nodeValue;
                        echo ("<p><a href='" . $item_link . "'>" . $item_title . "</a> d: ".$item_date."</p>");
//                        echo ("<br>");
//                        echo ($item_desc . "</p>");
                    }

                    ?>
                </p>
            </div>
        </div>
    </section>

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


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
