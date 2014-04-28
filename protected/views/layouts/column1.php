<?php /* @var $this Controller */ ?>

<?php $url = $_SERVER['REQUEST_URI']; 
		$urlarray=explode("/",$url);
		$end=$urlarray[count($urlarray)-1];
		$light = substr($end, 0, 3);
?>		

<?php if($light!="box"){$this->beginContent('//layouts/main');} ?>
<div id="content">
	<?php echo $content; ?>
</div><!-- content -->
<?php if($light!="box"){$this->endContent();} ?>