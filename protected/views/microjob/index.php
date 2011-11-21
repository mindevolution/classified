<?php
$this->breadcrumbs=array(
	'Microjobs',
);

$this->menu=array(
	array('label'=>'Create Microjob', 'url'=>array('create')),
	array('label'=>'Manage Microjob', 'url'=>array('admin')),
);
?>

<h1>Microjobs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
