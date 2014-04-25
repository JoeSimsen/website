<?
$baseUrl = Yii::app()->baseUrl;

Yii::app()->clientScript
			->registerScript(__FILE__ . 'load', "
				$('.content').each(function(){
					$(this).toggleClass('load');
				});
			", CClientScript::POS_LOAD);

?>
<div class="container">
	<div class="row content">
		<div class="col-sm-8">
			<div class="text">
				<div class="header">
					<div class="mask">  
						<div class="categories">
							<span><?= Yii::app()->dateFormatter->format("MMMM d", $model->date_created); ?></span>
							<? 
							$categorieen = explode(',', $model->categorie);
							foreach ($categorieen as $categorie)
								echo '<div class="cat"><span class="glyphicon glyphicon-'.$categorie.'"></span>'.$model->getLabelForTag($categorie).'</div>'; 
							?>
						</div>
				     </div>
					<?= CHtml::image($model->getImageUrl(true), $model->title, array()); ?>
				</div>
				<h1><?php echo $model->title ?></h1>
				<?= $model->intro ?>
				<?= $model->content ?>
			</div>
		</div>
		<div class="col-sm-4 sidebar">
					<h3>About</h3>
				<div class="row">
					<div class="col-sm-8">
						<h4>Joey Simsen</h4>
						<p>Web programmer</p>
					</div>
					<div class="col-sm-4  hidden-xs">
						<img alt="Joey Simsen" src="<?= $baseUrl ?>/images/joeysimsen310.jpg" />
					</div>
				</div>
				<hr/>
				<h3>Categories</h3>
				<ul class="categories">
					<?
					$categorieen = explode(',', $model->categorie);
					foreach ($categorieen as $categorie)
						echo '<li><span class="glyphicon glyphicon-'.$categorie.'"></span>'.$model->getLabelForTag($categorie).'</li>';
					?>
				</ul>
				<hr/>
				<h3>Share</h3>
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
				<a class="addthis_button_preferred_1"></a>
				<a class="addthis_button_preferred_2"></a>
				<a class="addthis_button_preferred_3"></a>
				<a class="addthis_button_preferred_4"></a>
				<a class="addthis_button_preferred_5"></a>
				<a class="addthis_button_preferred_6"></a>
				<a class="addthis_button_preferred_7"></a>
				<a class="addthis_button_compact"></a>
				</div>
				<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
				<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f42173a5cbc371e"></script>
				<!-- AddThis Button END -->
		</div>
	</div>
</div>

