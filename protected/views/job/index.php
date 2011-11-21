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
		'active' => isset($_GET['aid']) ? false:true, // set to active when select all
	),
);
foreach ($areas as $id => $name) {
	$areas_menu[] = array(
		'label' => $name,
		'url' => array('job/index/', 'aid'=>$id),
	);
}
?>
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