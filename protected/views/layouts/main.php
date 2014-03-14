<?php 
$baseUrl = Yii::app()->baseUrl;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<base href="<?= $baseUrl ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="<?= $baseUrl ?>/favicon.ico">
	<meta name="language" content="nl" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 

	Yii::app()->clientScript
							->registerCssFile(Yii::app()->request->baseUrl."/css/bootstrap.min.css")
							->registerCssFile(Yii::app()->request->baseUrl."/css/bootstrap-theme.min.css")
							->registerCssFile(Yii::app()->request->baseUrl."/css/main.css");
?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-46135023-1', 'joeysimsen.com');
	  ga('send', 'pageview');
	
	</script>
</head>

<body>
	<div class="container">
		<div class="space">
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
									<a href="https://github.com/JoeSimsen" class="symbol github">&#xe237;</a>
									<a href="https://www.facebook.com/joey.simsen" class="symbol facebook">&#xe227;</a>
									<a href="https://twitter.com/__Sinn" class="symbol">&#xe286;</a>
									<a href="https://plus.google.com/+JoeySimsen" class="symbol google">&#xe239;</a>
								</div>
							</div>
						</div>
					</div>
					<?php 
// 					$list = Yii::app()->db->createCommand()
// 					->select('id, name as label, CONCAT("'.Yii::app()->baseUrl.'/",id)  AS url')
// 					->from('content')
// 					->where('level = 2')
// 					->queryAll();
					
// 					$this->widget('bootstrap.widgets.TbNavbar', array(
// 						'brand' => 'Joey Simsen',
// 						'type' => 'inverse',
// 						'collapse' => true,
// 						'fixed' => true,
// 						'items' => array(
// 							array(
// 								'class' => 'bootstrap.widgets.TbMenu',
// 								'items' => $list,
// 							)
// 						)
// 					));
					?>
				</div>
			</div>
		</div>
		
		<?= $content; ?>
	</div>
	<div class="footer">
		<p>footer lorem ipsum</p>
	</div>
</body>
</html>
