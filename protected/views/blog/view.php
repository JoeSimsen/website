<?
$baseUrl = Yii::app()->baseUrl;

Yii::app()->clientScript
			->registerScript(__FILE__ . 'load', "
				$('.content').each(function(){
					$(this).toggleClass('load');
				});
			", CClientScript::POS_LOAD);

?>
<div class="space">
	<div class="row-fluid content">
		<div class="span8">
			<div class="header">
				<div class="mask">  
					<div class="categories">
						<span><?= Yii::app()->dateFormatter->format("d MMMM y", $model->date_created); ?></span>
						<? 
						$categorieen = explode(',', $model->categorie);
						foreach ($categorieen as $categorie)
							echo '<span class="glyphicon glyphicon-'.$categorie.'"></span>'; 
						?>
					</div>
			     </div>
				<?= CHtml::image($model->getImageUrl(true), $model->title, array()); ?>
			</div>
			<div class="text">
				<h1><?php echo $model->title ?></h1>
				<?= $model->intro ?>
				<?= $model->content ?>
			</div>
		</div>
		<div class="span4 sidebar">
			<div class="text">
				<h3>Categories</h3>
				<ul class="categories">
					<?
					$categorieen = explode(',', $model->categorie);
					foreach ($categorieen as $categorie)
						echo '<li><span class="glyphicon glyphicon-'.$categorie.'"></span>'.$model->getLabelForTag($categorie).'</li>';
					?>
				</ul>
			</div>
		</div>
	</div>

</div>