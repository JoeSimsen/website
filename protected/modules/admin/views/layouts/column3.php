<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); 

?>
<div class="span2">
	<? $this->widget(
	    'bootstrap.widgets.TbMenu',
	    array(
	        'type' => 'list',
	        'items' => array(
	            array(
	                'label' => 'List header',
	                'itemOptions' => array('class' => 'nav-header')
	            ),
	            array(
	                'label' => 'Pagina\'s',
	                'url' => array('//admin/defaultContent/admin'),
	            ),
	            array('label' => 'Blog', 'url' => array('//admin/defaultBlog/index')),
	        )
	    )
	); ?>
</div>
<div class="span9">

	<div id="content">
		<? $this->widget('bootstrap.widgets.TbAlert');
		echo $content; ?>
	</div><!-- content -->
</div>
<div class="span1 last">
</div>
<?php $this->endContent(); ?>