<?php

if(isset($_GET['type']) == false || $_GET['type']!='ajax'){
	require("header.html");
	echo '<div id="body">';
}

?>

	<div class="article" id="post_3" title="script_to_rice_your_setup_1.php">
		<h2>Scripts To Rice Your Setup Pt.1</h2>
		<p>
			First preview paragraph
		</p>
	</div>

	<div class="article" id="post_2" title="test_article.php">
		<h2>Heading article 2</h2>
		<p>
			<img alt="macro" src="/macro1.jpg" /> Some other preview paragraph.
		</p>
	</div>

	<div class="image" id="post_1">
		<h2>Heading Meme 3</h2>
		<img alt="macro" src="/macro2.jpg" />
	</div>

	<div class="image" id="post_0">
		<p>
			<img alt="macro" src="/macro2.jpg" />
			<br/> Some info about the image; post 1
		</p>
	</div>

<?php

if(isset($_GET['type']) == false || $_GET['type']!='ajax'){
	echo '</div>';
	require("footer.php");
	echo '<script>add_listener();</script>';
}

?>