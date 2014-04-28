<?php Yii::import('ext.redactor.*'); ?>
<div class="login-container">
	<div class="sidebar" >
		<div class="well-span span10">
			<h4>Update Your Profile</h4>
			<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'profile-form',
			)); ?>
			<?php echo $form->errorSummary($model); ?>
			    
			<?php echo $form->textFieldRow($model,'email',array('class'=>'span12','maxlength'=>255)); ?>        
			<?php echo $form->passwordFieldRow($model,'password',array('value'=>'', 'class'=>'span12','maxlength'=>64, 'placeholder' => 'Set a password for the user here. Leave blank to keep existing password.')); ?>    
			<?php echo $form->textFieldRow($model,'displayName',array('class'=>'span12','maxlength'=>255)); ?>    
			<?php echo $form->textFieldRow($model,'firstName',array('class'=>'span12','maxlength'=>255)); ?>        
			<?php echo $form->textFieldRow($model,'lastName',array('class'=>'span12','maxlength'=>255)); ?>
			<?php echo $form->textAreaRow($model, 'about', array('class' => 'span12')); ?>
			<br/><br/>
			<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
                    'title' => 'Uploads',
                    'headerIcon' => 'icon-upload',
                    'htmlOptions' => array(
						'class' => 'contentSidebar'
					)
                )); 
				//$path = '/';
				//$folder=Yii::app()->getBasePath() .'/../uploads' . $path;
				//echo $folder;
				?>
                <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
								array(
								        'id'=>'uploadFile',
								        'config'=>array(
								           'debug'=>false,
							               'action'=>Yii::app()->createUrl('/profile/badges/id/'. $model->id),
							               'allowedExtensions'=>array('jpg', 'jpeg', 'png', 'gif', 'bmp'),
							               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
							               'minSizeLimit'=>1,
							               'template'=>'<div id="uploadFile"><ul class="qq-upload-list" style="display:none;">
							               </ul><div class="qq-upload-drop-area" style="display:none;"></div><a class="btn btn-small btn-primary qq-upload-button right" >Upload</a>
							               </div>',	
							               'onComplete' => "js:function(id, fileName, response) {
							               		if (response.success)
							               		{
							               			$('#new-attachment').before('<span class=\"thumb-container thumb-center\"><span class=\"thumb-inner\"><span class=\"thumb-img\"><img class=\"thumb\" href=\"/'+ response.filepath +'\" src=\"/'+ response.filepath +'\" style=\"left: 0px; top: 0px;\"></span><span class=\"thumb-strip\"></span><span class=\"thumb-icon\"></span></span></span>').after('<li id=\"new-attachment\" style=\"display:none;\">');
							               			$('.thumb').thumbs();
													$('.thumb').colorbox({rel:'thumb'});
													$('#new-attachment-img').show().attr('id', 'thumb');
							               		}
										   }"
								        )
								)); ?></h5>
					   	<div style="clear:both;"></div>
						<div class="image-holder ">
							<?php foreach ($attachments as $attachment): ?>
							    <div class="image-ctrl" id="<?php echo $attachment->key; ?>">
    								<?php echo CHtml::image("/uploads/".$attachment->value, NULL, array('class'=> 'thumb', 'href' => "/uploads/".$attachment->value, 'title' => "/uploads/".$attachment->value)); ?>
                                    <span class="delete-button icon icon-remove" id="<?php echo $attachment->key; ?>"></span>
                                     <span class="star-button icon icon-star-empty" id="<?php echo $attachment->key; ?>"></span>
                                </div>
							<?php endforeach; ?>
							
							<li id="new-attachment" style="display:none;"></li>
							<br/><br/>
							Click on the star to display a image
						</div>
					<div class="clearfix"></div>
		         <?php $this->endWidget(); ?>			
			<?php $this->widget('bootstrap.widgets.TbButton', array(
								'buttonType' => 'submit',
	    	                    'type' => 'success',
	    	                    'label' => 'Submit',
	    	                    'htmlOptions' => array(
	    	                        'id' => 'submit-comment',
	    	                        'class' => 'sharebox-submit pull-right',
	    	                        'style' => 'margin-top: -4px'
	    	                    )
	    	                )); ?>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>

<?php $asset="/assets/5811ee0d"; ?>


<?php Yii::app()->clientScript->registerCssFile($asset . '/css/jquery.tags.css'); ?>
<?php Yii::app()->clientScript->registerCssFile($asset . '/css/colorbox.css'); ?>
<?php Yii::app()->clientScript->registerCssFile($asset . '/css/jquery.thumbs.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.tags.min.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.thumbs.min.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.colorbox.min.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.gridster.js'); ?>
<?php Yii::app()->clientScript->registerScript('admin_promoted_image', 'setTimeout(function() { $("img.thumb").css("left", 0).css("right", 0).css("top", 0); $("#blog-image").find(".star-button").removeClass("icon-star-empty").addClass("icon-star"); $("#blog-image").find(".thumb-container").addClass("transition"); }, 500);'); ?>
	<?php Yii::app()->clientScript->registerScript('admin_thumbs', '$(".thumb").thumbs();'); ?>
	<?php Yii::app()->clientScript->registerScript('admin_colorbox', '$(".thumb").colorbox({rel:"thumb"});'); ?>
	<?php Yii::app()->clientScript->registerScript('admin_promote', '$(".star-button").click(function() { 
		var id = $(this).attr("id");
		$.post("../../profile/promoteImage/id/'.$model->id.'", { id : ' . $model->id . ', key : id }, function() {
	        $(".image-ctrl").find(".thumb-container").css("border-color", "").removeClass("transition");
	        $("div[id*=\'" + id + "\']").find(".thumb-container").addClass("transition");
	        $(".star-button").addClass("icon-star-empty").removeClass("icon-star");
	        $("div[id*=\'" + id + "\']").find(".star-button").removeClass("icon-star-empty").addClass("icon-star");
	    });
	});'); ?>
	<?php Yii::app()->clientScript->registerScript('admin_delete', '$(".delete-button").click(function() {
	    var element = $(this);
	    $.post("../../profile/removeImage/id/'.$model->id.'", { id : ' . $model->id . ', key : $(this).attr("id") }, function () {
	        element.parent().fadeOut();
	    });
	})'); ?>
	
	<link rel="stylesheet" type="text/css" href="../assets/style-fa69c3ff.css" />
<style>
	main .login-container { width: 80%; }
	main .main-body { margin-left: 80px; }
	#cboxMiddleLeft{background:none}
	#cboxMiddleRight{background:none}
	#cboxTopCenter{background:none}
	#cboxBottomCenter{background:none}
	#cboxPrevious{display:block !important}
	#cboxNext{display:block !important;right:0px;left:none;}
	#cboxNext{left:none}
	
.sidebar {background:none}
	
</style>