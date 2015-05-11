<script>
  $(document).ready(function(){
		$(".detail_order").fancybox({
				'type' : 'iframe',
				'maxWidth':600,
				'maxHeight':600,
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
	function change_status(status, id){
	   $.ajax({
		   type: "POST",
		   url: "<?=$base?>/index.php/a/home/change_status",
		   data: "orderid="+id+"&status="+status,
		   success: function(html){
			 $("#msg_area").empty();
			 $("#msg_area").append(html);
		   }
		});
	}
  
  
  
</script>	
<div id="content-right">
	<h2>Recent Order</h2> <span id="msg_area" style="font-weight:bold;color:red;margin-bottom:100px;"></span> 
	<table>
		<tr>
			<th>No</th>
			<th>No Invoice</th>
			<th>Tgl Order</th>
			<th>Customer</th>
			<th>Restoran</th>
			<th>Total (Rp)</th>
			<th>Status</th>
			<th class="actions"></th>
		</tr>
		<?php
		if($order->num_rows()>0){			
			$no=0;
			foreach ($order->result_array() as $row_order){  	  			
				$no++;
				$total=0;
				foreach ($order_details->result_array() as $row_order_details){
					if($row_order['id']==$row_order_details['idOrders']){
						if($row_order_details['iDiskon']>0)
							$diskon=$row_order_details['iDiskon']/100;
						else
							$diskon=1;
						
						$total=$total + ($row_order_details['iJumlah']*$row_order_details['iHarga']*$diskon);
					}
				}
				if($row_order['iTotal'] + $total>0)
					$total_payment = $row_order['iTotal'] + $total;
				else
					$total_payment = 0;					
		?>		
		<tr>
			<td><?=$no;?></td>
			<td>#<?=$row_order['id'];?>-<?=date('Ymd',strtotime($row_order['dTglOrder']))?></td>
			<td><?=date('d-m-Y',strtotime($row_order['dTglOrder']))?></td>
			<td>
				<?php
				if ($row_order['cNamaCust']=="")
					echo $row_order['cNamaOneCust'];
				else
					echo $row_order['cNamaCust'];
				?>
			</td>
			<td><?=$row_order['cNama']?></td>
			<td style="text-align:right;"><?=number_format($total_payment,0,",",".");?></td>
			<td style="text-align:center;"><div class="option-menu">
				<select class="options-list-admin" id="optionsmenu1" onchange="change_status(this.value, '<?=$row_order['id']?>')">
					<option value="1"
					<?php
					if($row_order['iStatusAntar'] == 1)
						echo "selected";
					?>>On Progress</option>
					<option value="2">Delivered</option>
					<option value="3">Canceled</option>
				</select>
			</div></td>
			<td class="actions">
			<a href="<?=$base?>/index.php/a/home/detail_order/<?=$row_order['id']?>" >detail</a>
			</td>
		</tr>		
		<?php
			}
		}
		?>		
	</table>				
</div>