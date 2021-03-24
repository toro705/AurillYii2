<?php


	namespace app\components;

	use Yii;
	use yii\db\Connection;
	use yii\db\Query;
	use yii\db\Expression;
	use yii\base\InvalidCallException;
	use yii\base\InvalidParamException;
	use yii\di\Instance;
	use yii\rbac\DbManager;
	use yii\rbac\Assignment;
	
	class CheckIfLoggedIn extends \yii\base\Behavior
	{

	    public function events()
	    {
	        return [
	            \yii\web\Application::EVENT_BEFORE_REQUEST => 'CheckIfLoggedIn',
	        ];
	    }
	    public function CheckIfLoggedIn()
	    {
	    	if (Yii::$app->user->isGuest) {
    			echo 'Your are a guest';
	    	} else {
    			echo 'Your are a logged in';

	    	}
	    	// die();
	    }

	}
?>