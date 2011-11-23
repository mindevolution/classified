<div class="job-board">
	<div class="menu-r">
		<div class="more"><a href="#">&nbsp;</a></div>
		<a href="#">工作即時貼</a>
	</div>
	<?php foreach($list as $row): ?>
	<p><?php echo CHtml::link($row->description, '#'); ?></p>
	<?php endforeach; ?>
	<?php
	$form = $this->beginWidget('MicroblogWidget');
	$this->endWidget();
	?>
</div>
<div>
	<img src="images/classified/ad.gif" width="300" height="250" alt="ad" />
</div>