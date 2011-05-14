
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
			<h1><mark>Blog</mark></h1>
			<h2><mark>Web Hosting - Peer-to-Peer Style</mark></h2>
			<p>
				HTML5's new spec allows P2P (peer-to-peer) connections, meaning that with a little support from the server, bandwidth consumption can be shared around.
				Let me explain how its done, including some security measures so the distributed web isn't exploitable by serving fake pages to your peers:
				<ul>
					<li>Client A connects to Server www.example.com, and requests <code>index.html</code></li>
					<li>Server serves <code>index.html</code> to Client A</li>
					<li>Client B connects to Server www.example.com, and requests <code>index.html</code></li>
					<li>Server replies with "I already served this to Client A, get it from him", as well as a hash of <code>index.html</code> (SHA256)</li>
					<li>Client B connects to Client A, and requests the content of <code>index.html</code></li>
					<li>Client A send <code>index.html</code> to Client B, who checks the hash of the page before displaying it</li>
				</ul>
				And thats it! The server had to do next-to-no work in giving the same content to Client B as Client A, freeing up the server CPU and using less bandwidth.
				However, there are some downsides: (which may be worked around through some special tricks)
				<ul>
					<li>Client A may be unhappy he uses 2x the bandwidth he originally needs (Avoided by using an Opt-Out feature)</li>
					<li>If the page is dynamic (eg. a PHP page with <code>echo "Hello, $name";</code>, Client A cannot send the entire page to Client B (Avoided with fragmented pages, some info from server, some from other peers)</li>
					<li>Extra time to load page - Client B makes 2 connections, and Client A may be slow, or offline</li>
				</ul>
			</p>
			
			<h2><mark>IOU App</mark></h2>	
			<p>
				Develop a social site to allow you to place/receive IOU's to users to handle small debts including cash and other non-monetary items.
				Features to include:
				<ul>
					<li>Facebook integration for commenting</li>
					<li>Instant sign in for Facebook and Google users</li>
					<li>Send users updates via email to keep in touch</li>
				</ul>
			</p>
			
			<h2><mark>File Sharing - Peer-to-Peer Style</mark></h2>	
			<p>
				As with the P2P web hosting mentioned previously, HTML5 allows peer-to-peer connections, as well as file reading and writing.
				This means we can share files amongst peers, without the server getting too involved, and for those that prefer security, almost no logs or information is stored on the server.
				Here is an example:
				<ul>
					<li>Client A uploads File X to his *browser* (not the server)</li>
					<li>Client A sends only the hash of File X to Server, and is given an ID to reference the file Client A is hosting</li>
					<li>Client B is given the ID of File X from Client A (in some manner), and requests said file from Server</li>
					<li>Server looks up table, and informs Client B to connect to Client A, and Client B is also given the hash of File X which is stored on Server</li>
					<li>Client B connects to Client A, and retrieves File X, comparing to the hash it received from Server</li>
					<li>Client C may now do the same thing, downloading File X partially from Client A and Client B</li>
				</ul>
				An addition/modification to this idea is to use the existing .torrent file and infrastructure, where the client uploads a torrent file to the browser,
				and then procedes to download/upload to peers, which may not be possible if torrents use multiple connections or odd ports/protocols (UDP etc).
			</p>	
		</div>
	</section>
	<footer>
		<?php require("minihtml/footer.html"); ?>
	</footer>
	</body>
</html>

