<?php
$this->breadcrumbs=array(
	'Job Types'=>array('index'),
	$model->name=>array('view','id'=>$model->tid),
	'Update',
);

$this->menu=array(
	array('label'=>'List JobType', 'url'=>array('index')),
	array('label'=>'Create JobType', 'url'=>array('create')),
	array('label'=>'View JobType', 'url'=>array('view', 'id'=>$model->tid)),
	array('label'=>'Manage JobType', 'url'=>array('admin')),
);
?>

<h1>Update JobType <?php echo $model->tid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>