<?php
$this->menu = array(
	array('label' => 'Create Job', 'url' => array('create')),
	array('label' => 'Manage Job', 'url' => array('admin')),
);

$areas_menu = array(
	// set the all area menu category
	array(
		'label' => Yii::t('jobs', 'All areas'),
		'url' => array('job/index'),
	'active' => isset($_GET['aid']) ? false : true, // set to active when select all
	),
);
foreach ($areas as $id => $name) {
	$areas_menu[] = array(
		'label' => $name,
	    'url' => array('job/index/', 'aid' => $id),
	);
}
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
<div class="area">
	<?php
	// display the area filter menu
	$this->beginWidget('zii.widgets.CPortlet', array(
//		'title' => 'Operations',
	));
	$this->widget('zii.widgets.CMenu', array(
		'items' => $areas_menu,
		'htmlOptions' => array('class' => 'select-area'),
	));
	$this->endWidget();
	?>
	<div style="clear:both;"></div>
</div>

<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
	'template' => "{items}{pager}",
	'pager' => array(
		'header' => '', //text before it
		'firstPageLabel' => Yii::t('jobs', 'First page'), //overwrite firstPage lable
		'lastPageLabel' => '最后一页', //overwrite lastPage lable
		'nextPageLabel' => Yii::t('jobs', 'Next'), //overwrite nextPage lable
		'prevPageLabel' => Yii::t('jobs', 'Prev'), //overwrite prePage lable
	),
));
?>

        <!--day-lists end-->
        <!--job-ads start-->
	<?php echo $this->renderPartial('../jobInclude/_ads'); ?>
        <!--job-ads end-->
        <!--chongdian start-->
	<?php echo $this->renderPartial('../jobInclude/_recharge'); ?>
        <!--chongdian end-->
</div>
<!--left-part end-->
<!--right-part start-->
<div id="right-part">
	<?php echo $this->renderPartial('../jobInclude/right/_tag_cloud'); ?>
	<?php echo $this->renderPartial('../jobInclude/right/_job_joy'); ?>
	<?php echo $this->renderPartial('../jobInclude/right/_job_board', array('model'=>$microjob, 'list' => $list)); ?>
	<?php echo $this->renderPartial('../jobInclude/right/_interactive_and_info'); ?>
</div>
<!--right-part end-->
