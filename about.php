<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="charset=utf-8" />
		<title>Vierware - About</title>
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
			<p>My name is Joshua King, I a 2nd year in <mark>Software Engineering</mark> at the prestigious <mark>University of Queensland</mark> (Australia).</p>
			<p>I have been programming since grade 7 (12 Years of age), and have learnt many programming languages over the years,
			including <mark>Assembly, C/C++, Java, Python</mark>, and Web languages:
			<mark>(X)HTML, PHP, MySQL, Javascript/Ajax/jQuery, and XML</mark>.</p>
			<p>I have worked for Strategy Optimisation Systems Pty Ltd, an Australian-based mining and IT company who work as consultants
			for multi national coorperations.  I have worked on their C++ software, and assisting in the maintenance of their Finance System,
			as well as the developer of their new ERP & Finance Management web app, which is planned to become a product on its own, available for all.</p>
			<p>I am interested in complimenting my knowledge with real-world software, in the PC and Web-based applications of programming.</p>			
		</div>
	</section>
	<footer>
		<?php require("minihtml/footer.html"); ?>
	</footer>
	</body>
</html>

