<script type="text/javascript">
function testClick(idVal){
	//alert('test click');
	//alert(idVal);
	var id = idVal.split("-");		
	var url = "/comment/like/id/"+id[2];
	var idData = id[2];
	//alert(idData);

	$.post("/comment/like/id/"+idData, function(data, textStatus, jqXHR) {
	//alert(data.status);
		if (data.status == undefined)
			window.location = "<?php echo $this->createUrl('/login'); ?>"

		if (data.status == "success")
		{
			var count = parseInt($("#"+idVal).text());
			
			
			if (data.type == "inc"){
				var j = $("#"+idVal);
				var n = parseInt(j.text(), 10);
				j.text(n + 1);			
				//$("#"+idVal).text(count + 1).parent().parent().parent().addClass("liked");
				}
			else{
				var j = $("#"+idVal);
				var n = parseInt(j.text(), 10);
				j.text(n - 1);
				//$("#"+idVal).text(count - 1).parent().parent().parent().removeClass("liked");
				}
		}
	});
	//break;
	return false;					
}

function dislike(idVal){
	//alert('test click');
	//alert(idVal);
	var id = idVal.split("-");		
	var url = "/comment/dislike/id/"+id[2];
	var idData = id[2];
	//alert(idData);

	$.post("/comment/dislike/id/"+idData, function(data, textStatus, jqXHR) {
	//alert(data.status);
		if (data.status == undefined)
			window.location = "<?php echo $this->createUrl('/login'); ?>"

		if (data.status == "success")
		{
			var count = parseInt($("#"+idVal).text());
			if (data.type == "inc"){
			var j = $("#"+idVal);
			var n = parseInt(j.text(), 10);
			j.text(n + 1);
			//$("#"+idVal).text(count + 1).parent().parent().parent().addClass("liked");
				}
			else{
			var j = $("#"+idVal);
			var n = parseInt(j.text(), 10);
			j.text(n - 1);
				//$("#"+idVal).text(count - 1).parent().parent().parent().removeClass("liked");
				}
		}
	});
	//break;
	return false;					
}
</script>

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
				<div class="alert" style="display:none">
					<button type="button" class="close" >&times;</button>
					<strong>Hey there!</strong> Before clicking Ask button, please type your question and select a category.
				</div>	
            <?php else: ?>
			<div class="alert" style="display:none">
								<button type="button" class="close">&times;</button>
								<strong>Hey there!</strong> Before posting a question, you must <?php echo CHtml::link('login', $this->createUrl('./site/login/')); ?> or <?php echo CHtml::link('signup', $this->createUrl('./site/register/')); ?>
			</div>

        	<?php endif; ?>
<label class="advice-label">Tell your problem?</label>
<textarea style="height:20px;width:60%" id="textbox"></textarea>        	
					<?php echo CHtml::dropDownList('categories', $categories,
              $list,
              array('empty' => 'Select a category'));
?>

			<a href="#" class="btn btn-ask" id="submit-comment">Ask</a>
		<?php $this->endWidget(); ?>
		<br/>

<div id="posts">
<?php foreach($data as $content): ?>

<?php 
if($content->content!=""){?>
    <div class="post">
<?php 
$this->renderPartial('//content/_post', array('content' => $content)); ?>
    </div>
<?php } ?>
	
<?php  endforeach; ?>
</div>
<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'contentSelector' => '#posts',
    /*'itemSelector' => '#posts div.post',*/
    'loadingText' => 'Loading...',
    'donetext' => 'This is the end of jesuna questions..',
    'pages' => $pages,
)); ?>

</div>
       


<?php Yii::app()->clientScript->registerScript('ask-question', '
    $("#textbox").keydown( function() {
        if($("textarea#textbox").val() != "")
            $("#submit-comment").css("background","#3b9000");
        else
            $("#submit-comment").css("background","#9eca80");
        });
    
	$(".close").click(function(){
		$(".alert").hide();	
	});			
    
    $("#submit-comment").click(function(e) {
	$(".alert").toggle(500);
        e.preventDefault();
        if (($("textarea#textbox").val() == "")||($("#categories :selected").val() == "")){
			$("div#warning").fadeIn();
            return;
		}	
			//alert($("#categories :selected").val());

        $.post("/content/content", 
        	{ 
        		"Content" : 
        		{ 
        			"content" : $("textarea#textbox").val(),
					"title" : $("#categories :selected").text(),
					"categories" : $("#categories :selected").val()
        		}
        	}, 
        	function(data) { 
			
        		$("textarea#textbox").val("");   
        		$("#content-container").prepend(data);
        		$("div#content-container").children(":first").fadeIn();
        		$("#close").click();
        		/*$(".comment-count").text((parseInt($(".comment-count").text().replace(" Comment", "").replace(" Comments", "")) + 1) + " Comments");*/
        	}
        );
    });
')->registerScript('likeButton', '
	$("[id ^=\'upvote\']").click(function(e) {
		/*e.preventDefault();
		var idVal = $(this).find("span").find("span").attr("id");
		var id = idVal.split("-");		
		var url = "/comment/like/id/"+id[2];

		$.post("/comment/like/id/"+id[2], function(data, textStatus, jqXHR) {
			if (data.status == undefined)
				window.location = "' . $this->createUrl('/login') . '"

			if (data.status == "success")
			{
				var count = parseInt($("#"+idVal).text());
				
				if (data.type == "inc"){
					$("#"+idVal).text(count + 1).parent().parent().parent().addClass("liked");
					}
				else{
					$("#"+idVal).text(count - 1).parent().parent().parent().removeClass("liked");
					}
			}
		});
		return false;*/
	});
')->registerScript('fetchContent', '
	$.post("' . $this->createUrl('/content/getContent/id/' . $content->id) . '", function(data) {
	//alert(data);

	});
');

$this->widget('ext.timeago.JTimeAgo', array(
    'selector' => ' .timeago',
));