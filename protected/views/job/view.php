<?php
$this->breadcrumbs = array(
	'工作首頁' => array('job/index'),
	'詳細信息',
);
?>
<?php if($messages): ?>
	<?php echo $messages; ?>
<?php endif; ?>
<!--detail start-->
<div class="detail">
	<h1 class="d-title"><?php echo $model->title; ?> </h1>
	<div class="d-sub-title">(<?php echo CHtml::link($model->area->name, array('job/index', 'aid' => $model->area->aid)); ?>) &nbsp;
		<?php echo $model->category->name; ?>/<?php echo $model->purpose->name; ?> &nbsp;
		<?php echo date('Y年m月d日 H:m', strtotime($model->timestamp)); ?>
	</div>
	<p>
		<?php echo $model->description; ?>
	</p>
	<div class="d-icons">
		<div class="right">
			<span class="edit">
				<?php
				echo CHtml::link('編輯', "", // the link for open the dialog
					array(
					'style' => 'cursor: pointer;',
					'onclick' => "{authEdit(); $('#dialogAuth').dialog('open');}"));
				?>
				</span> &nbsp;&nbsp;&nbsp;
				<span class="delete">
				<?php
				echo CHtml::link('刪除', "", // the link for open the dialog
					array(
					'style' => 'cursor: pointer;',
					'onclick' => "{auth(); $('#dialogAuth').dialog('open');}"));
				?>
			</span>
		</div>
		<?php if (isset($prevJob) && $prevJob): ?>
			<span class="past-m"><?php echo CHtml::link('上一條', array('job/view', 'id' => $prevJob->id)); ?></span> &nbsp;
		<?php endif; ?>
		<?php if (isset($nextJob) && $nextJob): ?>
			<span class="next-m"><?php echo CHtml::link('下一條', array('job/view', 'id' => $nextJob->id)); ?></span> 
		<?php endif; ?>
		<div style="clear:both;"></div>
	</div>
	<div class="share">
		<img src="images/share.gif" />
	</div>
</div>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
	'id' => 'dialogAuth',
	'options' => array(
		'title' => 'User password',
		'autoOpen' => false,
		'modal' => true,
		'width' => 350,
		'height' => 270,
	),
));
?>
<div class="divForForm">
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
	// here is the magic
	function auth()
	{
<?php
echo CHtml::ajax(array(
	'url' => array('job/auth', 'id'=>$model->id),
	'data' => "js:$(this).serialize()",
	'type' => 'post',
	'dataType' => 'json',
	'success' => "function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogAuth div.divForForm').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogAuth div.divForForm form').submit(auth);
                }
                else
                {
                    $('#dialogAuth div.divForForm').html(data.div);
                    setTimeout(\"$('#dialogAuth').dialog('close') \",3000);
										window.location=\"" . $this->createUrl('job/index') . "\";
                }
 
            } ",
))
?>;
		return false; 
 
	}

	function authEdit()
	{
<?php
echo CHtml::ajax(array(
	'url' => array('job/authEdit', 'id'=>$model->id),
	'data' => "js:$(this).serialize()",
	'type' => 'post',
	'dataType' => 'json',
	'success' => "function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogAuth div.divForForm').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogAuth div.divForForm form').submit(authEdit);
                }
                else
                {
                    $('#dialogAuth div.divForForm').html(data.div);
                    setTimeout(\"$('#dialogAuth').dialog('close') \",1000);
										window.location=\"" . $this->createUrl('job/update', array('id'=>$model->id)) . "\";
                }
 
            } ",
))
?>;
		return false; 
 
	}
 
</script>