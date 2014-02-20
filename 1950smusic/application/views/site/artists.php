<div class="w960 pull-center">
	<div class="w66pc">
		<div class="align-center">
			<a href="" title="List of 1950's musicians">
				<h1 class="fancy-title">
					1950s Musicians
					<span class="t"></span><span class="t"></span><span class="t"></span><span class="t"></span>
				</h1>
			</a>
		</div>
		<div class="f24 visible">
			<? foreach($artists as $i => $a){ ?>
				<a class="block pad4t" href="/songs/<?= $a['artist'] ?>" title="<?= $a['artist'] ?> Song List 1950s"><?= $a['artist'] ?> <i class="f16 pull-right">(<?= $a['song_count'] ?> songs found)</i></a>
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