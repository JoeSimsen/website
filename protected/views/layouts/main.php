<?php 
$baseUrl = Yii::app()->getRequest()->getBaseUrl(true);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<base href="<?= $baseUrl ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="<?= $baseUrl ?>/favicon.ico" />
	<title>Joey Simsen | Web programmer</title>
	<meta name="language" content="nl" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php 
	$vendors = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.vendors'));
	Yii::app()->clientScript
// 							->registerCssFile("//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css")
							->registerPackage('browser')//($vendors."/jquery.browser.min.js", CClientScript::POS_END)
							->registerScriptFile("http://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js", CClientScript::POS_END)
							
							->registerCssFile(Yii::app()->request->baseUrl."/css/bootstrap.min.css")
							->registerCssFile(Yii::app()->request->baseUrl."/css/main.css?v=1")
							->registerScript('ganaly', "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
								  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
								  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
								  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
								
								  ga('create', 'UA-46135023-1', 'joeysimsen.com');
								  ga('send', 'pageview');
							", CClientScript::POS_HEAD);
?>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 menu">
				<a href="<?= $baseUrl ?>" class="brand">
					<img alt="Logo" src="<?= $baseUrl ?>/images/sign3.jpg"/>
					Joey Simsen
				</a>
				
				<div class="social hidden-xs">
					<a href="https://github.com/JoeSimsen" class="symbol github">&#xe237;</a>
					<a href="https://www.facebook.com/joey.simsen" class="symbol facebook">&#xe227;</a>
					<a href="https://twitter.com/__Sinn" class="symbol">&#xe286;</a>
					<a href="https://plus.google.com/+JoeySimsen" class="symbol google">&#xe239;</a>
				</div>
			</div>
		</div>
	</div>
		
	<?= $content; ?>
<!-- 	<div class="footer"> -->
<!-- 	</div> -->
</body>
</html>
