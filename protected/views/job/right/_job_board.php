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
		'id' => 'micro-job-form',
		'enableAjaxValidation' => true,
	    	'clientOptions'=>array('validateOnSubmit'=>TRUE),
	    	'action' => $this->createUrl('/microjob/ajaxCreate'),
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
                                            alert(\'error\');
                                        }',
                                        'beforeSend'=>'js:function(){
//                                            alert(\'beforeSend\');
                                        }',
                                        'success'=>'js:function(data){
//                                            alert(\'success, data from server: \'+data);
					    $("#targetdiv").html(data);
                                        }',
                                        'complete'=>'js:function(){
//                                            alert(\'complete\');
                                        }'
                                        )
                                    );

			?>
		</div>
		<div id="targetdiv"></div>
	<?php $this->endWidget(); ?>
</div>
<div>
	<img src="images/classified/ad.gif" width="300" height="250" alt="ad" />
</div>