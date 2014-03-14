<div class="content container">
	<div class="row-fluid">
		<div class="span8">
			<div class="blog">
				<h1><?= $model->name ?></h1>
				<?= $model->intro;	?>
			</div>
			
			<?
			$this->widget('zii.widgets.CListView', array(
				'dataProvider' => $dataProvider,
				'itemsCssClass' => 'container',
				'itemsTagName' => 'ul',
				'itemView' => '_blog',
			));
			?>
		</div>
		<div class="span4">
			<?php echo $model->content ?>
		</div>
	</div>
</div>
	
