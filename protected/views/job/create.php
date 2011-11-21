<?php
$this->breadcrumbs = array(
	'工作首頁' => array('job/index'),
	'发布信息',
);

$this->menu = array(
	array('label' => 'List Job', 'url' => array('index')),
	array('label' => 'Manage Job', 'url' => array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>