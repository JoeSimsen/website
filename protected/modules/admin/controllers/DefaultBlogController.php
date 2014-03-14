<?php
Yii::import('application.extensions.EWideImage.EWideImage');
class DefaultBlogController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='column3';	

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index', 'create','update','upload', 'delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Blog');
		$this->render('index',array(
			'dataProvider' => $dataProvider,
			'model' => new Blog(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Blog;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Blog']))
		{
			$model->attributes = $_POST['Blog'];
			$uploadedImage = CUploadedFile::getInstance($model,'image');
			if ($uploadedImage)
				$model->image = '/upload/'.$uploadedImage->name;
				
			if($model->save())
			{
				try{
					if ($uploadedImage)
						$uploadedImage->saveAs(Yii::app()->basePath.'/../upload/'.$uploadedImage->name);
					$this->redirect(array('index'));
				} catch (Exception $e) {
					echo $e.'hoi';
				}
				print_r($model->errors);
			}
			else 
				print_r($model->errors);
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Blog']))
		{
			$model->attributes = $_POST['Blog'];
			
			if($model->save())
			{
				Yii::app()->user->setFlash('success', 'Gelukt');
				$this->redirect(array('index'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionUpload($mid)
	{
		header('Vary: Accept');
		if (isset($_SERVER['HTTP_ACCEPT']) &&
		(strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false))
		{
			header('Content-type: application/json');
		} else {
			header('Content-type: text/plain');
		}
		$data = array();
	
		$model = Blog::model()->findByPk($mid);
		$model->scenario = 'upload';
		$model->image = CUploadedFile::getInstance($model, 'image');

		if ($model->image !== null  && $model->validate(array('image')))
		{
			$pos=strrpos($model->image->name,'.');
			$name = (string)substr($model->image->name, 0, $pos);
			$thumbName = $name.'_thumb.'.$model->image->getExtensionName();
			$longName = $name.'_long.'.$model->image->getExtensionName();
			
			$model->image->saveAs(Yii::app()->basePath.'/../upload/'.$model->image->name);
			EWideImage::load(Yii::app()->basePath.'/../upload/'.$model->image->name)->resize(356, 342, 'outside')->crop('center', 'center', 356, 342)->saveToFile(Yii::app()->basePath.'/../upload/'.$thumbName);
			EWideImage::load(Yii::app()->basePath.'/../upload/'.$model->image->name)->resize(662, 342, 'outside')->crop('center', 'center', 662, 342)->saveToFile(Yii::app()->basePath.'/../upload/'.$longName);
			
			$model->image_src = $model->image->name;
			// save picture name
			if( $model->save(false))
			{
				// return data to the fileuploader
				$data[] = array(
					'name' => $model->image->name,
					'type' => $model->image->type,
					'size' => $model->image->size,
					// we need to return the place where our image has been saved
					'url' => $model->getImageUrl(), // Should we add a helper method?
					// we need to provide a thumbnail url to display on the list
					// after upload. Again, the helper method now getting thumbnail.
					'thumbnail_url' => $model->getImageUrl());//MyModel::IMG_THUMBNAIL),
					// we need to include the action that is going to delete the picture
					// if we want to after loading
// 					'delete_url' => $this->createUrl('my/delete',
// 						array('id' => $model->id, 'method' => 'uploader')),
// 					'delete_type' => 'POST')
			} else {
				$data[] = array('error' => 'Unable to save model after saving picture');
			}
		} else {
			if ($model->hasErrors('image'))
			{
				$data[] = array('error', $model->getErrors('image'));
			} else {
				throw new CHttpException(500, "Could not upload file ".CHtml::errorSummary($model));
			}
		}
		// JQuery File Upload expects JSON data
		echo json_encode($data);
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
// 		if(Yii::app()->request->isPostRequest)
// 		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
// 		}
// 		else
// 			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model= Blog::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='content-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	protected function resize_image($file, $w, $h, $crop=FALSE)
	{
	    list($width, $height) = getimagesize($file);
	    $r = $width / $height;
	    if ($crop) {
	        if ($width > $height) {
	            $width = ceil($width-($width*($r-$w/$h)));
	        } else {
	            $height = ceil($height-($height*($r-$w/$h)));
	        }
	        $newwidth = $w;
	        $newheight = $h;
	    } else {
	        if ($w/$h > $r) {
	            $newwidth = $h*$r;
	            $newheight = $h;
	        } else {
	            $newheight = $w/$r;
	            $newwidth = $w;
	        }
	    }
	    $src = imagecreatefromjpeg($file);
	    $dst = imagecreatetruecolor($newwidth, $newheight);
	    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	    
	    return $dst;
	}
}
