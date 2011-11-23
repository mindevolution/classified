<?php
$this->menu = array(
	array('label' => 'Create Job', 'url' => array('create')),
	array('label' => 'Manage Job', 'url' => array('admin')),
);
?>
<!--left-part start-->
<div id="left-part">
	<!--buttons start-->
        <div class="buttons">
		<?php echo CHtml::link(CHtml::image("images/classified/bt-needjob.gif", Yii::t('jobs', 'I want be employed'), array('class' => 'img-left')), array('job/create', 'pid' => 2)); ?>
		<?php echo CHtml::link(CHtml::image("images/classified/bt-needp.gif",  Yii::t('jobs', 'I want employ')), array('job/create', 'pid' => 1)); ?>
        </div>	
	<?php if (isset($this->breadcrumbs)): ?>
		<?php
		$this->widget('zii.widgets.CBreadcrumbs', array(
		    'links' => $this->breadcrumbs,
		    'separator' => '&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;',
		    'homeLink' => false,
		));
		?><!-- breadcrumbs -->
	<?php endif ?>
	<!--guide end-->
	<!--buttons end-->

<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
	'template' => "{items}{pager}",
	'pager' => array(
		'header' => '', //text before it
		'nextPageLabel' => Yii::t('jobs', 'Next'), //overwrite nextPage lable
		'prevPageLabel' => Yii::t('jobs', 'Prev'), //overwrite prePage lable
	),
));
?>

</div>