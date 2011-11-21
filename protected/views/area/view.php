<?php
$this->breadcrumbs=array(
	'Areas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Area', 'url'=>array('index')),
	array('label'=>'Create Area', 'url'=>array('create')),
	array('label'=>'Update Area', 'url'=>array('update', 'id'=>$model->aid)),
	array('label'=>'Delete Area', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->aid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Area', 'url'=>array('admin')),
);
?>

<h1>View Area #<?php echo $model->aid; ?></h1>

<?php $model->pid = $model->getAreaNameByPk($model->pid); ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'aid',
		'name',
		'pid',
		'weight',
	),
)); ?>
