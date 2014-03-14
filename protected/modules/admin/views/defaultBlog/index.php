<?php
$modelName = 'default'.ucfirst($model->tableName());
echo CHtml::link('Blog aanmaken', Yii::app()->createUrl("admin/$modelName/create", array()));

$this->widget(
	'bootstrap.widgets.TbJsonGridView',
	array(
		'dataProvider' => $dataProvider,
		'filter' => $model,
		'type' => 'striped bordered condensed',
		'summaryText' => false,
		'cacheTTL' => 10, // cache will be stored 10 seconds (see cacheTTLType)
		'cacheTTLType' => 's', // type can be of seconds, minutes or hours
		'columns' => array(
			'id',
			'title',
			'date_created',
			array(
				'header' => 'Wijzigen',
				'class' => 'bootstrap.widgets.TbJsonButtonColumn',
				'template' => '{view} {update} {delete}',
				'viewButtonUrl' => null,
				'updateButtonUrl' => 'Yii::app()->controller->createUrl("update",array("id" => $data->id))',
				'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->primaryKey))',
				'buttons' => array(
					'delete' => array(
						'click' => 'function(){ if (confirm("Item verwijderen?")) { } else { return false; }}'
					)
				)
			),
		),
	)
);