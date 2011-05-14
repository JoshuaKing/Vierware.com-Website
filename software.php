<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="charset=utf-8" />
		<title>Vierware - Software Development</title>
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
			<p>Designing clean, elegant code whilst containing all the functionality required is the goal of <mark>Vier Software Development</mark></p>
			<p>The software department is open to small and mid-sized projects. If you would like some software developed,
			please <a href="contact.php" >Contact Vierware: Software</a>.</p>
			<p>The main programming languages used in development are <mark>C/C++</mark> and <mark>Java</mark>, however many others can be used.</p>
			<p style="font-size:25px;margin-bottom:0px;text-align:center;">I'd Like To...</p>
			<div class="quicklinks">
				<div class="quicklink" style="width:45%;"><a href="contact.php" title="Contact Vier Development">Request Software</a></div>
				<div class="quicklink" style="width:45%;"><a href="websites.php" title="< Vier Development:Web >">go to Web Development</a></div>
			</div><br/><br/><br/>
		</div>
	</section>
	<footer>
		<?php require("minihtml/footer.html"); ?>
	</footer>
	</body>
</html>
