<?php $controller = 'microjob'; ?>
<div class="job-board">
	<div class="menu-r">
		<div class="more">
		<?php echo CHtml::link('&nbsp', CController::createUrl($controller.'/index')); ?>
		</div>
		<?php echo CHtml::link(Yii::t('jobs', 'Micro jobs'), CController::createUrl($controller.'/index')); ?>
	</div>
	<?php foreach($list as $row): ?>
	<p><?php echo CHtml::link(CHtml::encode($row->description), CController::createUrl(strtolower(get_class($row)).'/view', array('id'=>$row->id))); ?></p>
	<?php endforeach; ?>
	<?php
	$form = $this->beginWidget('MicroblogWidget');
	$this->endWidget();
	?>
</div>
<div>
	<img src="images/classified/ad.gif" width="300" height="250" alt="ad" />
</div>