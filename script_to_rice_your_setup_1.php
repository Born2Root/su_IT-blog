<?php

if(isset($_GET['type']) == false || $_GET['type']!='ajax'){
	require("header.html");
	echo '<div id="body">';
}

?>

<img alt="close" src="/icon/x-square.svg" id="close" onclick="back();" />

<div id="content">



	<h1>Scripts To Rice Your Setup</h1>
	<p>
		by @BO41
		<br/> 04.2017
		<br/>
		<br/> Length/Readtime: /
	</p>

	<hr/>

	<img alt="tag" src="/icon/tag.svg" class="icon" />
	<img alt="scripts" src="/icon/programming.svg" class="icon" />

	<p id="intro">

		Are you using a bash script for Linux that displays system information like Screenfetch or Archey, Screenfo or Neofetch? Don't you get bored to see the same distro logo all the time?
		<br/> In this article, I'll show a little bash script on how to change this and rice your setup.

	</p>

	<p>
		So in the progress of installing my Arch and ricing it, I also installed screenfetch.
		<br/> Screenfetch is a small program to get
		<br/>
		<i>"one of those nifty terminal theme information + ASCII distribution logos you see in everyone's screenshots nowadays."</i>
	</p>

	<p>
		It's automatically detecting your OS to display the logo and gets multiple system info's. Here a screenshot of how the normal output looks like on my system:

		<!--img -->


		Screenfetch or alternatives, like Archey, Screenfo or Neofetch, are pretty cool programs. But isn't it boring to always see the same logo, although all the logos out there look great?
		<br/> For me, after seeing the (same) Arch logo for the third time I got a bit bored. So I came up with an idea.
		<br/> Therefore I wrote a little script to make my screenfetch look better or rather a bit different.
		<br/> While going randomly through the man page of screenfetch, I noticed the -A Flag.
	</p>

	<div>
		-A 'DISTRO' Here you can specify the distribution art that you want displayed. This is for when you want your distro detected but want to display a different logo.
	</div>

	<p>
		So it's possible to show the logo of another OS by giving the according name.
		<br/> Because I don't know all distributes available and covert by screenfetch, I opend the source code and looked through it.
		<br/> I tried them all and wrote them into an array.
		<br/> And then I noticed that the man page names them all. I don't know how I could over see this.
		<br/> But you still can't just copy the list. But I tried them all 70 of them and came up with this usable list.
	</p>

	<div>
		os=("Alpine Linux" "Antergos" "Arch Linux" "Arch Linux - Old" "BLAG" "BunsenLabs" "CentOS" "Chakra" "Chapeau" "Chrome OS" "CrunchBang" "CRUX" "Debian" "Deepin" "LinuxDeepin" "Devuan" "elementary OS" "Exherbo" "Fedora" "Frugalware" "Fuduntu" "Funtoo" "Fux" "Gentoo" "gNewSense" "Jiyuu Linux" "Kali Linux" "KaOS" "KDE neon" "Kogaion" "Korora" "Mint" "LMDE" "Logos" "Mageia" "Mandriva" "Manjaro" "Netrunner" "NixOS" "openSUSE" "Parabola GNU/Linux-libre" "Pardus" "Parrot Security" "PCLinuxOS" "Peppermint" "Qubes OS" "Raspbian" "Red Hat Enterprise Linux" "ROSA" "Sabayon" "SailfishOS" "Scientific Linux" "Slackware" "Solus" "SparkyLinux" "SteamOS" "SwagArch" "Trisquel" "Ubuntu" "Viperr" "Void" "DragonFlyBSD" "FreeBSD" "NetBSD" "OpenBSD" "FreeBSD - Old" "Unknown" "Haiku" "Mac OS X" "Cygwin")
	</div>

	<p>
		And now a random index to make things fun and different every time we call it.
	</p>

	<div>
		RAND=$[ $RANDOM % 70] os=("Alpine Linux" "Antergos" "Arch Linux" "Arch Linux - Old" "BLAG" "BunsenLabs" "CentOS" "Chakra" "Chapeau" "Chrome OS" "CrunchBang" "CRUX" "Debian" "Deepin" "LinuxDeepin" "Devuan" "elementary OS" "Exherbo" "Fedora" "Frugalware" "Fuduntu" "Funtoo" "Fux" "Gentoo" "gNewSense" "Jiyuu Linux" "Kali Linux" "KaOS" "KDE neon" "Kogaion" "Korora" "Mint" "LMDE" "Logos" "Mageia" "Mandriva" "Manjaro" "Netrunner" "NixOS" "openSUSE" "Parabola GNU/Linux-libre" "Pardus" "Parrot Security" "PCLinuxOS" "Peppermint" "Qubes OS" "Raspbian" "Red Hat Enterprise Linux" "ROSA" "Sabayon" "SailfishOS" "Scientific Linux" "Slackware" "Solus" "SparkyLinux" "SteamOS" "SwagArch" "Trisquel" "Ubuntu" "Viperr" "Void" "DragonFlyBSD" "FreeBSD" "NetBSD" "OpenBSD" "FreeBSD - Old" "Unknown" "Haiku" "Mac OS X" "Cygwin") screenfetch -A ${os[$RAND]} -w
	</div>

	<p>
		It just calls screenfetch with one string of our array with the random index.
		<br/> The -w Flag ("-w Wrap long lines.") just to fit all information on a normal terminal window.
	</p>

	<p>
		And that's all you have to do. Now you can enjoy all the beautiful logos available. And every time a different one.
		<br/> I choose to put the code into my .bashrc so on every console I open, this code will be executed, but you also could make an alias which calls an bash script file with this code inside.
	</p>

	Here are some more images:

	<h3>
		@BO41: scripter, blogger and Linux enthusiast
	</h3>

</div>

<?php

if(isset($_GET['type']) == false || $_GET['type']!='ajax'){
	echo '</div>';
	require("footer.php");
}

?>