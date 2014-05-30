<?php 

return array(
        'name' => 'jesuna',
        'components' => array(
            'db' => array(
                'class' => 'CDbConnection',
                'connectionString' => 'mysql:host=localhost;dbname=jesunaco_jesuna',
                'emulatePrepare' => true,
                'username' => 'jesunaco_jesuna',
                'password' => 'Jesuna@2014',
                'charset' => 'utf8',
                'schemaCachingDuration' => '3600',
                'enableProfiling' => true,
            ),
            'cache' => array(
                'class' => 'CFileCache',
            ),
        ),
'modules' => array(
			'hybridauth' => array(
            'baseUrl' => 'http://'. $_SERVER['SERVER_NAME'] . '/hybridauth', 
            'withYiiUser' => true, // Set to true if using yii-user
        ),
		
	
		),		
        'params' => array(
            'yiiPath' => '/home/jesunaco/public_html/framework/',
            'encryptionKey' => '6caa403d304708527a5875f117ff4bd3cdcc7e5e671760752c07d7c9eeaa0589b1a2a39098a5241e6f72f38a3cb06eef443dbea099864bd541ff0559',
        )
    );
	
	

