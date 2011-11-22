<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id' => 'micro-job-form',
	'enableAjaxValidation' => true,
	'clientOptions'=>array('validateOnSubmit'=>TRUE),
	'action' => CController::createUrl('/microjob/ajaxCreate'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textarea($model, 'description', array(
	    'value' => '一句話找工作',
	),array()); ?>
	<?php echo $form->error($model, 'description'); ?>
	<?php echo $form->textField($model, 'verifyCode', array('size' => 60, 'class' => 'input-form', 'value'=>'請輸入驗證碼', 'maxlength' => 255)); ?>
	<?php echo $form->error($model, 'verifyCode'); ?>
	<div class="code">
		<?php $mc = new MicrojobController('microjob'); ?>
		<?php $mc->widget('CCaptcha'); ?>
	</div>
	<div class="clear"></div>
	<div class="bt-send">
		<?php
		echo CHtml::ajaxSubmitButton( 'Send',
				CHtml::normalizeUrl(array('microjob/ajaxCreate')),
				array(
				'error'=>'js:function(){
				    alert(\'error\');
				}',
				'beforeSend'=>'js:function(){
//                                            alert(\'beforeSend\');
				}',
				'success'=>'js:function(data){
//                                            alert(\'success, data from server: \'+data);
				    $("#targetdiv").html(data+'.$form->errorSummary($model).'
);
				}',
				'complete'=>'js:function(){
//                                            alert(\'complete\');
				}'
				)
			    );

		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->