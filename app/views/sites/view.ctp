<?php  $javascript->link('maps', false); ?>
<?php  $javascript->link('http://maps.google.com/maps/api/js?sensor=false', false); ?>
<div id="view-content">
	<h1>
		<div id="view-title"><?php echo $site['Site']['name']; ?></div>
	</h1>
	
	<p>
		<div id="view-description"><?php echo $site['Site']['description']; ?></div>
	</p>
	
	<div id="view-details">
	
	<div id="view-url"><?php echo $site['Site']['short_url'] . "<br>"; ?></div>
	
	<div id="view-qr">
		<?php echo "<img src=" . trim($site['Site']['short_url']) . ".qrcode" . "><br>"; ?>
	</div>
	
	 <!--<div id="map_canvas" style="width: 400px; height:300px">LOADING</div>
	  <script type="text/javascript">
	      var lat= <?php echo $site['Site']['lat'];?>;
	      var long=<?php echo $site['Site']['lng'];?>;
	      console.log("Test");
	      mapinit();
	  </script>
	 -->
	 
	 <div id="map">
	 	<img width="400" height="300" style="border:1px solid #888888;" 
			src="http://maps.google.com/maps/api/staticmap?center=<?php echo $site['Site']['lat'];?>,<?php echo $site['Site']['lng'];?>&amp;size=400x300&amp;maptype=roadmap&amp;markers=color:red|<?php echo $site['Site']['lat'];?>,<?php echo $site['Site']['lng'];?>&amp;zoom=15&amp;sensor=false&amp;key=" /></div>
	</div>
	
	<div id="view-links">
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

