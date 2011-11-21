<?php
$this->breadcrumbs=array(
	'Job Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List JobType', 'url'=>array('index')),
	array('label'=>'Create JobType', 'url'=>array('create')),
	array('label'=>'Update JobType', 'url'=>array('update', 'id'=>$model->tid)),
	array('label'=>'Delete JobType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JobType', 'url'=>array('admin')),
);
?>

<h1>View JobType #<?php echo $model->tid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tid',
		'name',
	),
)); ?>
