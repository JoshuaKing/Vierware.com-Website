<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="charset=utf-8" />
		<title>Vierware - Web Development</title>
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
			<mark>Vier Web Development</mark> is devoted to designing clean, effective web sites that make use of the latest technology available.</p>
			<p><mark>Modern web sites need modern technology</mark>, for your company to succeed in the future, being one step ahead of the rest will garantee a better result.
			For more information about the latest, greatest web technology used, take a look at the  <a href="webtechnology.php">Latest Web Technology</a> page.</p>		
			<p><mark>Security</mark> is understood poorly by many designers, and any sensitive data or information, such as a user database, or (worst case) your entire web site may be
			vulnerable using novice, common techniques which simply aren't accounted for. My designs are made to be secure and are thoroughly tested for flaws beforehand.</p>				
			<p>Many web developers on the internet make use of free web site designers that create cheap, dirty looking sites which are impossible to maintain
			due to their messy coding backend.  These sites often break once modifications are made.  At Vier Development however, web sites are designed by hand,
			allowing <mark>fast, efficient web sites</mark> that deliver <mark>reliable, attractive web content</mark> to visitors.</p>
			<p style="font-size:25px;margin-bottom:0px;text-align:center;">Would You Like Too...</p>
			<div class="quicklinks">
				<div class="quicklink" style="width:45%;"><a href="contact.php" title="Request a quote, or ask a question.">Get in touch</a></div>
				<div class="quicklink" style="width:45%;"><a href="webtechnology.php" title="What technology does Vier Development use?">Learn about web technology used</a></div>
			</div><br/><br/>
		</div>
	</section>
	<footer>
		<?php require("minihtml/footer.html"); ?>
	</footer>
	</body>
</html>
