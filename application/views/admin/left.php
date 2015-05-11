<script>
  $(document).ready(function(){
	$(".changepwd").fancybox({
            'type' : 'iframe',
			'maxWidth':400,
			'maxHeight':330,
			'padding'		: 0,
			'margin':20,
			'autoScale'		: true,
			'autoDimensions' : false,
			'scrolling' : false,
			'closeBtn':true,
			'title':false,
			'iframe': {'scrolling': 'no'}
			});	
	
  });	
</script>	

<div id="content-left">
	<div id="menu">
		<ul class="list-menu">
			<?php
				foreach ($user_menu->result_array() as $row_user_menu){  	  			
			?>				
				<li class="showmenu">
					<a href="<?=$base?>/index.php/<?=$row_user_menu['cLink']?>" class="
					<?php
					if(strtoupper(str_replace(' ','',$var))==strtoupper(str_replace(' ','',$row_user_menu['cMenuItem']))){
						echo "active";
					}
					else
						echo "nonactive";
					?>"><?=$row_user_menu['cMenuItem']?></a>
				</li>
				<li class="border-menu">&nbsp;</li>			
			<?php
				}
			?>		
			<li class="showmenu"><a href="<?=$base?>/index.php/home/change_password" class="nonactive changepwd">Change Password</a></li>
		</ul>	
	</div>
</div>
