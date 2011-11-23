<?php
$this->breadcrumbs=array(
	'Informations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Information', 'url'=>array('index')),
	array('label'=>'Manage Information', 'url'=>array('admin')),
);
?>

<h1>Create Information</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>