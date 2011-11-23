<?php
$this->breadcrumbs=array(
	'Jobsnews'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jobsnews', 'url'=>array('index')),
	array('label'=>'Manage Jobsnews', 'url'=>array('admin')),
);
?>

<h1>Create Jobsnews</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>