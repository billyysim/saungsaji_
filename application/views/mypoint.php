	<div id="content">
		<div class="myprofile-title">My Point</div>
		<div class="padd-borderorange"></div>
		<ul class="tab-menu">
			<li class="active">Ballance</li>
			<li><a href="<?=$base?>/index.php/home/mypoint_t">Transaction</a></li>
		</ul>
		<div class="border-tab-menu paddmenus">
		<?php
		if ($user_redeem_point)
			$tr_poin=$user_redeem_point->iPoint;
		else
			$tr_poin=0;
		
		if ($user_point){
			$user_poin = $user_point->iPoint;
			$sign_up_poin = $user_point->iPoin;
		}
		else{
			$user_poin = 0;			
			$sign_up_poin = 0;
		}
			
		//if($sign_up_point)
		//	$sign_up_poin=$sign_up_point->iPoin;
		//else
		//	$sign_up_poin=0;
		?>
			<div class="mywallet-title">TOTAL POIN</div>
			<div class="mywallet-btn-balance"><?=number_format(ceil($user_poin/$point_trans->cChildCode)+$sign_up_poin-$tr_poin,0,",",".");?> poin</div>
			<div class="padd35">&nbsp;</div>
			<div class="mywallet-title">TUKAR POIN</div>
			<div style="color:red;margin-bottom:10px;"><?=$msg;?></div>
			<div class="checkbox-row">
			<?php
				foreach ($all_reward->result_array() as $row_all_reward){	
					$nama=explode("-",$row_all_reward['cNama']);
			?>						
				<div class="redeem-td">
					<div class="redeem-box">
						<div class="redeem-box-desc"><img src="<?=$base?>/img/point/<?=$row_all_reward['cImage']?>" width='188px' height='118px'></div>
							<div class="redeem-box-point"> <div class="bold">- <?=$row_all_reward['iPoin']?> poin -</div>
								<div style="padding-top:3px;font-size:12px;"><?=rtrim($nama[0])?></div>
								<div style="padding-top:3px;font-size:12px;"><?=ltrim($nama[1])?></div>
							</div>						
						</div>
					<div class="redeem-apply">
						<center><a href="<?=$base?>/index.php/home/redeem_point/<?=str_replace(' ','',$row_all_reward['cNama']);?>" class="popuppoint btn-style">Tukar poin</a></center>
					</div>
				</div>
			<?php
			}
			?>	
			</div>
		</div>
	</div>
</div>
