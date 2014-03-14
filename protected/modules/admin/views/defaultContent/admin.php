<h1>Pagina's beheren</h1>
<?php 
$modelName = 'default'.ucfirst($model->tableName());

/**
 * Customized setup
 **/
/*
$this->widget('application.extensions.jstree.TreeWidget',array(
	'model' => 'Content',
	'modelPropertyName' => 'name',
	'modelPropertyParentId' => 'parent_id',
	'modelPropertyPosition' => 'level',
	'ajaxUrl' => 'admin/defaultContent/simpletree',
));
*/

foreach ($model->findAll() as $data)
{
	$num = $data->level;
	$space = $num;
	
	?>
	<div class="row-fluid">
		<div class="span<?= $num ?>"></div>
		<div class="span<?= 12 - $num?> last well well-small">
			<?= $data->name; ?> - 
			Route: <?= $data->route; ?>
			<?php 
			$this->widget('bootstrap.widgets.TbButtonGroup', array(
				'size' =>'small', 
				'htmlOptions' => array(
					'class' => 'pull-right',
				),
				'buttons' => array(
					array(
						'label' => 'Wijzigen', 
						'url' => Yii::app()->createUrl("admin/$modelName/update", array("id" => $data->id)), 
					),
					array(
						'label' => '.', 
						'items' => array(
							array('label' => 'Pagina aanmaken', 'url' => Yii::app()->createUrl("admin/$modelName/create", array("pid" => $data->id, "level" => $data->level + 1))),
							array('label' => 'Pagina verwijderen', 'url' => Yii::app()->createUrl("admin/$modelName/delete", array("id" => $data->id))),
						)
					),
				),
			));
			?>
		</div>
	</div>
	<?
}
 ?>