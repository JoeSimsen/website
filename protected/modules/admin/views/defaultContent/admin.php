<h1>Pagina's beheren</h1>
<?php 
foreach ($model->findAll() as $data)
{
	$num = $data->level;
	$space = $num;
	
	?>
	<div class="row-fluid">
		<div class="span<?= $num ?>"></div>
		<div class="span<?= 12 - $num?> last well well-small">
			<?= $data->name; ?>
			<?php 
			$this->widget('bootstrap.widgets.TbButtonGroup', array(
				'size' =>'small', 
				'htmlOptions' => array(
					'class' => 'pull-right',
				),
				'buttons' => array(
					array(
						'label' => 'Wijzigen', 
						'url' => Yii::app()->createUrl("admin/defaultContent/update", array("id" => $data->id)), 
					),
					array(
						'label' => '.', 
						'items' => array(
							array('label' => 'Pagina aanmaken', 'url' => Yii::app()->createUrl("admin/defaultContent/create", array("pid" => $data->id, "level" => $data->level + 1))), // this makes it split :)
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