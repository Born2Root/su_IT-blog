<?php
if (empty($_GET["tag"]) == true) {
    $tag = null;
} else {
    $tag = $_GET["tag"];
}
?>
<!doctype html>
<html lang="en">

<head>

    <title>
        Home | su it --blog
    </title>

    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="index, follow" />

    <!-- main css -->
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <!-- mobile css -->
    <link rel="stylesheet" media="only screen and (min-width: 768px)" type="text/css" href="/css/desktop.css">

    <!-- favicon -->
    <link rel="icon" type="image/png" href="" />

    <!-- font awesome -->
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css" />

</head>

<body>

    <div id="header">

        <div id="banner" class="canvas">

            <canvas height="50" width="200" id="animation_canvas_header">
            </canvas>

            <i class="fa fa-bars" aria-hidden="true" id="burger" onclick="toggle_menu();"></i>

            <div id="headline">
                <a href="index.php" target="_self">
                    > su IT --blog
                </a>
                <div id="subtitle">
                    <span id="console">- we sudo everything</span>
                    <span class="cursor">|</span> -
                </div>
            </div>
        </div>

        <div id="menu">
            <ul>
                <li>
                    <a href="index.php?tag=linux" target="_self" <?php if ($tag == "linux") {
                        echo 'class="active"';
} ?>>
                        Linux
                    </a>
                </li>
                <li>
                    <a href="index.php?tag=blender" target="_self" <?php if ($tag == "blender") {
                        echo 'class="active"';
} ?>>
                        Blender
                    </a>
                </li>
                <li>
                    <a href="index.php?tag=memes" target="_self" <?php if ($tag == "memes") {
                        echo 'class="active"';
} ?>>
                        Memes
                    </a>
                </li>
                <li>
                    <a href="index.php?tag=pictures" target="_self" <?php if ($tag == "pictures") {
                        echo 'class="active"';
} ?>>
                        Pictures
                    </a>
                </li>
                <li>
                    <a href="index.php?tag=scripts" target="_self" <?php if ($tag == "scripts") {
                        echo 'class="active"';
} ?>>
                        Scripts
                    </a>
                </li>
                <li>
                    <a href="index.php?tag=various" target="_self" <?php if ($tag == "various") {
                        echo 'class="active"';
} ?>>
                        Various
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div id="body">

        <div id="background">
        </div>

        <div id="container">
            <?php

            $file = fopen("posts.txt", "r") or die("Unable to open file!");

            $list = fread($file, filesize("posts.txt"));

            fclose($file);
            
            $lines = explode("\n", $list);

            if ($tag == null) {
                for ($i = 2; $i < count($lines); $i += 5) {
                    $h1 = $lines[$i-2];
                    $h2 = $lines[$i-1];
                    $tags = explode(";", $lines[$i]);
                    $img = $lines[$i+1];
                    $a = $lines[$i+2];

                    echo <<<EOT
                
            <a href="$a" target="_self" class="post_link">
                <div class="post">
                    <img src="$img" alt="$img" class="image post_image"/>
                    <h1>$h1</h1>
                    <h2>$h2</h2>
                    <hr/>
EOT;
                    //tags
                    foreach ($tags as $tag) {
                        echo <<<EOT

                    <div class="tag_div">
                        <img src="hexagon.png" alt="tag_" class="tag_img" />
                        <div class="tag_text">$tag</div>
                    </div>
EOT;
                    }
                    echo <<<EOT

                </div>
            </a>
EOT;
                }
            } else {
                $found = false;

                for ($i = 2; $i < count($lines); $i += 5) {
                    if (in_array($tag, explode(";", $lines[$i])) == true) {
                        $found = true;
                        $h1 = $lines[$i-2];
                        $h2 = $lines[$i-1];
                        $tags = $lines[$i];
                        $img = $lines[$i+1];
                        $a = $lines[$i+2];

                        echo <<<EOT
            <a href="$a" target="_self" class="post_link">
            <div class="post">
                    <img src="$img" alt="$img" class="image post_image"/>
                    

                    <h1>$h1</h1>
                    <h2>$h2</h2>
					<hr/>

            </div>
        </a>
EOT;
                    }
                }
                if ($found == false) {
                    echo <<<EOT
			<div class="post">
				<h1>I'm sorry :(</h1>
				<hr/>
				<div class="paragraph">
					The is nothing to show under this tag, yet.
				</div>
			</div>
EOT;
                }
            }

            ?>

        </div>

    </div>

    <div id="footer" class="canvas">
        <canvas height="50" width="200" id="animation_canvas_footer">
        </canvas>
        <div id="disclaimer">
            Disclaimer
            <br/> &copy; <?php echo date("Y"); ?>
        </div>
    </div>

    <script src="/js/animation.js"></script>
    <script src="/js/cli_write.js"></script>
    <script src="/js/menu.js"></script>
    <script src="/js/scroll.js"></script>

</body>

</html>
