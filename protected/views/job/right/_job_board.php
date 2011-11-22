<div class="job-board">
	<div class="menu-r">
		<div class="more"><a href="#">&nbsp;</a></div>
		<a href="#">工作即時貼</a>
	</div>
	<p><a href="#">曼哈頓中城旺店請手法按摩好年輕按摩師一名另招學員學成留店請電718-503-4797</a></p>
	<p><a href="#">曼哈頓中城旺店請手法按摩好年輕按摩師一名另招學員學成留店請電718-503-4797</a></p>
	<p><a href="#">曼哈頓中城旺店請手法按摩好年輕按摩師一名另招學員學成留店請電718-503-4797</a></p>
	
	<?php
	$form = $this->beginWidget('CActiveForm', array(
		'id' => 'job-form',
		'enableAjaxValidation' => false,
		));
	?>

	<?php echo $form->errorSummary($model); ?>
		<textarea class="textarea">一句話找工作</textarea>
		<input type="text" value="請輸入驗證碼" class="input-form" />
		<div class="code">
			<?php $mc = new MicrojobController('microjob'); ?>
			<?php $mc->widget('CCaptcha'); ?>
		</div>
		<div class="clear"></div>
		<div class="bt-send"><input type="image" src="images/classified/bt-fabu.gif" name="即時發佈信息" /></div>
	<?php $this->endWidget(); ?>
</div>
<div>
	<img src="images/classified/ad.gif" width="300" height="250" alt="ad" />
</div>