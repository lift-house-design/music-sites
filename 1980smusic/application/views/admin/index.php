<h2>CMS</h2>
<? foreach($content as $i => $v){ ?>
	<b><?= ucfirst($v['name']) ?> content</b>
	<form method="post">
		<input name="name" value="<?= $v['name'] ?>" type="hidden"/>
		<textarea name="content"><?= $v['content'] ?></textarea>
		<input type="submit" name="action" value="Save Content"/>
	</form>
	<hr/>
<? } ?>

<h2>Website Configuration</h2>
<form method="post">
	<? foreach($configuration as $i => $v){ ?>
		<b><?= ucfirst($v['label']) ?></b>
		<input name="<?= $v['name'] ?>" value="<?= $v['value'] ?>" placeholder="<?= $v['example'] ?>" type="text"/>
		<hr/>
	<? } ?>
	<input type="submit" name="action" value="Save Configuration"/>
</form>