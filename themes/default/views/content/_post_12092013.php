<?php $meta = Content::model()->parseMeta($content->metadata); ?>
<div id="content-container"></div>
<div class="post">
	<?php if (Cii::get(Cii::get($meta, 'blog-image', array()), 'value', '') != ""): ?>
		<p style="text-align:center;"><?php echo CHtml::image(Yii::app()->baseUrl . $meta['blog-image']['value'], NULL, array('class'=>'image')); ?></p>

		
	<?php endif; ?>
	

	<div class="post-inner">
		<div class="post-header">
			<h3><?php /*echo CHtml::link($content->title, Yii::app()->createUrl($content->slug));*/echo "<br/>"; ?></h3>
			<?php $md = new CMarkdownParser; echo strip_tags($md->safeTransform($content->extract), '<h1><h2><h3><h4><h5><6h><p><b><strong><i>'); ?>
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
		<div class="comment-body">
		    			    <p><p><?php echo $val['comment']; ?><p></p>
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
</div>
