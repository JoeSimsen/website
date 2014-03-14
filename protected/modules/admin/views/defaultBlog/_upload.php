<!-- The file upload form used as target for the file upload widget -->
<?php echo CHtml::beginForm($this->url, 'post', $this->htmlOptions); ?>
	<div class="fileupload-loading"></div>
	<br>
	<div class="row-fluid">
	    <table class="table table-striped">
	        <tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery">
	        	<? if ($this->value) : ?>
		        	<tr class="template-upload fade in">
				        <td class="preview"><span class="fade in"><?= CHtml::image($this->value) ?></span></td>
				        <td class="name"><span>2.jpg</span></td>
				        <td class="size"><span>140.21 KB</span></td>
			            <td></td>
			            <td class="start"></td>
				        <td class="cancel"></td>
				    </tr>
				<? endif; ?>
	        </tbody>
	    </table>
	</div>
	<div class="fileupload-buttonbar">
	    <div class="span7">
	        <!-- The fileinput-button span is used to style the file input field as button -->
			<span class="btn btn-success fileinput-button"> <i class="icon-plus icon-white"></i> <span>Add files...</span>
				<?php
				if ($this->hasModel()) :
					echo CHtml::activeFileField($this->model, $this->attribute, $htmlOptions) . "\n"; else :
					echo CHtml::fileField($name, $this->value, $htmlOptions) . "\n";
				endif;
				?>
			</span>
	        <button type="submit" class="btn btn-primary start">
	            <i class="icon-upload icon-white"></i>
	            <span>Start upload</span>
	        </button>
	        <button type="reset" class="btn btn-warning cancel">
	            <i class="icon-ban-circle icon-white"></i>
	            <span>Cancel upload</span>
	        </button>
	        <button type="button" class="btn btn-danger delete">
	            <i class="icon-trash icon-white"></i>
	            <span>Delete</span>
	        </button>
	        <input type="checkbox" class="toggle">
	    </div>
	    <div class="span5">
	        <!-- The global progress bar -->
	        <div class="progress progress-success progress-striped active fade">
	            <div class="bar" style="width:0%;"></div>
	        </div>
	    </div>
	</div>
<?php echo CHtml::endForm(); ?>

