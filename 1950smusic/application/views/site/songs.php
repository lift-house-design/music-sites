<div class="w960 pull-center">
	<div class="w66pc">
		<div class="align-center">
			<a href="" title="List of <?= $artist ?> 1950's songs">
				<h1 class="fancy-title">
					<?= $artist ?> Songs
					<span class="t"></span><span class="t"></span><span class="t"></span><span class="t"></span>
				</h1>
			</a>
		</div>
		<div class="f20">
			<? foreach($songs as $i => $s){ ?>
				<a class="block pad4t" href="/lyrics/<?= $s['artist'] ?>/<?= $s['title'] ?>" title="<?= $s['artist'] ?> - <?= $s['title'] ?> Song Lyrics 1950s"><?= $s['artist'] ?> - <?= $s['title'] ?> <i class="f16 pull-right">(View Lyrics)</i></a>
			<? } ?>
		</div>
		<div class="cms">
			<?= $content ?>
		</div>
	</div>
	<div class="w33pc align-right">
		<?= $yield_ads ?>
	</div>
</div>