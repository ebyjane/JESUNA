<?php 
return array(
        'name' => 'dweling',
        'components' => array(
            'db' => array(
                'class' => 'CDbConnection',
                'connectionString' => 'mysql:host=localhost;dbname=godweiff_dweling',
                'emulatePrepare' => true,
                'username' => 'godweiff_chethan',
                'password' => 'chethan',
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
            "providers" => array ( 
               /* "openid" => array (
                    "enabled" => true
                ),
 
                "yahoo" => array ( 
                    "enabled" => true 
                ),*/
 
 
                "facebook" => array ( 
                    "enabled" => true,
                    "keys"    => array ( "id" => "1495817940645323", "secret" => "e61965b417dabd9d93466090a27fc72c" ),
                    "scope"   => "email,publish_stream", 
                    "display" => "" 
                ),
 
                "twitter" => array ( 
                    "enabled" => true,
                    "keys"    => array ( "key" => "", "secret" => "" ),
                ),
				
                "google" => array ( 
                    "enabled" => true,
                    "keys"    => array ( "id" => "", "secret" => "" ),
                    "scope"   => ""
                ),				
            )
        ),
		
	
		),		
        'params' => array(
            'yiiPath' => '/home/godweiff/public_html/framework/',
            'encryptionKey' => '6caa403d304708527a5875f117ff4bd3cdcc7e5e671760752c07d7c9eeaa0589b1a2a39098a5241e6f72f38a3cb06eef443dbea099864bd541ff0559',
        )
    );