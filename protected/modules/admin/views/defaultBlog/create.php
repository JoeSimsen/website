<?php
$this->breadcrumbs=array(
	'Contents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Content','url'=>array('index')),
	array('label'=>'Manage Content','url'=>array('admin')),
);
?>

<h1>Create Blog</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>