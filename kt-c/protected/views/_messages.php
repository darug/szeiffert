<script>
	$(document).ready(function(){
		$("#message").hide().fadeIn();
		$('.message_sima, .message_siker, .message_hiba').click(function(){ $(this).fadeOut(); });
		setTimeout(function(){ $("#message").fadeOut(); }, 8000);
	});
</script>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div id="message">
	<div class="message_siker"><span class="msg_close"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/msg_close.png" /></span><?php echo Yii::app()->user->getFlash('success'); ?></div>
	</div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('error')):?>
    <div id="message">
	<div class="message_hiba"><span class="msg_close"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/msg_close.png" /></span><?php echo Yii::app()->user->getFlash('error'); ?></div>
	</div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('notice')):?>
    <div id="message">
	<div class="message_sima"><span class="msg_close"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/msg_close.png" /></span><?php echo Yii::app()->user->getFlash('notice'); ?></div>
	</div>
<?php endif; ?>