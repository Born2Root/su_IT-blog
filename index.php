<?php

require("header.html");
// anpassen siehe website nur wenn von ajax

?>

<div id="body">


	<div class="article" id="id">
		<h2>Heading article 1</h2>
		<p>
			First preview paragraph
		</p>
	</div>

	<div class="article">
		<h2>Heading article 2</h2>
		<p>
			<img alt="macro" src="macro1.jpg" /> Some other stupid preview paragraph.
		</p>
	</div>

	<div class="image">
		<h2>Heading Meme 3</h2>
		<img alt="macro" src="macro2.jpg" />
	</div>

	<div class="image">
		<p>
			<img alt="macro" src="macro2.jpg" />
			<br/> Some info about the image
		</p>
	</div>

</div>

<?php

require("footer.php");

?>