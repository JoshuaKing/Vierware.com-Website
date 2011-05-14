<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="charset=utf-8" />
		<title>Vierware - Contact Details</title>
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
						alert("Ajax request to "+this.url+" failed, sorry.");
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
				
				$("#emailaddress").click(function() {
					if ($("#emailaddress").val()=="[ Your Email Address ]")
						$("#emailaddress").val("");
				});
				
				$("#emailaddress").blur(function() {
					if ($("#emailaddress").val()=="")
						$("#emailaddress").val("[ Your Email Address ]");
				});
				
				$("#message").click(function() {
					if ($("#message").html()=="[ Your Message... ]")
						$("#message").html("");
				});
				
				$("#message").blur(function() {
					if ($("#message").val()=="")
						$("#message").html("[ Your Message... ]");
				})
				
				$("#contactform").submit(function() {
					if ($("#emailaddress").val()=="[ Your Email Address ]") {
						alert("Please enter an email address."); 
						return false;
					}					
					if ($("#message").html()=="[ Your Message... ]") {
						alert("Please enter a message."); 
						return false;
					}
					$.ajax({
						url: "backend/send.php",
						type: "POST",
						data: {email: $("#emailaddress").val(),message: $("#message").val()},
						success: function(response) {
							alert(response);
						}
			      });
			      return false;
				});
			});
		</script>
		<link rel="stylesheet" href="css/main.css" />
		<link rel="stylesheet" href="css/nav.css" />
		<link rel="stylesheet" href="css/contact.css" />
	</head>
	<body>
	
	<?php require("minihtml/header.html"); ?>

	<section>
		<div>
			<div class="littlebox" style="">		
					<mark><strong>Contact Details:</strong></mark><br/>
					<strong>Name: </strong>Joshua King<br/>
					<strong>Email: </strong><a href="mailto:admin@Vierware.com">admin@Vierware.com</a><br/><br/>
					<mark><strong>Location:</strong></mark><br/>
					Brisbane City<br/>
					Queensland, Australia<br/>
			</div>
			<noscript><style>.jsonly { display: none; }</style>If you would like to use the <mark>Ajax contact form</mark>, please enable Javascript.</noscript>
			<span class="jsonly" style="text-align:center;width:100%;min-width:400px;">
				<p><br/>...or use this <mark>Ajax contact form</mark>:<br/></p>
				<form id="contactform">
					<input type="email" id="emailaddress" value="[ Your Email Address ]" />
					<textarea id="message">[ Your Message... ]</textarea>
					<input id="sendmessage" type="submit" value="Send Message" />
				</form>
			</span>
		</div>
	</section>
	<footer>
		<?php require("minihtml/footer.html"); ?>
	</footer>
	</body>
</html>

