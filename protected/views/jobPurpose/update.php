<?php
$this->breadcrumbs=array(
	'Job Purposes'=>array('index'),
	$model->name=>array('view','id'=>$model->pid),
	'Update',
);

$this->menu=array(
	array('label'=>'List JobPurpose', 'url'=>array('index')),
	array('label'=>'Create JobPurpose', 'url'=>array('create')),
	array('label'=>'View JobPurpose', 'url'=>array('view', 'id'=>$model->pid)),
	array('label'=>'Manage JobPurpose', 'url'=>array('admin')),
);
?>

<h1>Update JobPurpose <?php echo $model->pid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>