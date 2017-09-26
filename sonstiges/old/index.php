<!DOCTYPE html>
<html lang="en">

<head>

	<title>
		Home | su it --blog
	</title>

	<link rel="icon" type="image/png" href="" />

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="index, follow" />

	<link rel="stylesheet" type="text/css" href="/css/main.css" />

</head>

<body>

	<div id="header">

		<div id="banner">

			<canvas height="130" width="800" id="animation_canvas_header">
				Your browser does not support canvas!
			</canvas>

			<div id="headline">
				<a href="index.php" target="_self">
					$ su it --blog
				</a>
				<span id="subtitle">- we sudo everything</span>
				<span class="cursor">|</span> -
			</div>

		</div>


		<div id="tagcloud">
			<canvas id="cloud_canvas" width="300" height="100">
				Your browser does not support canvas!
			</canvas>
			<!-- backup falls canvas nicht geht -->
			<!--input type="text" placeholder="Search Page..." /-->
		</div>

	</div>

	<div id="body">

		<div id="background">
		</div>

		<div id="list">

			<?php
            $file = fopen("article.db", "r") or die("Unable to open file!");

            $list = fread($file, filesize("article.db"));

            fclose($file);
            
            $lines = explode("\n", $list);

            if (empty($_GET["tag"]) == true) {
                for ($i = 0; $i < count($lines); $i += 2) {
                    print_content($lines[$i+1], $lines[$i]);
                }
            } else {
                $tag = $_GET["tag"];

                for ($i = 0; $i < count($lines); $i += 2) {
                    if (in_array($tag, explode(";", $lines[$i])) == true) {
                        print_content($lines[$i+1], $lines[$i]);
                    }
                }
            }

            function print_content($file, $tags)
            {
                $html = file_get_contents($file);

                $title = substr($html, strpos($html, "h1") + 3, strpos($html, "/h1") - strpos($html, "h1") - 4);
                $tags = str_replace(";", ", ", $tags);
                $description = substr($html, strpos($html, "intro") + 11, strpos($html, "/p", strpos($html, "intro")) - strpos($html, "intro") - 15);

                print_article($file, $title, $tags, $description);
            }

            function print_article($filename, $title, $tags, $description)
            {

                echo <<<EOT
				<a href="$filename" target="_self">

					<div class="article">

						<h2>$title</h2>

						$tags

						<p class="intro">
							$description
						</p>

					</div>

				</a>
EOT;
            }

            ?>

            <a href="script_to_rice_your_setup_1.html" target="_self">

                <div class="article">

                    <h2>Scripts To Rice Your Setup Pt.1</h2>

                    <p class="intro">
                        Are you using a bash script for Linux that displays system information like Screenfetch or Archey, Screenfo or Neofetch? Don't you get bored to see the same distro logo all the time?
                        <br/> In this article, I'll show a little bash script on how to change this and rice your setup.
                    </p>

                </div>

            </a>

            <a href="test_article.html" target="_self">
                <div class="article">
                    <h2>Heading article 2</h2>
                    <p class="intro">
                        <img alt="macro" src="/macro1.jpg" /> Some other preview paragraph.
                    </p>
                </div>
            </a>

            <a href="script_to_rice_your_setup_1.html" target="_self">
                <div class="image">
                    <h2>Heading Meme 3</h2>
                    <img alt="macro" src="/macro2.jpg" />
                </div>
            </a>

            <a href="test_article.html" target="_self">
                <div class="image">
                    <p class="intro">
                        <img alt="macro" src="/macro2.jpg" />
                        <br/> Some info about the image; post 0
                    </p>
                </div>
            </a>

        </div>

    </div>

    <div id="footer">

        <canvas height="75" width="800" id="animation_canvas_footer">
            Your browser does not support canvas!
        </canvas>
        <div id="disclaimer">
            Disclaimer
            <br/>
            <br/> &copy; 2017
        </div>
    </div>

    <script src="/js/scroll.js"></script>
    <script src="/js/tagcloud.js"></script>
    <script src="/js/cli_write.js"></script>
    <script src="/js/animation.js"></script>

</body>

</html>