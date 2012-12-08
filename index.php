<!DOCTYPE html>
<html manifest="manifest.php">
<!--[if IEMobile 7 ]>    <html class="no-js iem7"> <![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Dainor&#279;lis</title>
        <meta name="description" content="Lietuvisku dainu zodziai">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="cleartype" content="on">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="img/touch/apple-touch-icon.png">

        <!-- For iOS web apps. Delete if not needed. https://github.com/h5bp/mobile-boilerplate/issues/94 -->
        
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <link rel="apple-touch-startup-image" href="img/startup/startup.png">

        <!-- This script prevents links from opening in Mobile Safari. https://gist.github.com/1042026 -->
        <!--
        <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>
        -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/jquery.mobile-1.2.0.min.css" />
		<script src="js/vendor/jquery-1.8.2.min.js"></script>
		<script src="js/vendor/jquery.mobile-1.2.0.min.js"></script>    
        <script src="js/vendor/modernizr-2.6.1.min.js"></script>

        <script src="js/vendor/zepto.min.js"></script>
        <script src="js/helper.js"></script>
        <script src="js/main.js"></script>
		
	</head>
    <body>

        <!-- Add your site or application content here -->
		<div data-role="collapsible" data-collapsed="true" data-theme="e" data-content-theme="c" id="main">
			<h3>Dainor&#279;lis<span id="loadingSongs" style="margin-left: 20%;">Pra&#353;ome Palaukti...</span></h3>
			<div data-role="collapsible" data-theme="c" data-content-theme="c" id="megstamiausios">
				<h3>M&#279;gstamiausios</h3>
				<div data-role="collapsible-set" id="megstamiausiosDainos"></div>
			</div>

			<div data-role="collapsible" data-content-theme="c">
				<h3>Visos Dainos</h3>
				<div data-role="collapsible-set" id="visosDainos"></div>
			</div>
			<!--<div data-role="collapsible" data-theme="c" data-content-theme="c">
				<h3>Pagalba</h3>
				<p>I'm a child collapsible.</p>
					<div data-role="collapsible" data-theme="d" data-content-theme="d">
						<h3>Nested inside again.</h3>
						<p>Three levels deep now.</p>
					</div>
			</div>
			<p>I'm the collapsible content. By default I'm open and displayed on the page, but you can click the header to hide me.</p>-->
		</div>
		
        <script>
            var _gaq=[["_setAccount","UA-36167227-1"],["_trackPageview"]];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
            g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
            s.parentNode.insertBefore(g,s)}(document,"script"));
        </script>
    </body>
</html>
