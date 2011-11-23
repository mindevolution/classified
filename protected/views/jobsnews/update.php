<?php
$this->breadcrumbs=array(
	'Jobsnews'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Jobsnews', 'url'=>array('index')),
	array('label'=>'Create Jobsnews', 'url'=>array('create')),
	array('label'=>'View Jobsnews', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Jobsnews', 'url'=>array('admin')),
);
?>

<h1>Update Jobsnews <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>