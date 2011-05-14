<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="charset=utf-8" />
		<title>Vierware</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<?php require("js/common.js") ?>
		<script>
			$(document).ready(function() {
				$("nav ul li a").hover(function(object){
					$("nav #bar #selector").stop(true).css("opacity","");
					$("nav #bar #selector").fadeIn(200).animate(
						{left: ($(object.currentTarget).position().left-$("nav #bar").position().left-2)},
						400
					);
				}, function(){$("nav #bar #selector").delay(1000).fadeOut(1000);});
				$("nav #bar #selector").hide();
				if ($.browser.msie) {
					/* send hate mail */		
					$("nav").css("font-size","15px");
					$("section").width("100%");
					$(".logocontainer").css("left","0px");
					$("header").css("height","3em");
					$("header div").css("margin-top","0.7em");

					var upgrademessage = "Feel like a change? Although not necessary for this site, you may want to consider "
						upgrademessage += "upgrading your browser, to <a href='http://www.google.com/chrome'>Google Chrome</a>, "
						upgrademessage += "<a href='http://www.mozilla.com/firefox/'>Mozilla Firefox</a>, or "
						upgrademessage += "<a href='http://www.apple.com/safari/'>Safari</a>."				
					$("#upgradebrowser").html(upgrademessage);
					$("#upgradebrowser").show();
				}else{
					var upgrademessage = "Vierware Development would like to thank you for supporting the Web by not using "
						upgrademessage += "Internet Explorer, which is not very standard compliant, nor open-source."
					$("#upgradebrowser").html(upgrademessage);
					$("#upgradebrowser").show();
				}
				
				$.ajaxSetup({
					error: function(xhr) {
						$.post(
							"backend/ajaxerror.php",
							{page:this.url,error:xhr.status,errortext:xhr.statusText}
						);
					}
				});
				$.post(
					"backend/pagerequest.php",
					{page:window.location.href}
		      );
			});
		</script>
		<link rel="stylesheet" href="css/main.css" />
		<link rel="stylesheet" href="css/nav.css" />
	</head>
	<body>
	
	<?php require("minihtml/header.html"); ?>
	
	<section>
		<div>
			<p>Based in Australia, Brisbane, <mark>Vierware</mark> offers many services and solutions, for both Software and Web/Cloud-based products.</p>
			<p style="font-size:25px;margin-bottom:0px;text-align:center;">Are You Interested In...</p>
			<div class="quicklinks">
				<div class="quicklink"><a href="software.php" title="Vier Development:Software">Software</a></div>
				<div class="quicklink"><a href="websites.php" title="Vier Development:Web">A Website</a></div>
				<div class="quicklink"><a href="services.php" title="Backups, administration and more">All Services</a></div>
			</div><br/><br/><br/><br/>
			<p>This site is <mark>HTML5 ready</mark> - meaning it uses the latest technology available (which will be fully realised in 2012!).
			Web browsers are making haste to impliment the wealth of features available in HTML5, however it is backward compatible with older browsers (after a few tricks for Internet Explorer).
			If your a coder, feel free check out the source code!</p>
			<p>The Vierware web site also makes extensive use of <mark>CSS3</mark>, the newest and most attractive CSS version being supported in 2010/2011 by modern browsers.
			The CSS is being used on the  <mark>curved corners</mark>, also on the <mark>drop shadow</mark> for both text (eg. navigation bar) and borders.  CSS3 is also
			responsible for this site's <mark>gradient backgrounds</mark> (eg. navigation bar).</p>
			<span style="display:none;line-height:25px;"><img src="./img/webicon.png" alt="Web Development" style="float:left;"/><a href="websites.php" style="margin-left:10px;">Web Development</a> - Web apps and sites, from simple, static pages to high-grade dynamic site content with a management system.</span>
			<span style="display:none;line-height:25px;"><img src="./img/webicon.png" alt="Web Development" style="float:left;"/><a href="software.php" style="margin-left:10px;">Software Development</a></span>
			<p><mark>Web Development</mark>, <mark>Backups</mark>, <mark>Administration</mark>, and 
			<mark>Software</mark> are among the list of services available, to see a full list, visit the <a href="services.php">IT Services page</a>.</p>
			<p id="upgradebrowser" style="display:none;"></p>
		</div>
	</section>
	<footer>
		<?php require("minihtml/footer.html"); ?>
	</footer>
	</body>
</html>
