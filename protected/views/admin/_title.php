<?php if(!empty($this->module_info)){
	if($_SESSION['ho']['orvos']>0){
	$R_URI= strtr($this->createAbsoluteUrl($this->uniqueid), array("index.php" => $_SESSION['ho']['orvos']));}
	else{$R_URI=$this->createAbsoluteUrl($this->uniqueid);}
	
	?>
<div class="container" >
	<div id="page_title">
		<h1>
			<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_large_module.png" />
			<a href="<?php echo $R_URI; ?>"><?php echo $this->module_info['title']; ?></a> 
			<?php if(!empty($this->module_info['item'])){ ?>/ <?php echo $this->module_info['item']; ?> <?php } ?>
		</h1>
	</div>
	<div id="title_right">
		<?php if(!empty($this->module_info['new'])){ ?>
			<a href="<?php echo $R_URI; ?>/create">
				Új <?php echo $this->module_info['new']; ?> hozzáadása <img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_large_add.png" />
			</a>
		<?php } ?>
	</div>
</div>
<?php } ?>