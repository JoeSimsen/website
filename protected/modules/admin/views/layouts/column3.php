<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); 
Yii::app()->clientScript->registerScript(__FILE__, "$('#nav').affix()");

?>
<div class="span2">
	<ul class="nav nav-list bs-docs-sidenav" data-spy="affix" data-offset-top="20">
	  <li class="active"><a href="<?= Yii::app()->urlManager->createUrl('admin/defaultContent/admin') ?>">Pagina's</a></li>
	</ul>
</div>
<div class="span9">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span1 last">
</div>
<?php $this->endContent(); ?>