<?php
define('AREA_ID_HUANGHOU', 2);
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
	'id' => 'job-form',
	'enableAjaxValidation' => false,
	));
?>

<?php echo $form->errorSummary($model); ?>
<div class="steps">
	<div class="step-title bg-step1">請選擇工作類型</div>
	<div class="contents">
		<ul>
		<?php echo $form->radioButtonList($model, 'cid', Category::getOptions(), array('separator'=> '&nbsp;',
			'template' => '<li>{input} {label}</li>')); ?>
		<?php echo $form->error($model, 'cid'); ?>
		</ul>

		<br/>
		<?php echo $form->dropDownList($model, 'tid', JobType::getTypes()); ?>
		<div class="clear"></div>
	</div>
</div>
<!--steps end-->
<!--steps start-->
<div class="steps">
	<div class="step-title bg-step2">請選擇所在地區</div>
	<div class="contents">
		<div class="left">
			<?php
			echo $form->dropDownList($model, 'aid', Area::getAreas(), array(
				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('area/getAreasOptions'),
					'data' => 'js: "pid="+$(this).val()',
					'update' => '#subarea',
				)));
			?>
			<?php echo $form->error($model, 'aid'); ?>
		</div>
		<div class="left">
			<div class="row" id="subarea">
				<?php echo $form->dropDownList($model, 'aid', Area::getAreas(AREA_ID_HUANGHOU)); ?>
			</div>
			<p><a href="#">忽略此步</a> &nbsp;您的信息可能不會被通過地址搜索的人看到</p>
		</div>
		<div class="clear"></div>
	</div>
</div>
<!--steps end-->
<!--steps start-->
<div class="steps">
	<div class="step-title bg-step3">請填寫相關信息 &nbsp; <span class="write-y">信息為必填寫項目</span></div>
	<div class="contents">
		<div class="in-title write-y-form">
			題目：
		</div>
		<?php echo $form->textField($model, 'title', array('size' => 60, 'class' => 'input-form', 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'title'); ?>
		<div class="clear"></div>
		<div class="in-title">
			Email：
		</div>
		<?php echo $form->textField($model, 'email', array('size' => 60, 'class' => 'input-form', 'maxlength' => 255)); ?>
		<div class="clear"></div>
		<div class="in-title">
			電話：
		</div>
		<?php echo $form->textField($model, 'telephone', array('size' => 60, 'class' => 'input-form', 'maxlength' => 255)); ?>
		<div class="clear"></div>
		<div class="in-title write-y-form">
			描述：
		</div>
		<?php echo $form->textArea($model, 'description', array('size' => 45, 'maxlength' => 45)); ?>
		<?php echo $form->error($model, 'description'); ?>
		<div class="clear"></div>
		<div class="in-title">
			管理密碼：
		</div>
		<?php echo $form->PasswordField($model, 'password', array('size' => 60, 'class' => 'input-form', 'maxlength' => 255)); ?>
		<div class="pw-text">請牢記您的密碼，用於刪除或修改信息。建議：密碼不要過於簡單，防止被他人猜出。</div>
		<div class="clear"></div>
	</div>
</div>
<!--steps end-->
<div class="form-button">
	<div class="right">
		<?php echo CHtml::imageButton('images/classified/bt-rewrite.gif', array('name' => '重新填寫信息', 'id' => 'reset-form')); ?>
	</div>
	<div class="bt-left">
		<?php echo CHtml::imageButton('images/classified/bt-send-green.gif', array('name' => '發佈信息')); ?>
	</div>
</div>
<div class="row">
	<?php echo $form->hiddenField($model, 'uid'); ?>
</div>

<?php echo $form->hiddenField($model, 'timestamp'); ?>

<div class="row">
	<?php echo $form->hiddenField($model, 'pid'); ?>
</div>


<?php $this->endWidget(); ?>
