<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="initial-scale=1.0">
	    <meta charset="UTF-8" />
		<?php
		 $baseUrl = Yii::app()->theme->baseUrl;		  
		?>		
		<link rel="shortcut icon" href="<?php echo $baseUrl;?>/assets/images/favicon.ico" type="image/x-icon">
	    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
	    <?php $asset=Yii::app()->assetManager->publish(YiiBase::getPathOfAlias('webroot.themes.default.assets')); ?>
	    <?php Yii::app()->clientScript->registerMetaTag('text/html; charset=UTF-8', 'Content-Type', 'Content-Type', array(), 'Content-Type')
                                      ->registerMetaTag($this->keywords, 'keywords', 'keywords', array(), 'keywords')
                                      ->registerMetaTag(strip_tags($this->params['data']['extract']), 'description', 'description', array(), 'description')
                                      ->registerCssFile($asset .'/css/main.css')
		                              ->registerCoreScript('jquery')
								      ->registerScriptFile($asset .'/js/script.js'); ?>

<?php									  
/*Yii::app()->clientScript->registerCssFile($asset.'/css/normalize.css');									  
Yii::app()->clientScript->registerCssFile($asset.'/css/foundation.css');		
Yii::app()->clientScript->registerCssFile($asset.'/css/main_dweling.css');		
Yii::app()->clientScript->registerCssFile($asset.'/css/form.css');		
Yii::app()->clientScript->registerCssFile($asset.'/css/colorbox.css');	*/	
?>
				  
									  
		<!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
<style type="text/css">
main .post .blog-meta{
padding-left:50px;
}
main .likes a {
background:none;
color:#000000;
font-weight:bold;
font-size:11px;
}
main .likes a:hover {
background:none;
color:#000000;
font-weight:bold;
font-size:11px;
}
main .likes.liked a, main .likes.liked a:hover {
background:none;
color:#000000;
font-weight:bold;
font-size:11px;

}
</style>		
	</head>
	<body>
    <header>
        <div class="row"></div>
        
        <!-- ***** header row ends here ********** -->   
    </header>	
<div class="container main-container"><div class="row-fluid main-body header-second"><div class="span8">
        	<a href="#" class="large-8 small-12 columns logo">
            	Jesuna
            </a>
			<div class="search-wrap">
                	<form>
                    <div class="row collapse">
                    	<div class="small-10 columns"><input type="text" placeholder="Search..."></div>
                        <div class="small-2 columns"><a class="button prefix search-btn" href="#">Search</a></div>
                    </div>
                    </form>
                </div>
        </div>
		<div class="span4">
            <div class="large-4 small-12 columns header_login">
            	<ul class="login-wrap clearfix">
                	<li class="login">
					<?php 
					if(!Yii::app()->user->isGuest){
					$this->widget('zii.widgets.CMenu',array(
					'items'=>array(
					array('label'=>'Logout ('.Yii::app()->user->displayName.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
					),
					));
					}
					
					
					if(Yii::app()->user->isGuest){
					?>

					<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/login" class="iframe">Login</a> |</li>
                    <li class="signup"><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/register" class="iframe">Signup</a></li><?php }?>
                </ul>
                <div class="clear"></div>
            
                
                <div class="search-wrap">
                	<form>
                    <div class="row collapse">
                    	<div class="small-10 columns"><input type="text" placeholder="Search..." /></div>
                        <div class="small-2 columns"><a href="#" class="button prefix search-btn">Search</a></div>
                    </div>
                    </form>
                </div>
                
            </div>
		</div>
            
        </div>
    </div>
	</main>

    <nav>
    	<div class="row">
		<main class="main"><div class="container main-container"><div class="row-fluid main-body"><div class="span12">
        	<div class="large-12 small-12 columns nav-bar">
		<?php $url = $_SERVER['REQUEST_URI']; 
		$urlarray=explode("/",$url);
		$end=$urlarray[count($urlarray)-1];
		if($end==''){$advice=array('class'=>'active');}else{$advice="";}
		if(($end=='buy')||($end=='post')){$buy=array('class'=>'active');}else{$buy="";}
		if($end=='events'){$events=array('class'=>'active');}else{$events="";}
		if($end=='about'){$about=array('class'=>'active');}else{$about="";}
		if($end=='contact'){$contact=array('class'=>'active');}else{$contact="";}
		if($end=='privacy'){$privacy=array('class'=>'active');}else{$privacy="";}
		if($end=='terms'){$terms=array('class'=>'active');}else{$terms="";}
		?>	
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Ask for Advice', 'url'=>Yii::app()->getBaseUrl(true),'linkOptions'=>$advice),
				
			),
		)); ?>				
            </div>
			</div>
			</div>
			</div>
			</main>
        </div>
    </nav>		
		<main class="main">

		   	<div class="container main-container content-part">
                <div class="row-fluid main-body">
                    <?php echo $content; ?>
                </div>
            </div>
		</main>
		
		<footer>
        	<div class="container main-container">
		    <div class="footer-top-block">
		        <div class="container"></div>
		    </div>
		    <div class="footer-main-block">
		        <div class="row-fluid">
		            <div class="inner-container">
                        
                       				
		                <!--<div class="span3">
                            <h5>Categories</h5>
                            <?php /*$this->widget('bootstrap.widgets.TbMenu', array(
                                'items' => $this->getCategories()
                            ));*/ ?>
                        </div>-->

                        <!--<div class="span3">
                            <h5>Search</h5>
                            <p>Looking for something on Dweling?</p>
                            <?php /*echo CHtml::beginForm($this->createUrl('/search'), 'get', array('id' => 'search'));*/ ?>
                                <div class="input-append">
                                    <?php /*echo CHtml::textField('q', Cii::get($_GET, 'q', ''), array('type' => 'text', 'style' => 'width: 75%', 'placeholder' => 'Search...'));*/ ?>
                                </div>
                            <?php /*echo CHtml::endForm();*/ ?>
                        </div>-->
		            </div>
		        </div>
		    </div>
            </div>
		    <div class="footer-bottom-block">
		        <div class="container">
                        <div class="pull-left">Copyright &copy JESUNA, All rights reserved</div>
                        <div class="pull-right cii-menu" ><?php echo CHtml::link('Contact',array('/site/contact')); ?> 
						
						<?php /*$this->widget('cii.widgets.CiiMenu', array('items' => $this->getCiiMenu(), 'htmlOptions' => array('class' => 'footer-nav','style'=>'width:100px;float:right')));*/ ?></div>
		        </div>
		    </div>
            
		</footer>
		
		<?php if (!YII_DEBUG):
			if (Cii::getConfig('piwikId') !== NULL):
				$this->widget('ext.analytics.EPiwikAnalyticsWidget', 
					array(
						'id' 		=> Cii::getConfig('piwikId'),
						'baseUrl' 	=> Cii::getConfig('piwikBaseUrl')
					)
				); 
			endif;
			
			if (Cii::getConfig('gaAccount') !== NULL):
				$this->widget('ext.analytics.EGoogleAnalyticsWidget', 
					array(
						'account'=>Cii::getConfig('gaAccount'), 
						'addThis'=>Cii::getConfig('gaAddThis'), 
						'addThisSocial'=>Cii::getConfig('gaAddThisSocial'),
					)
				);
			endif; 
		endif; ?>
	</body>
</html>
<script>
 /* document.write('<script src=' +
  ('__proto__' in {} ? '<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')*/
  </script>
  
  <script>
    /*$(document).foundation();*/
	/*$(".iframe").colorbox({iframe:true, width:"60%", height:"67%"});*/
  </script>
