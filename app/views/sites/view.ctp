<?php  $javascript->link('maps', false); ?>
<?php  $javascript->link('http://maps.google.com/maps/api/js?sensor=false', false); ?>

<h1>
<?php echo $site['Site']['name']; ?>
</h1>
<p>
<?php echo $site['Site']['description']; ?>
</p>
<?php echo $site['Site']['short_url'] . "<br>"; ?>
<?php echo "<img src=" . trim($site['Site']['short_url']) . ".qrcode" . "><br>"; ?>




<div id="map_canvas" style="width: 400px; height:300px">LOADING</div>
<script type="text/javascript">
		var lat= <?php echo $site['Site']['lat'];?>;
		var long=<?php echo $site['Site']['lng'];?>;
		console.log("Test");
		mapinit();
</script>

<div><img width="280" height="280" style="border:1px solid #888888;" 
src="http://maps.google.com/maps/api/staticmap?center=<?php echo $site['Site']['lat'];?>,<?php echo $site['Site']['lng'];?>&amp;size=280x280&amp;maptype=roadmap&amp;markers=color:red|<?php echo $site['Site']['lat'];?>,<?php echo $site['Site']['lng'];?>&amp;zoom=15&amp;sensor=false&amp;key=" /></div>
<!--
<div class="sites view">
<h2><?php  __('Site');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $site['Site']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $site['Site']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Owner Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $site['Site']['owner_email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Edit Key'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $site['Site']['edit_key']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

-->
<div class="related">
	<?php if (!empty($site['Link'])):?>
	<?php
		$i = 0;
		foreach ($site['Link'] as $link):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<li<?php echo $class;?>>
		<?php echo $html->link($link['link_text'], $link['link_uri'], array('class'=>'aLink'));	?>
		</li>
	<?php endforeach; ?>
	<?php endif; ?>
</div>

