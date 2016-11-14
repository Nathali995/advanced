<?php
/* @var $this yii\web\View */
$this->title = 'Publicaciones';
$this->params['breadcrumbs'][] = $this->title;
$posts = Yii::$app->db->createCommand('SELECT titulo, contenido FROM post WHERE publicar=\'1\'')->queryAll();
$size = count($posts);
?>

<div class="blog-index">

    <h1>Publicaciones</h1><br>

    <div class="body-content">
	
        <div class="row">
		<?php for($i=0; $i<$size; $i++)
		{
			$fila = $posts[$i];
			$titulo =$fila["titulo"];
			$contenido =$fila["contenido"];
		?>
		<div class="col-lg-4">
                <div class="thumbnail">
				<div class="caption">
					<h2><?php echo $titulo?></h2>
					<p><?php echo $contenido?></p>
				</div>
			</div>       
            </div>
		<?php } ?>
        </div>
    </div>
</div>

