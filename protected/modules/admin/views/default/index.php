<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>
<?php 
	$this->widget('TreeView', array(
		'url' => array('ajaxFillTree'),
	)
	);
	?>

<p>
You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>