<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	private $_model = null;
	
	public function run($actionID)
	{
		if($actionID==='')
		{
			$actionID = Yii::app()->db->createCommand()
			->select('route')
			->from('content')
			->where('id=:id', array(':id'=> Yii::app()->request->getParam('id',1)))
			->queryScalar();
		}
		parent::run($actionID);
	}
	
	public function getModel()
	{
		if (!$this->_model)
		{
			$id = Yii::app()->request->getParam('id', 1);
			$this->_model = $this->loadModel($id);
		}
		return $this->_model;
		
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$modelName =  $this->uniqueid;
		$model = CActiveRecord::model($modelName)->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}