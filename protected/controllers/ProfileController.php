<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * This controller provides basic functionality for a user to view and edit their personal profile
 *
 * PHP version 5
 *
 * MIT LICENSE Copyright (c) 2012-2013 Charles R. Portwood II
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation 
 * files (the "Software"), to deal in the Software without restriction, including without limitation the rights to 
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom 
 * the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF 
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE 
 * FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION 
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @category   CategoryName
 * @package    CiiMS Content Management System
 * @author     Charles R. Portwood II <charlesportwoodii@ethreal.net>
 * @copyright  Charles R. Portwood II <https://www.erianna.com> 2012-2013
 * @license    http://opensource.org/licenses/MIT  MIT LICENSE
 * @link       https://github.com/charlesportwoodii/CiiMS
 */
class ProfileController extends CiiController
{

	/**
	 * The layout to use for this controller
	 * @var string
	 */
	public $layout = '//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array_merge(
			parent::filters(), 
			array(
				'accessControl'
			)
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
			array('allow',  // Allow all users to any section
				'actions' => array('index', 'badges', 'removeImage', 'promoteImage'),
				'users'=>array('*'),
			),
			array('allow',  // deny all users
				'actions' => array('edit'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Provides functionality to view a given profile
	 * @param  int 	  $id          The ID belonging to the user
	 * @param  string $displayName The user's display name. This isn't super necessary, it just is better for SEO
	 */
	public function actionIndex($id=NULL, $displayName=NULL)
	{
		// If an ID isn't provided, throw an error
		if ($id === NULL)
			throw new CHttpException(404, 'Oops! That user doesn\'t exist on our network!');

		// For SEO, if the display name isn't in the url, reroute it
		if ($id !== NULL && $displayName === NULL)
		{
			$model = Users::model()->findByPk($id);
			if ($model === NULL)
				throw new CHttpException(404, 'Oops! That user doesn\'t exist on our network!');
			else
				$this->redirect('/profile/' . $model->id . '/' . preg_replace('/[^\da-z]/i', '', $model->displayName));
		}

		$model = Users::model()->findByPk($id);

		$this->pageTitle = $model->displayName . ' | ' . Yii::app()->name;
		$postsCriteria = new CDbCriteria;
	    $postsCriteria->addCondition("vid=(SELECT MAX(vid) FROM content WHERE id=t.id)");
	    $postsCriteria->addCondition('type_id=2');
	    $postsCriteria->addCondition('status=1');
	    $postsCriteria->addCondition('password=""');
	    $postsCriteria->addCondition('author_id=:id');
	    $postsCriteria->params = array(
	    	':id' => $id
	    );

		$contentCount =  Content::model()->count($postsCriteria);
		$this->render('index', array('model' => $model, 'contentCount' => $contentCount));
	}

	/**
	 * Provides functionality for a user to edit their profile
	 */
	public function actionEdit()
	{
		$model = Users::model()->findByPk(Yii::app()->user->id);

		if (Cii::get($_POST, 'Users', NULL) !== NULL)
		{
			// Load the bcrypt hashing tools if the user is running a version of PHP < 5.5.x
			if (!function_exists('password_hash'))
				require_once YiiBase::getPathOfAlias('ext.bcrypt.bcrypt').'.php';

			$cost = Cii::getBcryptCost();

			if ($_POST['Users']['password'] != '')
				$_POST['Users']['password'] = password_hash(Users::model()->encryptHash($_POST['Users']['email'], $_POST['Users']['password'], Yii::app()->params['encryptionKey']), PASSWORD_BCRYPT, array('cost' => $cost));
			else
				unset($_POST['Users']['password']);

			unset($_POST['Users']['status']);
			unset($_POST['Users']['user_role']);

			$model->attributes = Cii::get($_POST, 'Users', array());
			$model->about = Cii::get(Cii::get($_POST, 'Users', array()), 'about', NULL);

			if ($model->save())
			{
				Yii::app()->user->setFlash('success', 'Your profile has been updated!');
				$this->redirect($this->createUrl('/profile/'. $model->id));
			}
			else
			{
				Yii::app()->user->setFlash('warning', 'There were errors saving your profile. Please correct them before trying to save again.');
			}
		}
		$id = Yii::app()->user->id;
		
		$attachmentCriteria = new CDbCriteria(array(
		    'condition' => "user_id = {$id} AND (t.key LIKE 'upload-%' OR t.key = 'blog-image')",
		    'order'     => 't.key ASC',
		    'group'     => 't.value'
		));
        
		$attachments = $id != NULL ? UserMetadata::model()->findAll($attachmentCriteria) : NULL;		

		//$this->render('edit', array('model' => $model));
		$this->render('edit',array(
			'model'          =>  $model,
			'id'             =>  $id,
			'attachments' 	 =>  $attachments
		));		
		
	}

	/**
	 * Provides functionality for a user to show their badges and awards that they have earned
	 */
	public function actionBadges($id)
	{

		$model = Users::model()->findByPk(Yii::app()->user->id);
if (Yii::app()->request->isPostRequest)
		{
			Yii::import("ext.EAjaxUpload.qqFileUploader");
			$path = '/';
	        $folder=Yii::app()->getBasePath() .'/../uploads' . $path;// folder for uploaded files
	        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');//array("jpg","jpeg","gif","exe","mov" and etc...
	        $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
	        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
	        $result = $uploader->handleUpload($folder);

			
			if ($result['success'] = true)
			{
				$meta = UserMetadata::model()->findbyAttributes(array('user_id' => $id, 'key' => $result['filename']));

				if ($meta == NULL)
					$meta = new UserMetadata;

				/*$meta->user_id = $id;
				$meta->key = $result['filename'];
				$meta->value = '/uploads' . $path . $result['filename'];*/
				$meta->user_id = $id;
				$meta->key = $result['filename'];
				$meta->value = $result['filename'];
				
				$meta->save();
				$result['filepath'] = '/uploads/' . $result['filename'];
			}
	        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
 
        echo $return;
		}	
		Yii::app()->end();	
		
		$this->render('badges', array('model' => $model));
	}
	
	public function actionUpload($id)
	{
		if (Yii::app()->request->isPostRequest)
		{
			Yii::import("ext.EAjaxUpload.qqFileUploader");
			$path = '/';
	        $folder=Yii::app()->getBasePath() .'/../uploads' . $path;// folder for uploaded files
	        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');//array("jpg","jpeg","gif","exe","mov" and etc...
	        $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
	        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
	        $result = $uploader->handleUpload($folder);
			
			if ($result['success'] = true)
			{
				$meta = ContentMetadata::model()->findbyAttributes(array('content_id' => $id, 'key' => $result['filename']));
				if ($meta == NULL)
					$meta = new ContentMetadata;
				$meta->content_id = $id;
				$meta->key = $result['filename'];
				$meta->value = '/uploads' . $path . $result['filename'];
				$meta->save();
				$result['filepath'] = '/uploads/' . $result['filename'];
			}
	        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
 
        echo $return;
		}	
		Yii::app()->end();	
	}

  /**
     * Removes an image from a given post
     */
    public function actionRemoveImage()
    {
        $id     = Cii::get($_POST, 'id');
        $key    = Cii::get($_POST, 'key');
        
        // Only proceed if we have valid date
        if ($id == NULL || $key == NULL)
            throw new CHttpException(403, 'Insufficient data provided. Invalid request');
        
        $model = UserMetadata::model()->findByAttributes(array('user_id' => $id, 'key' => $key));
        if ($model === NULL)
            throw new CHttpException(403, 'Cannot delete attribute that does not exist');
        
        return $model->delete();
    }
    
    /**
     * Promotes an image to blog-image
     */
    public function actionPromoteImage()
    {
        $id          = Cii::get($_POST, 'id');
        $key         = Cii::get($_POST, 'key');
        $promotedKey = 'blog-image';
        // Only proceed if we have valid date
        if ($id == NULL || $key == NULL)
            return false;
        
        $model = UserMetadata::model()->findByAttributes(array('user_id' => $id, 'key' => $key));
        
        // If the current model is already blog-image, return true (consider it a successful promotion, even though we didn't do anything)
        if ($model->key == $promotedKey)
            return true;
        
        $model2 = UserMetadata::model()->findByAttributes(array('user_id' => $id, 'key' => $promotedKey));
        if ($model2 === NULL)
        {
            $model2 = new UserMetadata;
            $model2->user_id = $id;
            $model2->key = $promotedKey;
        }
        
        $model2->value = $model->value;
        
        if (!$model2->save())
            throw new CHttpException(403, 'Unable to promote image');
        
        return true;
    }	
}