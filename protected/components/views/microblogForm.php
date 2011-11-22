<div id="targetdiv">
<?php
$model = new Microjob;
$form = $this->beginWidget('CActiveForm', array(
	'id' => 'micro-job-form',
	'enableAjaxValidation' => true,
	'clientOptions'=>array('validateOnSubmit'=>TRUE),
	'action' => CController::createUrl('/microjob/ajaxCreate'),
	));
?>

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
				}',
				'beforeSend'=>'js:function(){
//                                            alert(\'beforeSend\');
				}',
				'success'=>'js:function(data){
				    	$("#targetdiv").html(data
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
</div>	