<?php /* @var $this Controller */ 
$baseUrl = Yii::app()->request->baseUrl;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	<?
		$script = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.vendors'));
	?>
	<script>
		tinymce.init({
			selector:'textarea',
		    plugins: "link responsivefilemanager",
		    height: 400,
		    relative_urls : false,
		    external_filemanager_path:"<?= $script ?>/responsivefilemanagerbase/filemanager/",
		   filemanager_title:"Responsive Filemanager" ,
		   image_advtab: true ,
		   external_plugins: { "responsivefilemanager" : "<?= $script ?>/responsivefilemanager/plugin.min.js"}
		});
	</script>
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title>Admin</title>
</head>

<body>
	<?php 
	$this->widget('bootstrap.widgets.TbNavbar', array(
	    'brand' => 'Title',
	    'fixed' => false,
		'type' => 'inverse',
	    'items' => array(
	        '<form class="navbar-form pull-left">
	        <input type="text" class="span2">
	        <button type="submit" class="btn">Submit</button>
	        </form>'
	    )
	));
	?>
    <div class="row-fluid">
		<?php echo $content; ?>
	</div>

</body>
</html>
