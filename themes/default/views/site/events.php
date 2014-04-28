<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Events';
$this->breadcrumbs=array(
	'Events',
);
?>

	<div class="span8">
    	<div class="large-8 small-12 columns content-wrap">
        	<div class="content-part advice-wrap">
        		<form>
                      <label>Events</label>

                </form>
            </div>
	</div>
	</div>
	<div class="span4 sidebar hidden-phone">
		<div class="well">
			<h4>Search</h4>
			<?php echo CHtml::beginForm($this->createUrl('/search'), 'get', array('id' => 'search')); ?>
                <div class="input-append">
                    <?php echo CHtml::textField('q', Cii::get($_GET, 'q', ''), array('type' => 'text', 'style' => 'width: 97%', 'placeholder' => 'Type to search, then press enter')); ?>
                </div>
            <?php echo CHtml::endForm(); ?>
		</div>
        <div class="large-4 small-12 columns sidebar-wrap">
        	<div class="sidebar">
            	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/add1.jpg" style="margin-bottom:15px" />
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/add2.jpg" style="margin-bottom:15px" />
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/add3.jpg" style="margin-bottom:15px" />
            </div>
        </div>		
		
		
	</div>
