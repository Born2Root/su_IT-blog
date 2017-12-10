<?php
if (empty($_GET["tag"]) == true) {
	$search_tags = null;
} else {
	$search_tags = substr($_GET["tag"], 0, -1);
}

function print_article($h1, $h2, $article_tags, $img, $a)
{
	echo <<<EOT

			<a href="$a" target="_self" class="post_link">
				<div class="post">
					<img src="$img" alt="$img" class="image post_image image_right"/>
					<h1>$h1</h1>
					<h2>$h2</h2>
					<hr>
					<div class="tags">
EOT;
	foreach ($article_tags as $article_tag) {
		echo <<<EOT

						<div class="tag_div">
							<img src="/icon/hexagon.png" alt="tag" class="tag_img" />
							<div class="tag_text">$article_tag</div>
						</div>
EOT;
	}
	echo <<<EOT

					</div>
				</div>
			</a>

EOT;
}

function print_link($link)
{
	global $search_tags;
	$text = "";
	if ($search_tags == null) {
		$text .= 'href="index.php?tag='.$link.';"';
	} else {
		if (in_array($link, explode(";", $search_tags)) == true) {
			$text .= 'href="'.str_replace($link.";", "", "$_SERVER[REQUEST_URI]").'"';
		} else {
			$text .= 'href="'."$_SERVER[REQUEST_URI]".$link.';"';
		}
	}
	if (in_array($link, explode(";", $search_tags)) == true) {
		$text .= ' class="active"';
	}
	return $text;
}
?>
<!doctype html>
<html lang="en">

<head>

	<title>
		su IT --blog main page | suit-blog.net
	</title>

	<!-- meta -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="This is the homepage of the su IT --blog. Here, you can find various information technology, programming and technical topics | suit-blog.net">
	<meta name="keywords" content="linux, raspberry, blog, articles, website, suit, sudo, it, scripts, bash, programming, terminal, diy">
	<meta name="robots" content="index, follow">

	<!-- main css -->
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<!-- mobile css -->
	<link rel="stylesheet" media="only screen and (max-width: 767px)" type="text/css" href="/css/mobile.css">
	<!-- desktop css -->
	<link rel="stylesheet" media="only screen and (min-width: 768px)" type="text/css" href="/css/desktop.css">

	<!-- favicon -->
	<link rel="icon" type="image/png" href="/icon/favicon_64.ico">

	<!-- web app manifest -->
	<link rel="manifest" href="/manifest.json">

	<!-- font awesome -->
	<link href="/css/fontawesome-all.min.css" rel="stylesheet">

</head>

<body>

	<div id="header">

		<div id="banner" class="canvas">

			<canvas height="50" width="200" id="animation_canvas_header">
			</canvas>

			<i class="fa fa-bars" id="burger"></i>

			<div id="headline">
				<a href="index.php" target="_self">
					$ su IT --blog
				</a>
				<div id="subtitle">
					<span id="console">- we sudo everything</span>
					<span class="cursor">|</span> -
				</div>
			</div>

			<a target="_self" href="index.php">
				<img alt="logo" src="logo/logo_1.png" id="logo">
			</a>
		</div>

		<div id="menu">
			<ul>
				<li>
					<a target="_self" <?=print_link("linux")?>>
						Linux
					</a>
				</li>
				<li>
					<a target="_self" <?=print_link("scripts")?>>
						Scripts
					</a>
				</li>
				<li>
					<a target="_self" <?=print_link("raspberry")?>>
						Raspberry Pi
					</a>
				</li>
				<li>
					<a target="_self" <?=print_link("programming")?>>
						Programming
					</a>
				</li>
				<li>
					<a target="_self" href="gallery.html">
						Gallery
					</a>
				</li>
				<li>
					<a target="_self" <?=print_link("various")?>>
						Various
					</a>
				</li>
			</ul>
		</div>
	</div>

	<div id="body">

		<div id="nav_right" class="nav">
			<div id="top">
				<i class="fa fa-arrow-up"></i> Top
			</div>
		</div>

		<div id="nav_left" class="nav">
			<div>
				<a target="_blank" rel="noopener" href="/about_us.html#mate">
					<i class="fa fa-coffee"></i> Buy Us A Club-Mate
				</a>
			</div>

			<div>
				<a target="_blank" rel="noopener" href="/about_us.html#book">
					<i class="fa fa-shopping-cart"></i> Book Us
				</a>
			</div>
		</div>

		<div id="background">
		</div>

		<?php

		if ($search_tags == null) {
			echo <<<EOT
		<div id="welcome">
		<!--img alt="logos" src=<?php
			echo '"logo/logo_'.rand(1, 19).'.png"';
		?>-->
		<img alt="logo" src="logo/logo_1.png">

		<h1>
			Hey there, <br>looking for made to measure content?
		</h1>

		<p>
			It is great to see that you found this page :D
			<br>If you are interested in any computer tech topic, you can find something here.
			<br>On this blog, we are showing of, some of the things we done. And hopefully we can inspire you.
			<br>
			Here are some of the topics we will cover soon:
		</p>

		<ul>
			<li>
				<i class="fa fa-linux"></i> Linux
			</li>
			<li>
				<i class="fa fa-css3"></i> Web design
			</li>
			<li>
				<i class="fa fa-html5"></i> Websites
			</li>
			<li>
				<i class="fa fa-code"></i> Scripting
			</li>
			<li>
				<i class="fas fa-microchip"></i> Hardware projects
			</li>
			<li>
				<i class="fas fa-images"></i> Pictures
			</li>
			<li>
				Animations
			</li>
			<li>
				Memes
			</li>
			<li>
				<a href="about_us.html" target="_blank" rel="noopener">
					Read more...
				</a>
			</li>
		</ul>
	</div>
EOT;
		}

		?>

		<div id="container">
			<?php

			$file = fopen("posts.txt", "r") or die("Unable to open file!");
			$list = fread($file, filesize("posts.txt"));
			fclose($file);

			$lines = explode("\n", $list);

			for ($i = 2; $i < count($lines); $i += 5) {
				$all_tags = true;
				foreach (explode(";", $search_tags) as $element) {
					if (in_array($element, explode(";", $lines[$i])) == false) {
						$all_tags = false;
					}
				}

				if ($all_tags == true || $search_tags == null) {
					$h1 = $lines[$i-2];
					$h2 = $lines[$i-1];
					$article_tags = explode(";", $lines[$i]);
					$img = "articles/".$lines[$i+1];
					$a = "articles/".$lines[$i+2];

					print_article($h1, $h2, $article_tags, $img, $a);
				}
			}

			?>

		</div>

	</div>

	<div id="footer" class="canvas">
		<canvas height="50" width="200" id="animation_canvas_footer">
		</canvas>
		<div id="disclaimer">
			There is nothing more to discover down here ¯\_(ツ)_/¯
			<br> <i class="fas fa-closed-captioning"></i> 2017
			<a href="/impressum.html" target="_blank" rel="noopener">impressum</a> | <a href="/about_us.html" target="_blank" rel="noopener">about us</a>
		</div>
	</div>

	<script src="/js/animation.js" async></script>
	<script src="/js/cli_write.js" async></script>
	<script src="/js/main_nav.js" async></script>
	<script src="/js/scroll.js" async></script>

</body>

</html>
