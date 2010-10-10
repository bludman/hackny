<?php  $javascript->link('maps', false); ?>
<?php  $javascript->link('http://maps.google.com/maps/api/js?sensor=false', false); ?>
<div id="view-content">
<h1>
<div id="view-title"><?php echo $site['Site']['name']; ?></div>
</h1>
<p>
<div id="view-description"><?php echo $site['Site']['description']; ?></div>
</p>

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
<div id="view-details">
<div id="view-links">
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
</div>
<div id="view-url"><?php echo $site['Site']['short_url'] . "<br>"; ?></div>
<div id="view-qr"><?php echo "<img src=" . trim($site['Site']['short_url']) . ".qrcode" . "><br>"; ?></div>
  <div id="map_canvas" style="width: 400px; height:300px">LOADING</div>
  <script type="text/javascript">
      var lat= 40.728771;
      var long= -73.995752;
      console.log("Test");
      mapinit();
  </script>
</div>
</div>

