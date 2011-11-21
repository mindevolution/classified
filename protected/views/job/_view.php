<?php
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
	echo CHtml::link(CHtml::encode($data->title), CController::createUrl('job/view', array('id' => $data->id)));
	echo ' &nbsp(';
	echo CHtml::encode($data->area->name);
	echo ')&nbsp';
	echo CHtml::encode($data->category->name);
	echo '/&nbsp';
	echo CHtml::encode($data->purpose->name);
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