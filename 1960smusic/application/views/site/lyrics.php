<div class="w960 pull-center">
	<div class="w66pc">
		<div class="align-center">
			<a href="" title="<?= $artist ?> - <?= $title ?> lyrics">
				<? $fsize = strlen($artist.$title) > 30 ? 20 : 24; ?>
				<? $fsize = strlen($artist.$title) > 40 ? 18 : 24; ?>
				<h1 class="fancy-title f<?= $fsize ?>">
					<?= $artist ?> - <?= $title ?> lyrics
					<span class="t"></span><span class="t"></span><span class="t"></span><span class="t"></span>
				</h1>
			</a>
		</div>
		<div class="f20">
			<? if($logged_in){ ?>
				<form action="/site/update" method="post">
					<input type="hidden" name="artist" value="<?= $artist ?>"/>
					<input type="hidden" name="title" value="<?= $title ?>"/>
					<textarea name="lyrics" style="width:100%;height:800px"><?= $lyrics[0]['lyrics'] ?></textarea>
					<input type="submit" value="Update"/>
				</form>
			<? }elseif(!empty($lyrics[0]['lyrics'])){ ?>
				<?= nl2br($lyrics[0]['lyrics']) ?>
			<? }else{ ?>
				We're sorry. We could not find any lyrics for <i><?= $title ?></i> by <?= $artist ?>. 
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