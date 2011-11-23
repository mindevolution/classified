<?php
$controller = strtolower(substr(get_class($this), 0, 8));
$show_day = false;
$day = date('M d Y', strtotime($data->timestamp));

$flash_datas = Yii::app()->user->getFlashes();
if (isset($flash_datas['lastjob_day']) && $flash_datas['lastjob_day'] != $day) {
	$show_day = true;
}
?>
<?php if ($show_day || $index == 0): ?>
	<div class="day-lists">
		<ul>
			<p class="list-date"><?php print $day; ?></p>
		</ul>
	</div>
<?php endif; ?>
<div class="joblist-row <?php echo $index % 2 ? '' : 'odd'; ?>">
	<?php
	echo CHtml::link(CHtml::encode($data->description), CController::createUrl($controller.'/view', array('id' => $data->id)));
	?>
	<?php
	if ($day == date('M d Y')): ?>
		<?php echo CHtml::image("images/classified/icon-new.gif", "new-icon"); ?>
	<?php endif; ?>

	<?php
	if ($data->timestamp) {
		Yii::app()->user->setFlash('lastjob_day', $day);
	}
	?>
</div>