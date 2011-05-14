<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="charset=utf-8" />
		<title>Vierware - Services</title>
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
			<p>Vier Development strives to maintain as many services as practical for its customers. If you have a unique request, please go right ahead
			and <a href="contact.php" >get in contact</a>. The services offered are listed below.</p><br/>
			<p><mark>Web Site Development</mark> - Get a website designed to be attractive, functional, and secure, using all the latest tech (see
			<a href="webtechnology.php" >Latest Web Technology</a>).  To make a request, visit the <a href="contact.php" >Contact Page</a>.</p>
			<p><mark>External Security Logging and Administration</mark> - After a bit of modification to the backend system, your logs can be backed up
			externally, and administrated by Vier Development, to catch any suspicious activity and if you are hacked, to trace back the attack to its source.</p>
			<p><mark>SQL Database Backups</mark> - Backup your entire SQL database(s), an extra safeguard in case of an accidental modification
			is made, or your data mysteriously disappeared. It is said there are 2 types of people in this world, those who backup, and those who have never had
			a hard drive fail.</p>
			<p><mark>Software Development</mark> - Proficient in C/C++, Java, Python, and even ASM, make a request if you
			need software developed for any cause.</p>
			<p><mark>Web Site Security Testing</mark> - Many sites have low security, make sure yours isn't one of them, and ensure your site,
			hardware, and databases aren't compromised by an overlooked flaw.</p>
			<p style="font-size:25px;margin-bottom:0px;text-align:center;">I'd Like To...</p>
			<div class="quicklinks">
				<div class="quicklink" style="width:45%;"><a href="contact.php" title="Contact Vier Development">Request a service</a></div>
				<div class="quicklink" style="width:45%;"><a href="/" title="[ Vier Development ]">go to Home</a></div>
			</div><br/><br/><br/>
		</div>
	</section>
	<footer>
		<?php require("minihtml/footer.html"); ?>
	</footer>
	</body>
</html>