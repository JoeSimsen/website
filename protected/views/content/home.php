<?
$baseUrl = Yii::app()->request->baseUrl;

$script = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.extensions'));
Yii::app()->clientScript->registerScriptFile($script.'/masonry.pkgd.min.js', CClientScript::POS_END)
			->registerScriptFile($script.'/imagesloaded.pkgd.min.js', CClientScript::POS_END)
			->registerScriptFile($script.'/plax.js', CClientScript::POS_END)
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
			->registerScript(__CLASS__ . 'test', " 
			var msnry;	
			WebFont.load({
			    google: {
			      families: ['Open Sans', 'Open Sans:bold']
			    },
			  active: triggerMasonry,
			  inactive: triggerMasonry,
			  });", CClientScript::POS_LOAD)
			->registerScript(__FILE__ . 'masonr', "
				msnry = $('.mason');
				triggerMasonry();
				
				function triggerMasonry() {
				  // don't proceed if masonry has not been initialized
				  if ( !msnry ) {
				    return;
				  }
				  msnry.masonry({
					  	itemSelector: '.item',
				  	});
				}
				msnry.imagesLoaded(function() {
				triggerMasonry();
					$('.item').each(function(){
						$(this).animate({ opacity: 1 }, 500);
					});
			  	});
			  	
				$('img.plax').plaxify()
				$.plax.enable()
			", CClientScript::POS_LOAD);
?>
<div class="container">
	<div class="row intro" itemscope itemtype="http://data-vocabulary.org/Person">
		<div class="col-sm-5">
			<h1><?php echo $model->name ?></h1>
			<meta itemprop="name" content="Joey Simsen" />
			<meta itemprop="birthdate" content="1989-11-16" />
			<meta itemprop="email" content="joeysimsen@gmail.com" />
			<?= $model->intro ?>
			<?= CHtml::link('<span class="glyphicon glyphicon-envelope"></span> Contact me', 'mailto:joeysimsen@gmail.com', array('class' => 'btn btn-primary')) ?>
		</div>
		<div class="col-sm-7 hidden-xs">
			<img src="<?= $baseUrl ?>/images/js_bg.jpg" />
			<img class="plax" src="<?= $baseUrl ?>/images/js_city.png" data-xrange="10" data-yrange="5" data-invert="true" />
			<img class="plax js" alt="Joey Simsen" src="<?= $baseUrl ?>/images/js_phone.png" data-xrange="20" data-yrange="10" itemprop="photo" />
		</div>
	</div>
</div>
<?
$this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemsTagName' => 'div',
	'itemsCssClass' => 'mason container',
	'itemView' => '_blog',
	'template' => "{items}\n{pager}",
));
?>