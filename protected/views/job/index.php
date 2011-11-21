<?php
$this->menu = array(
    array('label' => 'Create Job', 'url' => array('create')),
    array('label' => 'Manage Job', 'url' => array('admin')),
);

$areas_menu = array(
    // set the all area menu category
    array(
	'label' => '全部地區',
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
		<?php echo CHtml::link(CHtml::image("images/classified/bt-needjob.gif", "我要求職", array('class' => 'img-left')), array('job/create', 'pid' => 2)); ?>
		<?php echo CHtml::link(CHtml::image("images/classified/bt-needp.gif", "我要請人"), array('job/create', 'pid' => 1)); ?>
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
		'firstPageLabel' => '第一页', //overwrite firstPage lable
		'lastPageLabel' => '最后一页', //overwrite lastPage lable
		'nextPageLabel' => '下一頁', //overwrite nextPage lable
		'prevPageLabel' => '上一頁', //overwrite prePage lable
	    ),
	));
	?>

        <!--day-lists end-->
        <!--job-ads start-->
	<?php echo $this->renderPartial('_ads'); ?>
        <!--job-ads end-->
        <!--chongdian start-->
	<?php echo $this->renderPartial('_recharge'); ?>
        <!--chongdian end-->
</div>
<!--left-part end-->
<!--right-part start-->
<div id="right-part">
	<?php echo $this_>renderPartial('_tag'); ?>
	<?php echo $this->renderPartial('_job_joy'); ?>
	<?php echo $this->renderPartial('right/job_board'); ?>
	<?php echo $this->renderPartial('right/interactive_and_info'); ?>
</div>
<!--right-part end-->