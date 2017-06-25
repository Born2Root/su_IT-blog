<?php

if(isset($_GET['type']) == false || $_GET['type']!='ajax'){
	require("header.html");
	echo '<div id="body">';
}

?>

<div id="list">

	<div class="article" id="post_3" title="script_to_rice_your_setup_1.php">
		<h2>Scripts To Rice Your Setup Pt.1</h2>
		<img alt="tag" src="/icon/tag.svg" class="icon" />
		<img alt="scripts" src="/icon/programming.svg" class="icon" />
		<p>
			Are you using a bash script for Linux that displays system information like Screenfetch or Archey, Screenfo or Neofetch?
			Don't you get bored to see the same distro logo all the time?
			<br/>
			In this article, I'll show a little bash script on how to change this and rice your setup.
		</p>
	</div>

	<div class="article" id="post_2" title="test_article.php">
		<h2>Heading article 2</h2>
		<p>
			<img alt="macro" src="/macro1.jpg" class="img" /> Some other preview paragraph.
		</p>
	</div>

	<div class="image" id="post_1">
		<h2>Heading Meme 3</h2>
		<img alt="macro" src="/macro2.jpg" />
	</div>

	<div class="image" id="post_0">
		<p>
			<img alt="macro" src="/macro2.jpg" />
			<br/> Some info about the image; post 0
		</p>
	</div>

</div>

<?php

if(isset($_GET['type']) == false || $_GET['type']!='ajax'){
	echo '</div>';
	require("footer.php");
	echo '<script>add_listener();</script>';
}

?>