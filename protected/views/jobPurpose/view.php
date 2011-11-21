<?php
$this->breadcrumbs=array(
	'Job Purposes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List JobPurpose', 'url'=>array('index')),
	array('label'=>'Create JobPurpose', 'url'=>array('create')),
	array('label'=>'Update JobPurpose', 'url'=>array('update', 'id'=>$model->pid)),
	array('label'=>'Delete JobPurpose', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JobPurpose', 'url'=>array('admin')),
);
?>

<h1>View JobPurpose #<?php echo $model->pid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pid',
		'name',
	),
)); ?>
