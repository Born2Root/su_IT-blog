<?php
if (empty($_GET["tag"]) == true) {
    $tag = null;
} else {
    $tag = substr($_GET["tag"], 0, -1);
}

function print_article($h1, $h2, $tags, $img, $a)
{
    echo <<<EOT

            <a href="$a" target="_self" class="post_link">
                <div class="post">
                    <img src="$img" alt="$img" class="image post_image"/>
                    <h1>$h1</h1>
                    <h2>$h2</h2>
                    <hr/>
                    <div class="tags">
EOT;
    //tags
    foreach ($tags as $tag) {
        echo <<<EOT

                        <div class="tag_div">
                            <img src="hexagon.png" alt="tag" class="tag_img" />
                            <div class="tag_text">$tag</div>
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
    global $tag;
    $text = "";
    if ($tag == null) {
        $text .= 'href="index.php?tag='.$link.';"';
    } else {
        if (in_array($link, explode(";", $tag)) == true) {
            $text .= 'href="'.str_replace($link.";", "", "$_SERVER[REQUEST_URI]").'"';
        } else {
            $text .= 'href="'."$_SERVER[REQUEST_URI]".$link.';"';
        }
    }
    if (in_array($link, explode(";", $tag)) == true) {
        $text .= ' class="active"';
    }
    return $text;
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
    <!-- desktop css -->
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

            <i class="fa fa-bars" aria-hidden="true" id="burger"></i>

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
                    <a target="_self" <?php echo print_link("linux"); ?>>
                        Linux
                    </a>
                </li>
                <li>
                    <a target="_self" <?php echo print_link("blender"); ?>>
                        Blender
                    </a>
                </li>
                <li>
                    <a target="_self" <?php echo print_link("memes"); ?>>
                        Memes
                    </a>
                </li>
                <li>
                    <a target="_self" <?php echo print_link("scripts"); ?>>
                        Scripts
                    </a>
                </li>
                <li>
                    <a target="_self" <?php echo print_link("various"); ?>>
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

            for ($i = 2; $i < count($lines); $i += 5) {
                if ($tag == null || in_array($tag, explode(";", $lines[$i])) == true) {
                    $h1 = $lines[$i-2];
                    $h2 = $lines[$i-1];
                    $tags = explode(";", $lines[$i]);
                    $img = "articles/".$lines[$i+1];
                    $a = "articles/".$lines[$i+2];

                    print_article($h1, $h2, $tags, $img, $a);
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
            <a href="impressum.php" target="_blank" rel="noopener">impressum</a>
        </div>
    </div>

    <script src="/js/animation.js"></script>
    <script src="/js/cli_write.js"></script>
    <script src="/js/menu.js"></script>
    <script src="/js/scroll.js"></script>

</body>

</html>
