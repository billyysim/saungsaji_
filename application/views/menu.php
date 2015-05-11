<?php
	if($this->session->userdata('userType')<>''){		
?>

<!--
<div id="box-profiles">
	<div id="box-profile-arrow"><img src="<?=$base?>/img/arrow_small.png"></div>
	<div id="box-profile-form">
		<div id="box-profile-menu">	
			<ul id="link-profile-list">
				<?php
				foreach ($user_menu->result_array() as $row_user_menu){  	  			
				?>				
				<li><a href="<?=$base?>/index.php/<?=$row_user_menu['cLink']?>" class="link-profile-menu"><?=$row_user_menu['cMenuItem']?></a></li>				
				<?php
				}
				?>				
			</ul>
		</div>
	</div>
</div>

<script>
  $(document).ready(
  	function(){		
		$(".mnProfile").click(function() {
			if ($("#box-profiles").css('display') == 'block') {
				$("#box-profiles").css('display', 'none');
			}
			else {
				$(".mnProfile").css({'z-index':'10000'});
				$("#box-profiles").css({
					'left': '50%', 'top': '14%', 'top': '16.7%\9',
					'position':'absolute', 'display': 'block'});			
			}
		});		
   });			
</script>
-->
<?
	}
?>