<?php
$this->breadcrumbs=array(
	'Microjobs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Microjob', 'url'=>array('index')),
	array('label'=>'Create Microjob', 'url'=>array('create')),
	array('label'=>'View Microjob', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Microjob', 'url'=>array('admin')),
);
?>

<h1>Update Microjob <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>