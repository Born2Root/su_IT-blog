<?php

if(isset($_GET['type']) == false || $_GET['type']!='ajax'){
	require("header.html");
	echo '<div id="body">';
}

?>

	<div class="article" id="id">
		<h2>Scripts To Rice Your Setup Pt.1</h2>
		<p>
			First preview paragraph
		</p>
	</div>

	<div class="article">
		<h2>Heading article 2</h2>
		<p>
			<img alt="macro" src="/macro1.jpg" /> Some other stupid preview paragraph.
		</p>
	</div>

	<div class="image">
		<h2>Heading Meme 3</h2>
		<img alt="macro" src="/macro2.jpg" />
	</div>

	<div class="image">
		<p>
			<img alt="macro" src="/macro2.jpg" />
			<br/> Some info about the image
		</p>
	</div>

<?php

if(isset($_GET['type']) == false || $_GET['type']!='ajax'){
	echo '</div>';
	require("footer.php");
	echo '<script>add_listener();</script>';
}

?>