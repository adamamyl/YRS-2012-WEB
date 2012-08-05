<?PHP

$competition_location = '2012/during';

require_once('content/'.$competition_location.'/nav.php');
require_once('widgets.php');

$page=new Page();

$url=$_GET['p'];
$url_=explode('.',$_GET['p']);
$url=$url_[0];
unset($url_);

$page->breadcrumbs=array_searchRecursive($url,$navigation);
$page->title=end($page->breadcrumbs);

if(file_exists($page->get_content_path($url,$competition_location))==FALSE){
	$page->error(404);
}


/////////////////////////
// Handy function by http://greengaloshes.cc
function array_searchRecursive( $needle, $haystack, $strict=false, $path=array() )
{
    if( !is_array($haystack) ) {
        return false;
    }
 
    foreach( $haystack as $key => $val ) {
        if( is_array($val) && $subPath = array_searchRecursive($needle, $val, $strict, $path) ) {
            $path = array_merge($path, array($key), $subPath);
            return $path;
        } elseif( (!$strict && $val == $needle) || ($strict && $val === $needle) ) {
            $path[] = $key;
            return $path;
        }
    }
    return false;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?PHP echo $page->get_title(); ?></title>
    <script src="/bootstrap/js/jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Lawrence Job (GridFusions) on behalf of Rewired State">

    <!-- Le styles -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <style>
	.navbar-inner{
		background-color:#B63322;
		background-image: -moz-linear-gradient(top, #B63322, #C65342);
		background-image: -ms-linear-gradient(top, #B63322, #C65342);
		background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#B63322), to(#C65342));
		background-image: -webkit-linear-gradient(top, #B63322, #C65342);
		background-image: -o-linear-gradient(top, #B63322, #C65342);
		background-image: linear-gradient(top, #B63322, #C65342);
		color:#fff;
		border-bottom:1px solid #661100;
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.0), inset 0 -1px 0 rgba(255, 255, 255, 0.9);
		-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25), inset 0 -1px 0 rgba(255, 255, 255, 0.9);
}
	.navbar .brand, .navbar .nav > li > a {color:#ddd;}
	
	.navbar .nav .active > a, .navbar .nav .active > a:hover{
		color:#fff;
		background-color:#991100;
	}
	 .navbar .nav a:active {
		color:#fff;
		background-color:#991100 !important;
	}
	footer {
		background-color:#C7C7C7;
		color:#666;
		text-shadow:#fff 0px 1px 0px;
		padding:20px 0px;
		margin:20px 0px 0px 0px;
		background-image:url('assets/bobble.png');
		background-position:center right;
		background-repeat:no-repeat;
		height:150px;
		overflow:hidden;
	}
	
	footer a, footer a:visited, footer a:hover{
		color:#333;
	}
	.content h1 {
		color:#B63322;
		padding-bottom:5px;
		border-bottom:#eee 5px solid;
		margin-bottom:10px;
	}
	.content h2 {
		color:#B63322;
		padding-bottom:3px;
		margin-bottom:6px;
	}
	img.fluid {
		height: auto;
		width: auto;
		max-width: 99%;
	}
	
	.kids-checklists li {
		padding:10px 0;
	}
	
	#sponsorspage li {height:100px;width:260px; float:left; padding:20px;list-style:none;text-align:center}
	#sponsorspage ul {padding:0px;margin:0px;}
	
	.festivaltickets {position:absolute;
		top:30px;
		z-index:9001;
		width:auto;
		left:80%;
		display:none;
	}
	.festivaltickets .cntnr {position:relative;
	width:50%;}
	.festivaltickets a {
		display:block;
		float:right;
		background-image:url(assets/tickets.png);
		background-repeat:no-repeat;
		background-position:0px 0px;
		width:217px;
		height:250px;
		text-decoration:none;
	}
	.festivaltickets a:active {
		background-position:0px -248px;
	}
	.festivaltickets a span {visibility:collapse;}
	
	.tickets,.live {
		
font-weight: bold;
	}
	
	.live {background-color: #269;}
	
	.judges div.span4 div.cont {
	border:3px solid #eee;
	padding:20px;
	height:480px;
	overflow:hidden;
	margin-bottom: 20px;
	
}
.judges div.span4 img {
	padding-bottom:20px;
}

.deliv-partners li {
	border:3px #eee solid;
	margin:2%;
	padding:10px;
	list-style:none;
	float:left;
	width:25%;
	height:100px;
}
.deliv-partners {
	margin:0px;
	padding:0px;
	text-align:center;
}
.sponsors.jhoPE li{
	border:3px #ddd solid;
	width:20.5% !important;
	height:70px !important;
	margin:0px 2% 20px 0 !important;
	padding:40px 1% !important;
}

.sponsors.seniorprefects li{
	width:13% !important;
	border:3px solid #ddd;
	margin:1% !important;
	height:80px !important;
	padding:20px 1% 0px 1% !important;
}
.deputyheads li {
	width:43% !important;
	height:235px !important;
	margin:20px 2% 20px 00px !important;
	border:3px #ddd solid;
	
}
.lineleaders li {
	width:10% !important;
}

.headlineSAP li {
	text-align:center;
	width:100% !important;
	height:300px !important;
}
h2{clear:both}

.navbar .brand {padding-left:80px;
color:#fff;
background-image:url('assets/sap-small.png');
background-repeat:no-repeat;
background-position:20px -1px}

	
	.live {display:none !important;}
	
	
	</style>

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
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="?p=/">Young Rewired State 2012</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="<?PHP echo $page->get_active('As it Happens');?>"><a href="?p=/">As it Happens</a></li>
              <li class="<?PHP echo $page->get_active('Festival of Code');?>"><a href="?p=foc/">Festival of Code</a></li>
              <li class="<?PHP echo $page->get_active('Candidates');?>"><a href="?p=kids/">Candidates</a></li>
              <li class="<?PHP echo $page->get_active('Parents');?>"><a href="?p=parents/">Parents</a></li>
              <li class="<?PHP echo $page->get_active('Internal');?>"><a href="?p=mentors/">Internals &amp; Volunteers</a></li>
              <li class="<?PHP echo $page->get_active('Sponsors');?>"><a href="?p=sponsors/">Sponsors</a></li>
              <li class="<?PHP echo $page->get_active('Contact');?>"><a href="?p=contact/">Contact</a></li>
            </ul>
            <ul class="nav pull-right">
              <li class="tickets"><a href="http://yrs12foc.eventbrite.com/">Tickets</a></li>
              <li class="live"><a href="http://new.livestream.com/keyone/yrs2012">LIVE NOW</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

      <div class="container"  id="container">
  <div class="festivaltickets"><div class="cntnr">
   <a href="http://yrs12foc.eventbrite.com/"><span>Get your tickets now!</span></a>
  </div></div>
			<!---- BREADCRUMBS ---->
            <?PHP /*echo $page->print_nav('/'); */?>
    <div class="tabbable tabs-left">
  <div class="content">
        <?PHP echo $page->print_title(); ?>
        
<?PHP echo $page->print_pills($navigation[$page->breadcrumbs[0]],$url); ?>
        
            <?PHP if(@readfile($page->get_content_path($url,$competition_location))===FALSE) throw new Exception ("File could not be opened for reading."); ?>
</div></div>


    </div> <!-- /container -->

<footer>
    <div class="container">
        <div class="row">
            <div class="span4">
                <h3>Who is Rewired State?</h3>
                <p>We run hack days. We take between 10 – 150 talented developers and give them money, time, space, caffeine, sugar and food, whilst they build cool/creative prototypes to solve your problems. If you'd like to kickstart a new project or accelerate an existing Research & Development programme, get in touch.  <a href="http://rewiredstate.org">Find out more about Rewired State &rarr;</a></p>
            </div>
            <div class="span2">
              <h4>Find Something</h4>
              <ul>
                  <li><a href="/">Homepage</a></li>
                  <li><a href="/kids/">Kids</a></li>
                  <li><a href="/parents/">Parents</a></li>
                  <li><a href="/mentors/">Mentors</a></li>
                  <li><a href="/centres/">Centres</a></li>
                  <li><a href="/sponsors/">Sponsors</a></li>
                  <li><a href="/contact/">Press</a></li>
              </ul>
            </div>
           <div class="span2">
              <h4>&nbsp;</h4>
              <ul>
                  <li><a href="http://new.livestream.com/keyone/yrs2012">Live Stream</a></li>
                  <li><a href="http://yrs12foc.eventbrite.com/">Event Tickets</a></li>
                  <li><a href="http://festivalofcode.eventbrite.com/">Volunteer Tickets</a></li>
                  <li><a href="/mentors/">Volunteer Portal</a></li>
                  <li><a href="/contact/">Contact</a></li>
              </ul>
            </div>
          <div class="span4">
            <h4>Speak to Someone</h4>
            <h5>General</h5>
            <ul>
              <li><a href="/contact/">Contact us &raquo;</a></li>
            </ul>
<h5>Social</h5>
            <ul>
              <li><a href="http://twitter.com/youngrewired">Twitter</a>              </li>
              <li><a href="https://www.facebook.com/youngrewiredstate2012">Facebook</a></li>
            </ul>
          </div>
        </div>
    </div>
</footer>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/bootstrap/js/bootstrap.js"></script>
	        <script>
			$('#yrs-info-tabs a').click(function (e) {
				e.preventDefault();
				$(this).tab('show');
			})
			//$('#yrs-info-tabs a:first').tab('show');
        </script><script>
			$('.carousel').carousel()
			//$('#yrs-info-tabs a:first').tab('show');
        </script>


  </body>
</html>
