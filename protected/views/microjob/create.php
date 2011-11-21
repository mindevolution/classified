<?php
$this->breadcrumbs=array(
	'Microjobs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Microjob', 'url'=>array('index')),
	array('label'=>'Manage Microjob', 'url'=>array('admin')),
);
?>

<h1>Create Microjob</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>