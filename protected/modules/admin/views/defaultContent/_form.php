<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'content-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->ckEditorRow($model, 'intro', array(
		'options'=>array(
			'height' => '100',
			'width'=>'600', 
			'resize_maxWidth'=>'640',
			'resize_minWidth'=>'320',
		)
	));?>
	
	<?php echo $form->ckEditorRow($model, 'content', array(
		'options'=>array(
			'width'=>'640', 
			'resize_maxWidth'=>'640',
			'resize_minWidth'=>'320',
		)
	));?>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>