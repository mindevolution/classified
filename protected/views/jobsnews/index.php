<?php
$this->breadcrumbs=array(
	'Jobsnews',
);

$this->menu=array(
	array('label'=>'Create Jobsnews', 'url'=>array('create')),
	array('label'=>'Manage Jobsnews', 'url'=>array('admin')),
);
?>

<h1>Jobsnews</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
