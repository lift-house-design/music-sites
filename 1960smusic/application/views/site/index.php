<div class="w960 pull-center">
	<div class="w66pc">
		<?= $yield_trivia ?>
		<div class="spacer10"></div>
		<iframe class="border" width="638" height="420" src="//www.youtube.com/embed/videoseries?list=<?= $youtube_playlist_id ?>&loop=1<??>&autoplay=1<??>&index=<?= rand(1,50) ?>&shuffle=1" frameborder="0" allowfullscreen></iframe>
		<div class="spacer20"></div>
		<div class="align-center">
			<span class="fancy-title">
				Most played tracks
				<span class="t"></span><span class="t"></span><span class="t"></span><span class="t"></span>
			</span>
		</div>
		<div class="h300">
			<div class="w20pc h100pc pad20r pad20l">
				<div class="bar bar1">
					<span>Hank Williams<br/><i>I'm So Lonesome I Could Cry</i></span>
				</div>
			</div>
			<div class="w20pc h100pc pad20r pad20l">
				<div class="bar bar2">
					<span>Woody Guthrie<br/><i>This Land Is Your Land</i></span>
				</div>
			</div>
			<div class="w20pc h100pc pad20r pad20l">
				<div class="bar bar3">
					<span>John Lee Hooker<br/><i>Boogie Chillen</i></span>
				</div>
			</div>
			<div class="w20pc h100pc pad20r pad20l">
				<div class="bar bar4">
					<span>Thelonious Monk<br/><i>'Round Midnight</i></span>
				</div>
			</div>
			<div class="w20pc h100pc pad20r pad20l">
				<div class="bar bar5">
					<span>Bing Crosby<br/><i>White Christmas</i></span>
				</div>
			</div>
		</div>
	</div>
	<div class="w33pc align-right">
		<?= $yield_ads ?>
	</div>
</div>
<div class="spacer20"></div>
<div class="c3bg">
	<hr class="double"/>
		<div class="w960 pull-center align-center f20 pad10t pad10b">
			<div class="w50pc pad16r">
				<div class="fancy-title2">Popular Artists</div>
				<div class="spacer5"></div>
				<a href="/songs/Jimmy Dorsey">Jimmy Dorsey</a><br/>
				<a href="/songs/Sammy Kaye">Sammy Kaye</a><br/>
				<a href="/songs/Bing Crosby">Bing Crosby</a><br/>
				<a href="/songs/Glenn Miller">Glenn Miller</a><br/>
				<a href="/songs/Benny Goodman">Benny Goodman</a><br/>
				<a href="/songs/Harry James">Harry James</a><br/>
				<a href="/songs/Frankie Carle">Frankie Carle</a><br/>
				<div class="align-right"><a href="/artists" class="latoli">see more</a></div>
			</div>
			<div class="w50pc pad8r pad8l">
				<div class="fancy-title2">Popular Songs</div>
				<div class="spacer5"></div>
				<a href="/lyrics/Bing Crosby/Only Forever">Bing Crosby - Only Forever</a><br/>
				<a href="/lyrics/Sammy Kaye/Daddy">Sammy Kaye - Daddy</a><br/>
				<a href="/lyrics/Glenn Miller/Chattanooga Choo Choo">Glenn Miller - Chattanooga Choo Choo</a><br/>
				<a href="/lyrics/Harry James/I Had The Craziest Dream">Harry James - I Had The Craziest Dream</a><br/>
				<a href="/lyrics/Mills Brothers/Paper Doll">Mills Brothers - Paper Doll</a><br/>
				<a href="/lyrics/Freddy Martin/Tonight We Love">Freddy Martin - Tonight We Love</a><br/>
				<a href="/lyrics/Dinah Shore/Skylark">Dinah Shore - Skylark</a><br/>
				<div class="align-right"><a href="/songs/" class="latoli">see more</a></div>
			</div>
		</div>
	<hr class="double"/>
</div>
<div class="w960 pull-center pad20t pad20b">
	<?= $content ?>
</div>

