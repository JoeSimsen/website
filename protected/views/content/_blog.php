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
		<div class="mask">  
			<div class="categories">
				<span><?= Yii::app()->dateFormatter->format("MMMM d", $data->date_created); ?></span>
				<? 
				$categorieen = explode(',', $data->categorie);
				foreach ($categorieen as $categorie)
					echo '<div class="cat"><span class="glyphicon glyphicon-'.$categorie.'"></span>'.$data->getLabelForTag($categorie).'</div>'; 
				?>
			</div>
			<h2><span><?= $data->title ?></span></h2>
	     </div> 
    </a>  
</div>