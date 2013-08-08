<?php

class DefaultController extends Controller
{
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
			array('allow',
				'actions' => array('login'),
				'users' => array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	/**
     * Fills the JS tree on an AJAX request.
     * Should receive parent node ID in $_GET['root'],
     *  with 'source' when there is no parent.
     */
    public function actionAjaxFillTree()
    {
        // accept only AJAX request (comment this when debugging)
        if (!Yii::app()->request->isAjaxRequest) {
            exit();
        }
        // parse the user input
        $parentId = "NULL";
        if (isset($_GET['root']) && $_GET['root'] !== 'source') {
            $parentId = (int) $_GET['root'];
        }
        // read the data (this could be in a model)
        $children = Yii::app()->db->createCommand(
            "SELECT m1.id, m1.name AS text, m2.id IS NOT NULL AS hasChildren "
            . "FROM tree AS m1 LEFT JOIN tree AS m2 ON m1.id=m2.parent_id "
            . "WHERE m1.parent_id <=> $parentId "
            . "GROUP BY m1.id ORDER BY m1.name ASC"
        )->queryAll();
        $newChildren = array();
        foreach ($children as $child)
        {
        	$child['htmlOptions'] = array(
        		'class' => '.nav-pills',
        	);
        	$newChildren[] = $child;
        }
        print_r(CTreeView::saveDataAsJson($newChildren));die;
        echo str_replace(
            '"hasChildren":"0"',
            '"hasChildren":false',
            CTreeView::saveDataAsJson($newChildren)
        );
    }
}