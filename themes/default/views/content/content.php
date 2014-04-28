   <?php 		$content = array(); 
		$pages = array();
		$itemCount = 0;
		$pageSize = Cii::getConfig('contentPaginationSize', 1);	
		
		$criteria=new CDbCriteria;
        $criteria->order = 'created DESC';
        $criteria->limit = 1;
		$criteria->addCondition("vid=(SELECT MAX(vid) FROM content WHERE id=t.id)")
		         ->addCondition('type_id >= 2')
		         ->addCondition('password = ""')
		         ->addCondition('status = 1');
		
		$itemCount = Content::model()->count($criteria);
		$pages=new CPagination($itemCount);
		$pages->pageSize=$pageSize;
		
		$criteria->offset = $criteria->limit*($pages->getCurrentPage());
		$data = Content::model()->findAll($criteria);
		//print_r($content);
		?>
		<?php foreach($data as $content): ?>
		<?php $this->renderPartial('//content/_post', array('content' => $content)); ?>

		<?php endforeach; ?>


		<?php $model = new Content(); ?>
		<?php $comment->parent_id = $comment->parent_id; ?>
		<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		    'id'=>'content-form',
		    'htmlOptions' => array('class' => 'comment-form')
		)); ?>
			<div id="sharebox-<?php echo $content->id; ?>" class="comment-box">
                <div id="a-<?php echo $content->id; ?>">
                    <div id="textbox-<?php echo $content->id; ?>" contenteditable="true"></div>
                    <div id="close-<?php echo $content->id; ?>"></div>
                    <div style="clearfix"></div>
                </div>
                <div id="b-<?php echo $content->id; ?>" style="color:#999">Comment on this post</div> 
            </div>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'success',
                'label' => 'Submit',
                'url' => '#',
                'htmlOptions' => array(
                    'id' => 'submit-content-' . $content->id,
                    'class' => 'sharebox-submit',
            ))); ?>
		<?php $this->endWidget(); ?>
	<div class="clearfix"></div>

<script type="text/javascript">
	$(document).ready(function() {
		// Timeago
		$(".timeago").timeago();

		// Comment Form
		$("#b-<?php echo $comment->id; ?>").click( function () {
	        $(this).html("");
	        $("#a-<?php echo $comment->id; ?>").slideDown("fast");
	        $("#submit-comment-<?php echo $comment->id; ?>").show();
	        setTimeout(function() {
	            $("#textbox-<?php echo $comment->id; ?>").focus();
	        }, 100);
	    });
	    $("#textbox-<?php echo $comment->id; ?>").keydown( function() {
	        if($(this).text() != "")
	            $("#submit-comment-<?php echo $comment->id; ?>").css("background","#3b9000");
	        else
	            $("#submit-comment-<?php echo $comment->id; ?>").css("background","#9eca80");
	        });
	    $("#close-<?php echo $comment->id; ?>").click( function () {
	        $("#b-<?php echo $comment->id; ?>").html("Comment on this post");
	        $("#textbox-<?php echo $comment->id; ?>").html("");
	        $("#a-<?php echo $comment->id; ?>").slideUp("fast");
	        $("#submit-comment-<?php echo $comment->id; ?>").hide();
	    });

	    // Submit
	    $("#submit-comment-<?php echo $comment->id; ?>").click(function(e) {
	    	var elementId = $(this).attr('id').replace('submit-comment-', '');
        	e.preventDefault();
	        if ($("#textbox-<?php echo $comment->id; ?>").text() == "")
	            return;

	        $.post("/comment/comment", 
	        	{ 
	        		"Comments" : 
	        		{ 
	        			"comment" : $("#textbox-<?php echo $comment->id; ?>").text(), 
	        			"content_id" : $(".content").attr("data-attr-id"),
	        			"parent_id" : elementId
	        		}
	        	}, 
	        	function(data, textStatus, jqXHR) { 
	        		$("#textbox-<?php echo $comment->id; ?>").text("");  
	        		// PREPEND DATA
	        		var newElementId = jqXHR.getResponseHeader("X-Attribute-Id");
	        		$(".comment-" + elementId).append(data);
	        		$(".comment-" + newElementId).fadeIn();

	        		$("#close-<?php echo $comment->id; ?>").click();
	        		$(".comment-count").text((parseInt($(".comment-count").text().replace(" Comment", "").replace(" Comments", "")) + 1) + " Comments");
	        	}
	        );
	    });
	});
</script>