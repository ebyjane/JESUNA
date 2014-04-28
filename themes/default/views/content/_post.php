<?php 
//echo "content value = ".$content->content;
$meta = Content::model()->parseMeta($content->metadata); ?>

<div id="content-container"></div>

	<?php if (Cii::get(Cii::get($meta, 'blog-image', array()), 'value', '') != ""): ?>
		<p style="text-align:center;"><?php echo CHtml::image(Yii::app()->baseUrl . $meta['blog-image']['value'], NULL, array('class'=>'image')); ?></p>

		
	<?php endif; ?>

	

	<div class="post-inner" >
	<div style="float:left;width:50px;position:relative">
	
	<?php //echo $content->author->id; 
							$model  = Users::model();
							$id = $content->author->id;
							$key = "blog-image";
							$image_data = UserMetadata::model()->findByAttributes(array('user_id' => $id, 'key' => $key));
							$userDetails = Users::model()->findByAttributes(array('id' => $id));
							//echo count($image_data);
							if(count($image_data)>0){
								echo CHtml::link(CHtml::image("/uploads/".$image_data->value, NULL, array('class'=> 'thumb', 'style' => 'width:30px',  'href' => "/uploads/".$image_data->value, 'title' => $userDetails->displayName)), $this->createUrl("/profile/{$content->author->id}/"));
							}else{
								echo CHtml::link(CHtml::image("/uploads/images.jpg", NULL, array('class'=> 'thumb', 'style' => 'width:30px',  'href' => "/uploads/images.jpg", 'title' => $userDetails->displayName)), $this->createUrl("/profile/{$content->author->id}/"));
							}	
	
	?>
	</div>	
	<div class="post-header">


			<a href="<?php echo $this->createUrl('/' . $content->slug); ?>" rel="bookmark">	
			<?php $md = new CMarkdownParser; echo strip_tags($md->safeTransform($content->extract), '<h1><h2><h3><h4><h5><6h><p><b><strong><i>'); ?>
			</a>
		</div>
		
		<div class="blog-meta">
			<span class="date"><?php echo $content->getCreatedFormatted() ?></span>
			<span class="separator">⋅</span>
			<span class="blog-author minor-meta"><strong>by </strong>
				<span>
					<?php echo CHtml::link(CHtml::encode($content->author->displayName), $this->createUrl("/profile/{$content->author->id}/")); ?>
				</span>
				<span class="separator">⋅</span> 
			</span> 
			<span class="minor-meta-wrap">
				<span class="blog-categories minor-meta"><strong>in </strong>
				<span>
					<?php echo CHtml::link(CHtml::encode($content->category->name), Yii::app()->createUrl($content->category->slug)); ?>
				</span> 
				<span class="separator">⋅</span> 
			</span> 					
			<span class="comment-container">
				<?php echo $content->getCommentCount(); ?> Comments</a>					
			</span>
			<span class="separator">⋅</span> 
			<span class="comment-container">
<span class="likes-container" style="position:absolute;top:-4px;padding-left:120px">

<!-- Like and Dislike code comes here -->
					
				</span>				
			</span>
			
						<?php 
						$comments = Comments::model()->findAllByAttributes(array('content_id' => $content->id));
						
						if(count($comments)>0){
						
						
						$criteria=new CDbCriteria;
						$criteria->order = 'created DESC';
						$criteria->limit = 2;
						$criteria->addCondition('content_id ='.$content->id)
								 ->addCondition('approved = 1');

						$itemCount = Comments::model()->count($criteria);
						$pages=new CPagination($itemCount);
						$pages->pageSize=$pageSize;

						$criteria->offset = $criteria->limit*($pages->getCurrentPage());
						$comments = Comments::model()->findAll($criteria);
						
						/*$comments = Comments::model()->findAllByAttributes(array('content_id' => $content->id));*/
						
		//print_r($comments);
		foreach($comments as $k=>$val){
		?>
			<div class="green-indicator author-indicator">
	<div style="float:left;width:50px;position:relative">
	
	<?php //echo $content->author->id; 
							$model  = Users::model();
							$id = $val['user_id'];
							$key = "blog-image";
							$image_data = UserMetadata::model()->findByAttributes(array('user_id' => $id, 'key' => $key));
							//echo count($image_data);
							$userDetails = Users::model()->findByAttributes(array('id' => $id));
							
							if(count($image_data)>0){
								echo CHtml::link(CHtml::image("/uploads/".$image_data->value, NULL, array('class'=> 'thumb', 'style' => 'width:30px',  'href' => "/uploads/".$image_data->value, 'title' => $userDetails->displayName)), $this->createUrl("/profile/{$id}/"));
							}else{
								echo CHtml::link(CHtml::image("/uploads/images.jpg", NULL, array('class'=> 'thumb', 'style' => 'width:30px',  'href' => "/uploads/images.jpg", 'title' => $userDetails->displayName)), $this->createUrl("/profile/{$id}/"));
							}	
	
	?>
	</div>				
		<div class="comment-body">
		    			    <p style="padding-bottom:5px">
								<?php if ($val['id'] != 0): ?>
												<span class="icon-share-alt"></span> <?php echo CHtml::encode($userDetails->displayName); ?>•
								<?php endif; ?>
								<time class="timeago" datetime="<?php echo date(DATE_ISO8601, strtotime($val['created'])); ?>">
									<?php echo Cii::formatDate($val['created']); ?>
								</time><br/>
							
							<?php echo $val['comment']; ?><br/><br/></p>
								
					<span class="likes-container" style="position:absolute;padding-left:150px">		
					<div style="float:left;position:absolute;right:0px" class="likes <?php echo Yii::app()->user->isGuest ?: (Users::model()->findByPk(Yii::app()->user->id)->likesPost($content->id) ? 'liked' : NULL); ?>">     
					    <div  style="position:absolute;right:60px;width:50px;top:-40px">
						<a  onclick=testClick("like-count-<?php echo $val['id']; ?>"); style="cursor:pointer"   id="upvote" title="Like this post and discussion">
							<span class="icon-thumbs-up icon-yellow"></span>
							<span class="counter">
					            <span style="font-family:arial;font-size:12px;font-weight:normal;color:#000000;background:none" id="like-count-<?php echo $val['id']; ?>">&nbsp;&nbsp;<?php echo $val['like_count']; ?> 
								</span>
					        </span> 	    	
					             
					    </a>&nbsp;&nbsp;
						</div>
						
						<div style="position:absolute;right:0px;width:50px;top:-40px">
						 <a  onclick=dislike("dislike-count-<?php echo $val['id']; ?>"); style="cursor:pointer"   id="upvote" title="Dislike this post and discussion">
							<span class="icon-thumbs-down icon-red"></span>
							<span class="counter">
					            <span style="font-family:arial;font-size:12px;font-weight:normal;color:#000000" id="dislike-count-<?php echo $val['id']; ?>"><?php echo $val['dislike_count']; ?></span>
					        </span> 
					    	
					             
					    </a>
						</div>
						
											
					</div>	
					</span>
					
		</div>
	</div>		
<?php
		}
		}
		?>
				<h3 class="comment-count pull-left left-header"></h3>

		</div>

		<a class="read-more-icon" href="<?php echo $this->createUrl('/' . $content->slug); ?>" rel="bookmark">
			<strong style="width: 93px;">Read more</strong>
			<span></span>
		</a>
		
	</div>

    <div style="clear:both;"><br /></div>



