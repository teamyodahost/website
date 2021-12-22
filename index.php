<?php
date_default_timezone_set("America/New_York");
// website protection (private)
require "./domains.php";
// browser cache
header("Cache-Control: max-age=900");

$filecachepath = "./cache/index.html";
if (file_exists($filecachepath)){
$cached=time()-filemtime($filecachepath);
$cached_date = date("l\, F jS\, Y \@ h:i:s A",filemtime($filecachepath));
  if ($cached < 900){
    echo "<!-- Serving file from cache. Cached on $cached_date  -->";
    echo file_get_contents($filecachepath);
    die();
  };
};
ob_start();

function savecache($filecachepath){
  $cachefile = fopen($filecachepath, "w");
  fwrite($cachefile, ob_get_contents());
  fclose($cachefile);
  ob_end_flush();
};
?>

<!DOCTYPE html>
<html>
  <head>
 <!-- Primary Meta Tags -->
<title>YodaHost - Another free & decent image host</title>
<meta name="title" content="YodaHost - Another free & decent image host">
<meta name="description" content="Yeah, there's another one so what?">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://baby-yoda.xyz">
<meta property="og:title" content="YodaHost - Another free & decent image host">
<meta property="og:description" content="Yeah, there's another one so what?">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://baby-yoda.xyz">
<meta property="twitter:title" content="YodaHost - Another free & decent image host">
<meta property="twitter:description" content="Yeah, there's another one so what?">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/4.0.0/github-markdown.min.css">
<style>
	.markdown-body {
		box-sizing: border-box;
		min-width: 200px;
		max-width: 980px;
		margin: 0 auto;
		padding: 45px;
	}

	@media (max-width: 767px) {
		.markdown-body {
			padding: 15px;
		}
	}
</style>
  </head>
  <body>
  <article class="markdown-body">
  <h1>YodaHost</h1>
	  <b>It's been fun</b> while it lasted. Well, this version anyways. We are starting a new hosting service. We don't know when or what, but coming! All of your files will move over and as of now, sign-ups are disabled. On move, account tokens will be changed in favor of a new system. Thanks <3 
	  <p>A decent yet free* image hosting for <span id="examples"></span>. In closed beta. Apply in <a href="https://discord.gg/BNcA9nsV8s" target="_blank">our Discord server.</a></p>
	  <p><b>NEW!</b> <a href="https://dashboard.baby-yoda.xyz">Try our new dashboard</a>, out in beta.</p>
	  <h3>Stats</h3>
	  <ul>
		  <li><b><?php system("du -sh images | grep -o '^\S*'") ?></b> disk space used</li>
		  <li><b><?php echo count(scandir("./images/")); ?></b> files stored</li>
		  <li><b><?php $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, "https://api.baby-yoda.xyz/count");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	echo curl_exec($ch);curl_close($ch); ?></b> users</li>
	  </ul>
</article>
    <footer>
      <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
      <script>
var t = new Typewriter('#examples', {
  autoStart: true,
  loop: true,
  delay: 75,
  strings: ['Discord', 'Guilded', 'Hiven', 'Twitter', 'Facebook', 'Tumblr', 'YouTube', 'Whatsapp', 'Messenger', 'Instagram', 'TikTok', 'Reddit', 'LinkedIn', 'Snapchat', 'Pintrest', 'Telegram', 'Medium', 'Signal']
});

	      
      </script>
    </footer>
  </body>
</html>
<?php savecache($filecachepath); ?>
