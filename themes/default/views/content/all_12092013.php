
<div id="posts">
		<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'ask',
				'htmlOptions'=>array('class'=>'list_form'),
				'enableAjaxValidation'=>true,
				'enableClientValidation'=>false,
				'clientOptions'=>array('validateOnSubmit'=>true,),
)); 
$categories = Categories::model()->findAll();

$models = Categories::model()->findAll(
                 array('order' => 'name'));
 
// format models as $key=>$value with listData
$list = CHtml::listData($models, 
                'id', 'name');

?>
			<?php if (!Yii::app()->user->isGuest): ?>
				<div class="alert" id="warning" style="display:none">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Hey there!</strong> Before clicking Ask button, please type your question and select a category.
				</div>			
            <?php else: ?>
				<div class="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Hey there!</strong> Before posting a question, you must <?php echo CHtml::link('login', $this->createUrl('./site/login/')); ?> or <?php echo CHtml::link('signup', $this->createUrl('./site/register/')); ?>
				</div>
        	<?php endif; ?>

<textarea style="height:20px;width:485px" id="textbox"></textarea>        	
					<?php echo CHtml::dropDownList('categories', $category, 
              $list,
              array('empty' => 'Select a category'));
?>

			<a href="#" style="margin-bottom: 5px;" class="sharebox-submit btn btn-success" id="submit-comment">Ask</a>
		<?php $this->endWidget(); ?>
		<br/>
    <?php foreach($data as $content): ?>
    	<?php $this->renderPartial('//content/_post', array('content' => $content)); ?>
		
    <?php endforeach; ?>
</div>

<?php if (count($data)): ?>
	<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
	    'url'=>isset($url) ? $url : 'blog',
	    'contentSelector' => '#posts',
	    'pages' => $pages,
	    'defaultCallback' => "js:function(response, data) { 
	    	var url = response.options.path.join(response.options.state.currPage);

	    	// Try GA Tracking
	    	try {
			    _gaq.push(['_trackPageview', url]);
			} catch (e) {
				// Don't do anything if the tracking event failed
			}

			// Try Piwik Tracking
			try {
			    _paq.push(['trackPageView', url]);
			} catch (e) {
				// Don't do anything if the tracking event failed
			}			    
 		}"
	)); ?>
	<?php Yii::app()->clientScript->registerScript('unbind-infinite-scroll', "$(window).unbind('.infscr');"); ?>
<?php else: ?>
<div id="content-container"></div>
	<div class="alert alert-info">
		<strong>Woah!</strong> It looks like there isn't any posts in this category yet. Why don't you check out some of our other pages or check back later?
	</div>
<?php endif; ?>


<?php Yii::app()->clientScript->registerScript('ask-question', '
    $("#textbox").keydown( function() {
        if($("textarea#textbox").val() != "")
            $("#submit-comment").css("background","#3b9000");
        else
            $("#submit-comment").css("background","#9eca80");
        });
    
    $("#submit-comment").click(function(e) {
        e.preventDefault();
        if (($("textarea#textbox").val() == "")||($("#categories :selected").val() == "")){
			$("div#warning").fadeIn();
            return;
		}	
			alert("we are here");
			alert($("#categories :selected").val());

        $.post("/dwel1/content/content", 
        	{ 
        		"Content" : 
        		{ 
        			"content" : $("textarea#textbox").val(),
					"title" : $("#categories :selected").text(),
					"categories" : $("#categories :selected").val()
        		}
        	}, 
        	function(data) { 
			
        		$("#textbox").text("");  
        		$("#content-container").prepend(data);
        		$("div#content-container").children(":first").fadeIn();
        		$("#close").click();
        		/*$(".comment-count").text((parseInt($(".comment-count").text().replace(" Comment", "").replace(" Comments", "")) + 1) + " Comments");*/
        	}
        );
    });
')->registerScript('fetchContent', '
	$.post("' . $this->createUrl('/content/getContent/id/' . $content->id) . '", function(data) {

	});
');

$this->widget('ext.timeago.JTimeAgo', array(
    'selector' => ' .timeago',
));