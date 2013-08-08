<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="nl" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 

	Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl."/css/main.css");
?>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>

</head>

<body>
		<?php 
		$list = Yii::app()->db->createCommand()
		->select('id, name as label, CONCAT("'.Yii::app()->baseUrl.'/",id)  AS url')
		->from('content')
		->where('level = 2')
		->queryAll();
		
		$this->widget('bootstrap.widgets.TbNavbar', array(
			'brand' => 'Joey Simsen',
			'type' => 'inverse',
			'collapse' => true,
			'fixed' => false,
			'items' => array(
				array(
					'class' => 'bootstrap.widgets.TbMenu',
					'items' => $list,
				)
			)
		));
		?>
	
		<?= $content; ?>
</body>
</html>
