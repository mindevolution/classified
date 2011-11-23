<?php
$this->breadcrumbs=array(
	'Informations'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Information', 'url'=>array('index')),
	array('label'=>'Create Information', 'url'=>array('create')),
	array('label'=>'Update Information', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Information', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Information', 'url'=>array('admin')),
);
?>

<h1>View Information #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'timestamp',
	),
)); ?>
