<?php
$this->breadcrumbs=array(
	'Microjobs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Microjob', 'url'=>array('index')),
	array('label'=>'Create Microjob', 'url'=>array('create')),
	array('label'=>'Update Microjob', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Microjob', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Microjob', 'url'=>array('admin')),
);
?>

<h1>View Microjob #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'timestamp',
	),
)); ?>
