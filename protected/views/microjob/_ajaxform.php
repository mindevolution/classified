<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id' => 'micro-job-form',
	'enableAjaxValidation' => true,
	'clientOptions'=>array('validateOnSubmit'=>TRUE),
	'action' => CController::createUrl('/microjob/ajaxCreate'),
)); ?>

	<div class="row">
		<?php echo $form->textarea($model, 'description', array(
		    'value' => '一句話找工作',
		),array()); ?>
		<?php echo $form->error($model, 'description'); ?>
	</div>
	<div class="row">
	<?php echo $form->textField($model, 'verifyCode', array('size' => 60, 'class' => 'input-form',  'maxlength' => 255)); ?>
	<?php echo $form->error($model, 'verifyCode'); ?>
	</div>
	<div class="code">
		<?php $this->widget('CCaptcha', array('buttonLabel' =>'<br />Generate new image')); ?>
<?php echo CHtml::link('Get a new code', CController::createUrl('microjob/captcha', array('refresh' => 1)), array('id'=>'yw0_button')); ?>
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
<script>
/*<![CDATA[*/
jQuery(function($) {
jQuery('#yw0_button').live('click',function(){
jQuery.ajax({
url: "<?php echo CController::createUrl('microjob/captcha', array('refresh' => 1)); ?>",
dataType: 'json',
cache: false,
success: function(data) {
jQuery('.code img').attr('src', data['url']);
jQuery('body').data('captcha.hash', [data['hash1'], data['hash2']]);
}
});
return false;
});
});
/*]]>*/ 
</script>