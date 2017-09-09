<!doctype html>
<html lang="en">

<head>

	<title>
		Scripts To Rice Your Setup Pt.1 | su it --blog
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

	<!-- highlight.js -->
	<link rel="stylesheet" href="/styles/railscasts.css">
	<script src="/highlight.pack.js"></script>
	<script>
		hljs.initHighlightingOnLoad();
	</script>

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
					<a href="index.php?tag=linux" target="_self">
								Linux
							</a>
				</li>
				<li>
					<a href="index.php?tag=blender" target="_self">
								Blender
							</a>
				</li>
				<li>
					<a href="index.php?tag=memes" target="_self">
								Memes
							</a>
				</li>
				<li>
					<a href="index.php?tag=pictures" target="_self">
								Pictures
							</a>
				</li>
				<li>
					<a href="index.php?tag=scripts" target="_self">
								Scripts
							</a>
				</li>
				<li>
					<a href="index.php?tag=various" target="_self">
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

			<div id="article">

				<h1>Scripts To Rice Your Setup</h1>
				<h2>Get a better looking system info by ricing screenfetch</h2>

				<hr/>

				<h1>
					Introduction
				</h1>

				<p>
					So in the progress of installing my Arch and ricing it, I also installed screenfetch.
					<br/> Screenfetch is a small program to get
					<br/>
					<i>"one of those nifty terminal theme information + ASCII distribution logos you see in everyone's screenshots nowadays."</i>
				</p>

				<p>
					So you are using a script for GNU Linux that displays system information like Screenfetch or Archey, Screenfo or Neofetch. But don't you get bored to see the same distribution logo all the time?
					<br/> In this article, I'll show a very little bash script with a (much) impact.
				</p>

				<h2>
					Requirements
				</h2>

				<ul>
					<li>
						screenfetch, archey, screenfo, neofetch, or similar
					</li>
					<li>
						bash basics
					</li>
					<li>
						that's it, you are good to go :)
					</li>
				</ul>

				<h1>
					Content
				</h1>

				<p>
					It's automatically detecting your OS to display the logo and gets multiple system info's. Here a screenshot of how the normal output looks like on my system: Screenfetch or alternatives, like Archey, Screenfo or Neofetch, are pretty cool programs. But isn't it boring to always see the same logo, although all the logos out there look great?
					<br/> For me, after seeing the (same) Arch logo for the third time I got a bit bored. So I came up with an idea.
					<br/>
					<br/> Therefore I wrote a little script to make my screenfetch look better or rather a bit different.
					<br/> While going randomly through the man page of screenfetch, I noticed the -A Flag.
				</p>

				<p>
					<i>
						-A 'DISTRO' Here you can specify the distribution art that you want displayed. This is for when you want your distro detected but want to display a different logo.
					</i>
				</p>

				<p>
					So it's possible to show the logo of another OS by giving the according name.
					<br/> Because I don't know all distributes available and covert by screenfetch, I opened the source code and looked through it.
					<br/> I tried them all and wrote them into an array.
					<br/> And then I noticed that the man page names them all. I don't know how I could over see this.
					<br/> But you still can't just copy the list. But I tried them all 70 of them and came up with this usable list.
				</p>

				<pre><code class="bash">os=("Alpine Linux" "Antergos" "Arch Linux" "Arch Linux - Old" "BLAG" "BunsenLabs" "CentOS" "Chakra" "Chapeau" "Chrome OS" "CrunchBang" "CRUX" "Debian" "Deepin" "LinuxDeepin" "Devuan" "elementary OS" "Exherbo" "Fedora" "Frugalware" "Fuduntu" "Funtoo" "Fux" "Gentoo" "gNewSense" "Jiyuu Linux" "Kali Linux" "KaOS" "KDE neon" "Kogaion" "Korora" "Mint" "LMDE" "Logos" "Mageia" "Mandriva" "Manjaro" "Netrunner" "NixOS" "openSUSE" "Parabola GNU/Linux-libre" "Pardus" "Parrot Security" "PCLinuxOS" "Peppermint" "Qubes OS" "Raspbian" "Red Hat Enterprise Linux" "ROSA" "Sabayon" "SailfishOS" "Scientific Linux" "Slackware" "Solus" "SparkyLinux" "SteamOS" "SwagArch" "Trisquel" "Ubuntu" "Viperr" "Void" "DragonFlyBSD" "FreeBSD" "NetBSD" "OpenBSD" "FreeBSD - Old" "Unknown" "Haiku" "Mac OS X" "Cygwin")
				</code></pre>


				<p>
					And now a random index to make things fun and different every time we call it.
				</p>

				<pre><code class="bash">RAND=$[ $RANDOM % 70]
os=("Alpine Linux" "Antergos" "Arch Linux" "Arch Linux - Old" "BLAG" "BunsenLabs" "CentOS" "Chakra" "Chapeau" "Chrome OS" "CrunchBang" "CRUX" "Debian" "Deepin" "LinuxDeepin" "Devuan" "elementary OS" "Exherbo" "Fedora" "Frugalware" "Fuduntu" "Funtoo" "Fux" "Gentoo" "gNewSense" "Jiyuu Linux" "Kali Linux" "KaOS" "KDE neon" "Kogaion" "Korora" "Mint" "LMDE" "Logos" "Mageia" "Mandriva" "Manjaro" "Netrunner" "NixOS" "openSUSE" "Parabola GNU/Linux-libre" "Pardus" "Parrot Security" "PCLinuxOS" "Peppermint" "Qubes OS" "Raspbian" "Red Hat Enterprise Linux" "ROSA" "Sabayon" "SailfishOS" "Scientific Linux" "Slackware" "Solus" "SparkyLinux" "SteamOS" "SwagArch" "Trisquel" "Ubuntu" "Viperr" "Void" "DragonFlyBSD" "FreeBSD" "NetBSD" "OpenBSD" "FreeBSD - Old" "Unknown" "Haiku" "Mac OS X" "Cygwin")
screenfetch -A ${os[$RAND]} -w
				</code></pre>

				<p>
					It just calls screenfetch with one string of our array with the random index.
					<br/> The -w Flag ("-w Wrap long lines.") just to fit all information on a normal terminal window.
				</p>

				<h1>
					Conclusion
				</h1>

				<p>
					And that's all you have to do. Now you can enjoy all the beautiful logos available. And every time a different one.
					<br/> I choose to put the code into my .bashrc so on every console I open, this code will be executed, but you also could make an alias which calls an bash script file with this code inside.
				</p>

				<img src="console.png" alt="console" class="image" />

				<hr/>

				<h2>
					[footer]
				</h2>

			</div>

		</div>

	</div>

	<div id="footer" class="canvas">
		<canvas height="50" width="200" id="animation_canvas_footer">
		</canvas>
		<div id="disclaimer">
			Disclaimer
			<br/> &copy; 2017
		</div>
	</div>

	<script src="/js/animation.js"></script>
	<script src="/js/cli_write.js"></script>
	<script src="/js/menu.js"></script>
	<script src="/js/scroll.js"></script>

</body>

</html>