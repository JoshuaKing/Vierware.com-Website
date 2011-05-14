<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="charset=utf-8" />
		<title>Vierware - Web Technology</title>
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
				$(".webtechnology div").hide();
				var leftbound = $("#lastelementleft").position().top+$("#lastelementleft").height();
				var rightbound = $("#lastelementright").position().top+$("#lastelementright").height();
				var lowerbound = leftbound>rightbound ? leftbound : rightbound;
				$("section").children("div").height(lowerbound-$("section").position().top+$("#lastelements").height());
				if ($.browser.msie) {
					/* send hate mail */		
					$("nav").css("font-size","15px");
					$("section").width("100%");
					$(".logocontainer").css("left","0px");
					$("header").css("height","3em");
					$("header div").css("margin-top","0.7em");
				}
				
				$(".webtechnology .extracontent").click(function() {
					if ($(this).html()=="(more)") {
						$(this).siblings(".more").slideToggle(function(){
							var leftbound = $("#lastelementleft").position().top+$("#lastelementleft").height();
							var rightbound = $("#lastelementright").position().top+$("#lastelementright").height();
							var lowerbound = leftbound>rightbound ? leftbound : rightbound;
							$("section").children("div").height(lowerbound-$("section").position().top+$("#lastelements").height());
						});
						$(this).html("(less)");
					} else {
						$(this).siblings(".more").slideToggle(function(){
							var leftbound = $("#lastelementleft").position().top+$("#lastelementleft").height();
							var rightbound = $("#lastelementright").position().top+$("#lastelementright").height();
							var lowerbound = leftbound>rightbound ? leftbound : rightbound;
							$("section").children("div").height(lowerbound-$("section").position().top+$("#lastelements").height());
						});
						$(this).html("(more)");
					}
				})
				
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
		<noscript><style>
			.extracontent {
				display: none;
			}
		</style></noscript>
		<link rel="stylesheet" href="css/main.css" />
		<link rel="stylesheet" href="css/webtechnology.css" />
		<link rel="stylesheet" href="css/nav.css" />
	</head>
	<body>
	
	<?php require("minihtml/header.html"); ?>
	
	<section>
		<div style="height:1000px;">
			<p>The latest technology is needed to ensure your content is up to date and brings the <mark>best user experience</mark> to the consumers. If you
			are not currently using any of these technologies, it is recommended that you start. The more technology you use, the better your site will look and feel, as well as
			the backend being cleaner and easier to maintain.</p>
			<p>Here is a list of some of the latest web standards and technology used in modern sites:</p>
			<div id="lastelementleft" style="float:left;padding:0px;width:45%;">
				<div class="webtechnology">
					<a name="ajax"></a>
					<h1>Ajax & XML</h1>
					<p>Used in sites such as huge companies such as <mark>Facebook and Google</mark>, this technology allows data to be sent to the server in the background. 
					This reduces page refreshes and wait time, as well as <mark>saving bandwidth</mark>.</p>
					<div class="more">
						<p>Ajax stands for "Asynchronise Javascript And XML - The ajax contact form on the <a href="contact.php" >Contact Details</a> page is an example
						of an ajax request.</p>
						<p>Without leaving the page, the browser submits information without needing to reload the page, and lose any information
						currently in input fields.</p>
						<p>It also means the server does not need to resend the entire page - which can add up to a lot of bandwidth (and
						therefore, money).</p>
					</div>
					<a href="#ajax" class="extracontent">(more)</a>
				</div>
				<div class="webtechnology">
					<a name="css3"></a>
					<h1>CSS3</h1>
					<p>The latest CSS - it brings many improvements to the design and attractiveness of web pages. This site uses it extensively, the drop shadows,
					border radius (curved corners), and the gradient background color is all made using CSS3.</p>
					<div class="more">
						<p>Web browsers are becoming more compatible with CSS3, still, it has a fair way to go, and fallbacks should be used to ensure many browsers
						render the effects correctly.</p>
					</div>
					<a href="#css3" class="extracontent">(more)</a>
				</div>
				<div class="webtechnology">
					<a name="jquery"></a>
					<h1>jQuery</h1>
					<p>jQuery and jQuery UI are perhaps <i>the</i> standard javascript libraries, they handles many things and helps keep code <span class="highlight">clean
					and easy to read,	and mantain</span>, as well as being cross-browser compatible.  It also provides some really neat effects! If you have javascript
					enabled, the "more" buttons use jQuery's slide effect.</p>
					<div class="more">
						<p>The standard jQuery library is hosted on Google, which means that as almost all new sites link to it, the library should be in cache,
						meaning a <mark>faster load time</mark>, and no bandwidth consumption on your part. jQuery also supports Ajax, plugins and basic effects, while jQuery UI
						is designed to be used for the <strong>U</strong>ser <strong>I</strong>nterface perspective</p>
						<p></p>
					</div>
					<a href="#jquery" class="extracontent">(more)</a>
				</div>
			</div>
			<div id="lastelementright" style="float:right;padding:0px;width:45%;">
				<div class="webtechnology">
					<a name="html5"></a>
					<h1>HTML5</h1>
					<p><mark>HTML5 is bleeding edge</mark> - used and promoted extensively by <mark>Apple</mark>, offered by <mark>YouTube</mark>, and is the latest formatting language to be used on the web
					(HTML4.01, the current, superseded HTML, <mark>has been used since 1999!</mark>).
					It is being incorporated into the latest browsers of Google Chrome, Mozilla Firefox, Safari, and Internet Explorer.
					<div class="more">
						<p>HTML5 supports many new tags which make the web compatible for more people on more platforms. For example, the &lt;video&gt; tag
						has been made to support those that do not have/want to use Adobe Flash as a video streamer. This allows easier use of videos on
						the site as the entire flash streaming component is no longer required.</p>
						<p>Soon, client authentication using the &lt;keygen&gt; tags will be possible, as well as browser validation of email, url, and phone number
						input fields.</p>
						<p>It is also better for 'Web 2.0' - the Symantic Web. Making it easier for search engines such as Google to crawl your site and make
						effective analysis of it.</p>
					</div>
					<a href="#html5" class="extracontent">(more)</a>
				</div>
				<div class="webtechnology">
					<a name="mysqli"></a>
					<h1>MySQL Improved</h1>
					<p>The latest MySQL is used server-side, and although it has been out for a couple versions now, it is still not commonly used.</p>
					<p>It provides faster execution of queries, and most of all, if used correctly it <mark>prevents SQL injection attacks</mark> completely, something
					which is so common its not funny.</p>
					<div class="more">
						<p>MySQLi makes use of prepared statements, allowing similar queries which are executed many times to occur at a much faster speed.</p>
						<p>Injection attacks have been used all over the internet to wreak havok with site content.  It may be used to steal usernames and password's,
						or delete every table on the database, leading to <mark>possible total destruction</mark> if no backups were made. In MySQLi, using prepared statements prevents
						SQL injection attacks from occurring completely!</p>
					</div>
					<a href="#mysqli" class="extracontent">(more)</a>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<?php require("minihtml/footer.html"); ?>
	</footer>
	</body>
</html>
