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


	<title>Admin</title>
</head>

<body>
	<div class="row-fluid ">
		<div class="span12">
			<div class="navbar navbar-inverse navbar-fixed-1">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target="#yii_bootstrap_collapse_0">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a href="/website/" class="brand">
							Joey Simsen
						</a>
						<div class="nav-collapse collapse" id="yii_bootstrap_collapse_0">
							<?= Yii::app()->user->isGuest ? '' : CHtml::link('logout', $this->createUrl('default/logout')) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="row-fluid">
		<?php echo $content; ?>
	</div>

</body>
</html>
