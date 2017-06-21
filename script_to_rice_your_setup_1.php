<?php

if(isset($_GET['type']) == false || $_GET['type']!='ajax'){
	require("header.html");
	echo '<div id="body">';
}

?>

<img alt="close" src="/icon/x-square.svg" class="icon" onclick="back();" />

<h1>Scripts To Rice Your Setup</h1>

So in the progress of installing my Arch and ricing it, I also installed screenfetch.
Screenfetch is a small program to get

"one of those nifty terminal theme information + ASCII distribution logos you see in everyone's screenshots nowadays."

It's automatically detecting your OS to display the logo and gets multiple system info's.

Here a screenshot of how the normal output looks like on my system:




Screenfetch or alternatives, like Archey, Screenfo or Neofetch, are pretty cool programs. But isn't it boring to always see the same logo, although all the logos out there look great?
For me, after seeing the (same) Arch logo for the third time I got a bit bored. So I came up with an idea.
Therefore I wrote a little script to make my screenfetch look better or rather a bit different.
While going randomly through the man page of screenfetch, I noticed the -A Flag.

-A 'DISTRO'
Here you can specify the distribution art that you want displayed.
This is for when you want your distro detected but want
to display a different logo.

So it's possible to show the logo of another OS by giving the according name.
Because I don't know all distributes available and covert by screenfetch, I opend the source code and looked through it.
I tried them all and wrote them into an array.
And then I noticed that the man page names them all. I don't know how I could over see this.
But you still can't just copy the list. But I tried them all 70 of them and came up with this usable list.


os=("Alpine Linux" "Antergos" "Arch Linux" "Arch Linux - Old" "BLAG" "BunsenLabs" "CentOS" "Chakra" "Chapeau" "Chrome OS" "CrunchBang" "CRUX" "Debian" "Deepin" "LinuxDeepin" "Devuan" "elementary OS" "Exherbo" "Fedora" "Frugalware" "Fuduntu" "Funtoo" "Fux" "Gentoo" "gNewSense" "Jiyuu Linux" "Kali Linux" "KaOS" "KDE neon" "Kogaion" "Korora" "Mint" "LMDE" "Logos" "Mageia" "Mandriva" "Manjaro" "Netrunner" "NixOS" "openSUSE" "Parabola GNU/Linux-libre" "Pardus" "Parrot Security" "PCLinuxOS" "Peppermint" "Qubes OS" "Raspbian" "Red Hat Enterprise Linux" "ROSA" "Sabayon" "SailfishOS" "Scientific Linux" "Slackware" "Solus" "SparkyLinux" "SteamOS" "SwagArch" "Trisquel" "Ubuntu" "Viperr" "Void" "DragonFlyBSD" "FreeBSD" "NetBSD" "OpenBSD" "FreeBSD - Old" "Unknown" "Haiku" "Mac OS X" "Cygwin")


And now a random index to make things fun and different every time we call it.

RAND=$[ $RANDOM % 70]

os=("Alpine Linux" "Antergos" "Arch Linux" "Arch Linux - Old" "BLAG" "BunsenLabs" "CentOS" "Chakra" "Chapeau" "Chrome OS" "CrunchBang" "CRUX" "Debian" "Deepin" "LinuxDeepin" "Devuan" "elementary OS" "Exherbo" "Fedora" "Frugalware" "Fuduntu" "Funtoo" "Fux" "Gentoo" "gNewSense" "Jiyuu Linux" "Kali Linux" "KaOS" "KDE neon" "Kogaion" "Korora" "Mint" "LMDE" "Logos" "Mageia" "Mandriva" "Manjaro" "Netrunner" "NixOS" "openSUSE" "Parabola GNU/Linux-libre" "Pardus" "Parrot Security" "PCLinuxOS" "Peppermint" "Qubes OS" "Raspbian" "Red Hat Enterprise Linux" "ROSA" "Sabayon" "SailfishOS" "Scientific Linux" "Slackware" "Solus" "SparkyLinux" "SteamOS" "SwagArch" "Trisquel" "Ubuntu" "Viperr" "Void" "DragonFlyBSD" "FreeBSD" "NetBSD" "OpenBSD" "FreeBSD - Old" "Unknown" "Haiku" "Mac OS X" "Cygwin")

screenfetch -A ${os[$RAND]} -w


It just calls screenfetch with one string of our array with the random index.
The -w Flag ("-w     Wrap long lines.") just to fit all information on a normal terminal window.

And that's all you have to do. Now you can enjoy all the beautiful logos available. And every time a different one.

I choose to put the code into my .bashrc so on every console I open, this code will be executed, but you also could make an alias which calls an bash script file with this code inside.

Here are some more images:

2017-04-12-220154_814x458_scrot.png814x458 49.2 KB



2017-04-12-220332_814x458_scrot.png814x458 37.4 KB



2017-04-12-220451_814x458_scrot.png814x458 39.6 KB



2017-04-12-220413_814x458_scrot.png814x458 40.1 KB



2017-04-12-220459_814x458_scrot.png814x458 44 KB



2017-04-12-220507_814x458_scrot.png814x458 46.3 KB


This was my first post and it wasn't really educational or filled with content. But I think this is a nice to have feature for which I already did all the work, so it's worth sharing. Hope you like it

<?php

if(isset($_GET['type']) == false || $_GET['type']!='ajax'){
	echo '</div>';
	require("footer.php");
}

?>