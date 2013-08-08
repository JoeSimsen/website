<?php
echo CHtml::link($model->parent->name, Yii::app()->baseUrl.'/content/'.$model->parent->id) 
	. ' / ' 
		. CHtml::link($model->name, $model->id);
?>
<div class="row-fluid sub">
	<div class="intro span5">
		<?php echo $model->intro ?>
	</div>
	<div class="span7 last">
		<?php echo $model->content ?>
	</div>
</div>