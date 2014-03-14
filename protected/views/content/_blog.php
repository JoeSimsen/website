<?
$class = $data->long ? ' long' : '';
if ($index == 0)
{
	echo '<div class="sizer"></div>';
	?>
	<div class="item featured">
		<span>Featured projects &rsaquo;</span>
	</div>
	<?
}
?>
<div class="item<?= $class ?>">
	<a href="<?= $this->createUrl('blog/view', array('id' => $data->id)) ?>" class="info">
		<?= CHtml::image($data->getImageUrl($data->long), $data->title, array()); ?>
    </a>  
	<div class="mask">  
		<div class="categories">
			<span><?= Yii::app()->dateFormatter->format("d MMMM y", $data->date_created); ?></span>
			<? 
			$categorieen = explode(',', $data->categorie);
			foreach ($categorieen as $categorie)
				echo '<span class="glyphicon glyphicon-'.$categorie.'"></span>'; 
			?>
		</div>
		<h2><span><?= $data->title ?></span></h2>
     </div> 
</div>