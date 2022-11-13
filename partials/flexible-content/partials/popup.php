<?php
$popupcontent = get_sub_field('content');
$popupid = get_sub_field('id');
if($popupcontent && $popupid){
	$header = get_sub_field('header');
	$footer = get_sub_field('footer');
	
	if(!$header && !$footer){
		?>
		<div class="modal fade modal-content-only centered" id="<?php echo $popupid; ?>" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
			  <div class="modal-content">
			    <div class="modal-header">
			      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    </div>
			    <div class="modal-body">
				<div class="editor-content">
					<?php echo $popupcontent; ?>
				</div>
			    </div>
			  </div>
			</div>
		      </div>
		<?php
	}else {
		?>
		<div class="modal fade centered" id="<?php echo $popupid; ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php
			if($header){
			  ?>
			  <div class="editor-content">
				  <?php echo $popupcontent; ?>
			  </div>
			  <?php
			}
			?>
		    </div>
		    <div class="modal-body">
			<div class="editor-content">
				<?php echo $popupcontent; ?>
			</div>
		    </div>
		    <?php
			if($footer){
			  ?>
			<div class="modal-footer">
				<div class="editor-content">
					<?php echo $footer; ?>
				</div>
			</div>
			  
			  <?php
			}
			?>
		  </div>
		</div>
	      </div>
		<?php
	}
}
?>