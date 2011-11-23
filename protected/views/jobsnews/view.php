<?php
$this->breadcrumbs=array(
	'Jobsnews'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Jobsnews', 'url'=>array('index')),
	array('label'=>'Create Jobsnews', 'url'=>array('create')),
	array('label'=>'Update Jobsnews', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Jobsnews', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jobsnews', 'url'=>array('admin')),
);
?>

<h1>View Jobsnews #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'timestamp',
	),
)); ?>
