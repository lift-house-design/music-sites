<div id="topbar">
	<div class="w960 pull-center align-right hidden">
		<a href="/" class="pull-left block">
			<img src="/assets/img/logo.png" alt="<?= $meta['site_name'] ?>"/>
		</a>
		<a href="/about" alt="About <?= $meta['site_name'] ?>">about</a>
		<a href="/lyrics" alt="<?= $meta['site_name'] ?> Lyrics">lyrics</a>
		<a href="/artists" alt="About <?= $meta['site_name'] ?> Artists">artists</a>
		<a href="/songs" alt="About <?= $meta['site_name'] ?> Songs">songs</a>

		<? if($logged_in){ ?>
			<a href="/admin">admin</a>
			<a href="/authentication/log_out" alt="<?= $meta['site_name'] ?> Log Out">Log Out</a>
		<? }/*else{ ?>
			<a href="/authentication/log_in" alt="<?= $meta['site_name'] ?> Log In">Log In</a>
		<? } */?>
	</div>
</div>