function sumtotal(){
	var tax = 0;//getNum($("#tax").val());
	var delivery = 0;
	var total=0;
	var subtotal=0;
	var i=0;
	
	if(document.order.delivery){
		delivery = getNum($("#delivery").val());
	}
		
	$('input[id^="total"]').each(
		function(){
				subtotal=subtotal+getNum($('input[id^="total"]').eq(i).val());
				i++;
			}
		);	
		//alert(subtotal);
	tax = 0.1*subtotal;	
	total = tax+delivery+subtotal;	
	totalnotax = delivery+subtotal;	
	$("#subtotal").val(currency_format2(subtotal));
	$("#tax").val(currency_format2(tax));
	$("#ttotal").val(currency_format2(total));	
	$("#ttotalnotax").val(currency_format2(totalnotax));	
	
	var minorder = parseInt(document.getElementById('min_order').innerHTML);//;
	var remain = minorder-subtotal;
	if(remain>0){
		$("#remain").val(currency_format2(remain));
	}	
	if(subtotal>=minorder){	
		$('#btncheckout').attr('disabled', false);			
	}
	else{
		$('#btncheckout').attr('disabled', true);			
	}		
}

function check_status_del(){	
	if($("input:radio[name='del_option']:checked").val()=='1'){ 
		print('test');
		alert("it's checked"); 
	}
	/*
	if(a=='del_option1'){
		if(cDeliStatus=='N' || (cDeliStatus=='Y' && getNum($("#remain").val())>0)){
			$("#delivery").val(currency_format2(del_charge)); 
		}
		else if(cDeliStatus=='Y' && getNum($("#remain").val())==0){
			$("#delivery").val('0');
		}
	}*/
}

function check_min_order(){
	var subtotal = getNum($("#subtotal").val());
	var minorder = parseInt(document.getElementById('min_order').innerHTML);//;
	var remain = minorder-subtotal;
	if(remain>0){
		$("#remain").val(currency_format2(remain));
	}
}

function delete_row(id, del_charge, cDeliStatus){	
	/*
	jQuery.ajax({
		type: "POST",
		url: "<?=$base?>/index.php/home/delete_order",
		data: "id="+id,
		success: function(html){							
			alert(html); 	
		}
	});
	*/
	$("#row"+id).remove();
	sumtotal();
	if($("input:radio[name='del_option']:checked").val()==1){ 		
		if(cDeliStatus=='N' || (cDeliStatus=='Y' && getNum($("#remain").val())>0)){
			$("#delivery").val(currency_format2(del_charge)); 
		}
		else if(cDeliStatus=='Y' && getNum($("#remain").val())==0){
			$("#delivery").val('0');
		}
		alert("it's in"); 
	}	
	sumtotal();
}

function showdetail(row){	
	if($("#detail"+row).css('display') == 'block'){
		$("#detail"+row).css('display','none');
	}else{
		$("#detail"+row).css('display','block');
	}		
}

function getNum(num){ 
	while (num != (num = num.replace(".", '')));
	return Number(num);
}

function currency_format2(num, point, dec) {
	var point= point || '.';
	var dec= dec || ',';
	
	//num = getNumberFrRp(num.toString().replace(/\$|rp|Rp|RP|rP/g,''));
	if(isNaN(num)) num = "0";
	if (dec=='.') num = num.toString().replace(/\,/g,'');
	else {
		if (isNaN(num)) {
			num = num.toString().replace(/\./g,'');
			num = num.toString().replace(/\,/g,'.');
		}
	}
	
	sign = (num == (num = Math.abs(num)));
	num = Math.floor(num*100+0.50000000001);
	cents = num%100;
	num = Math.floor(num/100).toString();
	if(cents<10) cents = "0" + cents;
	for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++) {
		num = num.substring(0,num.length-(4*i+3))+point+ num.substring(num.length-(4*i+3));
	}
	 
	return num;
}

function addaddress(){
	var html;
	var server = 'http://localhost/saungsaji/';
	
	if($("div[id^='addrow']").length < 3 ){
	var row = Number($("#counteraddress").val())+1;
	html='<div id="addrow'+row+'">';
	html+='<div class="label-myprofile"></div><div class="textarea-myprofile-text"><input type="text" id="1" class="textarea textarea-myprofile"></div><div class="delete"><img src="' + server + '/img/delete.png" style="cursor:pointer" onclick="deleteaddaddress(\''+row+'\')" ></div>';
	html+='</div>';
	$("#counteraddress").val(row);
	$("#addaddress").append(html);
	}else alert("Maaf, alamat maksimal hanya 3.");

}
function deleteaddaddress(row){
	$("#addrow"+row).remove();
}
function addaddresswil(){
	var html;
	var server = 'http://localhost/saungsaji/';
	
	if($("div[id^='wilrow']").length < 3 ){
	var row = Number($("#counteraddresswil").val())+1;
	html='<div id="wilrow'+row+'">';
	html+='<div class="label-myprofile"></div><div class="textarea-myprofile-text"><input type="text" id="1" class="textarea textarea-myprofile"></div><div class="delete"><img src="' + server + '/img/delete.png" style="cursor:pointer" onclick="deleteaddaddresswil(\''+row+'\')" ></div>';
	html+='</div>';
	$("#counteraddresswil").val(row);
	$("#addaddresswil").append(html);
	}else alert("Maaf, alamat wilayah pengantaran hanya 3.");
}
function deleteaddaddresswil(row){
	$("#wilrow"+row).remove();
}
