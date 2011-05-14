
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="charset=utf-8" />
		<title>Vierware - Plugins & Extensions</title>
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
			<p>Based in Australia, Brisbane, <mark>Vierware</mark> offers many web services and solutions, such as Website Design, development of Software and Web/Cloud-based products.</p>
			<p>This site is <mark>HTML5 ready</mark> - meaning it uses the latest technology available.</p>
			<span style="line-height:25px;"><img src="./img/fblocker48.png" alt="Extension" style="float:left;height:30px;"/><h2 style="margin-left:40px;">FBLocker</h2></span>
			<p>Now, you can use a neat extension called <mark>FBLocker</mark> for locking your facebook page, while
			remaining logged in. This will prevent users (to a large degree) from being able to post random and/or offensive status' and add scores of strangers. We hope you enjoy.
			If your a coder, feel free check out the source code!</p>
			<span style="line-height:25px;"><img src="./img/fblocker48.png" alt="Extension" style="float:left;height:20px;"/><a href="files/fblocker.crx" style="margin-left:10px;">Google Chrome Extension</a> Download</span><br/>
			<span style="line-height:25px;"><img src="./img/fblocker48.png" alt="Source" style="float:left;height:20px;"/><text style="margin-left:10px;">and for coders: </text><a href="files/fblocker.zip">the complete (zipped) contents</a></span>
			<p>If you would like added functionality to this extension, or some other development, <a href="contact.php">contact Vierware</a>, with easy-to-use Ajax submission!</p>
		</div>
	</section>
	<footer>
		<?php require("minihtml/footer.html"); ?>
	</footer>
	</body>
</html>
