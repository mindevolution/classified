<?php
$this->breadcrumbs=array(
	'Job Purposes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JobPurpose', 'url'=>array('index')),
	array('label'=>'Manage JobPurpose', 'url'=>array('admin')),
);
?>

<h1>Create JobPurpose</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>