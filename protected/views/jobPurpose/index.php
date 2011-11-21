<?php
$this->breadcrumbs=array(
	'Job Purposes',
);

$this->menu=array(
	array('label'=>'Create JobPurpose', 'url'=>array('create')),
	array('label'=>'Manage JobPurpose', 'url'=>array('admin')),
);
?>

<h1>Job Purposes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
