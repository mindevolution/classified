<div class="job-info">
	<div class="menu-r">
		<div class="more"><a href="#">&nbsp;</a></div>
		<a href="#">職場資訊</a>
	</div>
	<ul>
		<?php if (is_array($infors)): ?>
			<?php foreach ($infors as $row): ?>
				<li>
					<?php echo CHtml::link($row->title, CController::createUrl(strtolower(get_class($row)).'/view', array('id'=>$row->id))); ?>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
</div>