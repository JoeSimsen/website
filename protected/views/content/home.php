<?
$baseUrl = Yii::app()->request->baseUrl;

$script = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.extensions'));
Yii::app()->clientScript->registerScriptFile($script.'/masonry.pkgd.min.js', CClientScript::POS_END)
			->registerScriptFile($script.'/imagesloaded.pkgd.min.js', CClientScript::POS_END)
			->registerScript(__FILE__ . 'imagesizing', "
				$('.item').each(function(){
				    var refRatio = 240/300;
					var imgH = $(this).children('img').height();
					var imgW = $(this).children('img').width();

				    if ( (imgW/imgH) < refRatio ) { 
				        $(this).addClass('portrait');
				    } else {
				        $(this).addClass('landscape');
				    }
				})
			", CClientScript::POS_LOAD)
			->registerScript(__FILE__ . 'masonr', "
				// initialize
				var container = $('.mason').masonry({
					  columnWidth: '.sizer',
					  	itemSelector: '.item',
				  	});
				
				container.imagesLoaded(function() {
					$('.mason').masonry({
						columnWidth: '.sizer',
					  	itemSelector: '.item',
						isAnimated: true,
				  	});
				
					$('.item').each(function(){
						$(this).animate({ opacity: 1 });
					});
			  	});
			  	
			", CClientScript::POS_LOAD);
?>
<div class="space">
	<div class="row-fluid intro">
		<div class="span5">
			<h1><?php echo $model->name ?></h1>
			<?= $model->intro ?>
			<?= CHtml::link('<span class="glyphicon glyphicon-envelope"></span> Contact me', 'mailto:joeysimsen@gmail.com', array('class' => 'btn btn-primary')) ?>
		</div>
		<div class="span7 hidden-phone">
			<img alt="Joey Simsen" src="<?= $baseUrl ?>/images/js2.png" />
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
	<?
	$this->widget('zii.widgets.CListView', array(
		'dataProvider' => $dataProvider,
		'itemsTagName' => 'div',
		'itemsCssClass' => 'mason',
		'itemView' => '_blog',
		'template' => "{items}\n{pager}",
	));
	?>
	</div>
</div>