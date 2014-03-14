<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id' => 'content-form',
	'enableAjaxValidation' => false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>50)); ?>
	
	<?= $form->textarea($model, 'intro'); ?>

	<?= $form->textarea($model, 'content'); ?>
	
	<?= $form->checkBoxRow($model, 'long'); ?>

	<?= $form->select2Row($model, 'categorie', array(
	        'asDropDownList' => false,
	        'options' => array(
	            'tags' => $model->getTags(),
	            'placeholder' => 'Typ een categorie in',
				'createSearchChoice' => '',
	            'width' => '40%',
	            'tokenSeparators' => array(',', ' ')
	        )
    )); ?>
	
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

	<?php $this->widget('bootstrap.widgets.TbFileUpload', array(
	    'url' => $this->createUrl("defaultBlog/upload", array('mid' => $model->id)),
	    'model' => $model,
		'value' => $model->getImageUrl(),
	    'attribute' => 'image', // see the attribute?
	    'formView' => 'admin.views.defaultBlog._upload',
	    'options' => array(
		    'maxFileSize' => 2000000,
		    'acceptFileTypes' => 'js:/(\.|\/)(jpe?g|png)$/i',
	))); ?>