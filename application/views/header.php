<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$title?></title>
<script type="text/javascript" src="<?=$base?>/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="<?=$base?>/js/script.js"></script>
<script type="text/javascript" src="<?=$base?>/js/jquery.form.min.js"></script> <!--untuk upload logo perusahaan-->
<script type="text/javascript" src="<?=$base?>/js/jquery-ui.js"></script><!--auto suggestion-->
<script type="text/javascript" src="<?=$base?>/js/modernizr.custom.79639.js"></script>
<script type="text/javascript" src="<?=$base?>/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?=$base?>/js/jquery.nivo.slider.pack.js"></script><!--untuk loading-->
<script type="text/javascript" src="<?=$base?>/js/jquery.selectric.min.js"></script><!--untuk selectbox-->
<script type="text/javascript" src="<?=$base?>/js/jquery.simple-dtpicker.js"></script>
<script type="text/javascript" src="<?=$base?>/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="<?=$base?>/js/jquery-ui-timepicker-addon.min.js"></script>
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>-->
<!--<script type="text/javascript" src="<?=$base?>/js/jquery.meio.mask.js"></script>-->
<!--<script type="text/javascript" src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>-->
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>-->
<!--<script type="text/javascript" src="<?=$base?>/js/simple-slider.js"></script>-->
<!--<script type="text/javascript" src="<?=$base?>/js/jquery.selectbox-0.2.js"></script>-->
<!--<script type="text/javascript" src="<?=$base?>/js/jquery.sumoselect.min.js"></script>-->
<!--<noscript><link rel="stylesheet" type="text/css" href="<?=$base?>/css/noJS.css" /></noscript>-->

<link rel="stylesheet" type="text/css" href="<?=$base?>/css/jquery-ui-1.8.18.custom.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?=$base?>/css/selectric.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?=$base?>/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?=$base?>/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="<?=$base?>/css/jquery.fancybox.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?=$base?>/css/nivo-slider.css" />
<link rel="stylesheet" media="all" type="text/css" href="<?=$base?>/css/jquery-ui-timepicker-addon.css" />
<link rel="stylesheet" media="all" type="text/css" href="<?=$base?>/css/jquery.simple-dtpicker.css" />
<link rel="stylesheet" media="all" type="text/css" href="<?=$base?>/css/jquery-ui-timepicker-addon.min.css" />
<!--<link rel="stylesheet" type="text/css" href="<?=$base?>/css/sumoselect.css" media="screen"/>-->
<!--
<link rel="stylesheet" type="text/css" href="<?=$base?>/css/simple-slider.css" />
<link rel="stylesheet" type="text/css" href="<?=$base?>/css/simple-slider-volume.css" /> 
<link rel="stylesheet" type="text/css" href="<?=$base?>/css/jquery.selectbox.css" />
<link rel="stylesheet" type="text/css" href="<?=$base?>/css/jquery.checkbox.css" />-->
<!--<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />-->

<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="css/nivo-slider-ie.css" />
<![endif]-->
<link rel="shortcut icon" href="<?=$base?>/img/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?=$base?>/img/favicon.ico" type="image/x-icon">
</head>
<body>
<script type="text/javascript" >
	function sticky(){
		var e=$(".headerWrapper").width();
		$("#header,#footer,.header-panel ").css("left",-$(this).scrollLeft()+"px");
		if($(".smalllogo").length<1&&$(window).scrollTop()>140){
			$('<img class="smalllogo" src="" />').appendTo("#header").css({left:e/2-115+"px"}).fadeIn("slow")
		}
		if($(".smalllogo").length==1){
			$(".smalllogo").css({left:e/2-115+"px"})
		}
		if($(".smalllogo").length>0&&$(window).scrollTop()<139){
			$(".smalllogo").fadeOut("slow",function(){$(this).remove()})
		}
		if($(window).scrollTop()>1){
			$(".headerWrapper").addClass('shadowbottom')
		}
		else{
			$(".headerWrapper").removeClass('shadowbottom')
		}
	}
	
	$(window).resize(function(){
		sticky()
	});
	
	$(document).ready(function() {
		sticky();
		$(window).scroll(function() {
			sticky()
		});
		
		//$("#container,.headerWrapper,.footerWrapper").css("min-width", ($(document).width() < 900 ? 1200 : $(document).width()) + "px")
		$("#container,.headerWrapper,.footerWrapper").css("min-width", $(document).width() + "px")
	});  
  
  $(document).ready(function(){
	$(".login").click(function(){
			if($("#box-login").css("display")=="block"){
				$("#box-login").fadeOut();
				}else{
					$(".login").css({"z-index":"10000"});
					var e=$(".mnLoginBtn").position();
		var t=$(".mnLoginBtn").outerWidth()/2;
		var n=$("#box-login").width()/2;
		posleft=e.left-n+t;
		$("#box-login").css({left:posleft+"px",top:e.top+30+"px",position:"absolute"}).fadeIn();
		}return false
	})
	$("select").selectric();
	
	$('.fancybox').fancybox({
            'type' : 'iframe',
			'width':605,
			'height':465,
			'padding':0,
			'margin':20,
			'autoScale'	: true,
			'autoDimensions' : false,
			'scrolling' : false,
			'closeBtn':true,
			'title':false,
			'iframe': {'scrolling': 'no'}
			});
			
	$('#daftar_link').fancybox({
            'type' : 'iframe',
			'maxWidth' : 470,
			'maxHeight' : 600,
			'padding' : 0,
			'margin' : 20,
			'autoScale'	: true,
			'autoDimensions' : false,
			'scrolling' : true,
			'closeBtn' : true,
			'title' : false,
			'iframe' : {'scrolling': 'yes'}
			});			
			
	$('.popupimage').fancybox({
            'type' : 'iframe',
			'maxWidth' : 605,
			'maxHeight' : 465,
			'padding' : 0,
			'margin' : 20,
			'autoScale' : true,
			'autoDimensions' : false,
			'scrolling' : false,
			'closeBtn' : true,
			'title' : false,			
			'iframe' : {'scrolling': 'no'}
			//tidak boleh after close karena jika dilakukan secara normal, maka akan redirect ke halaman build_order
		});
		
	$('.menuimage').fancybox({
            'type' : 'iframe',
			'maxWidth' : 800,
			'maxHeight' : 380,
			'padding' : 0,
			'margin' : 20,
			'autoScale' : true,
			'autoDimensions' : false,
			'scrolling' : false,
			'closeBtn' : true,
			'title' : false,			
			'iframe' : {'scrolling': 'no'}
			//tidak boleh after close karena jika dilakukan secara normal, maka akan redirect ke halaman build_order
		});
		
	$('.popupimage-warning').fancybox({
            'type' : 'iframe',
			'maxWidth' : 415,
			'maxHeight' : 270,
			'padding' : 0,
			'margin' : 20,
			'autoScale' : true,
			'autoDimensions' : false,
			'scrolling' : false,
			'closeBtn' : true,
			'title' : false,			
			'iframe' : {'scrolling': 'no'}
			//tidak boleh after close karena jika dilakukan secara normal, maka akan redirect ke halaman build_order
		});

	$('.popuppoint').fancybox({
            'type' : 'iframe',
			'maxWidth' : 450,
			'maxHeight' : 335,
			'padding' : 0,
			'margin' : 20,
			'autoScale' : true,
			'autoDimensions' : false,
			'scrolling' : false,
			'closeBtn' : true,
			'title' : false,			
			'iframe' : {'scrolling': 'no'}
			//tidak boleh after close karena jika dilakukan secara normal, maka akan redirect ke halaman build_order
		});

			
    //$("#submit_order").click(function(){
          //parent.jQuery.popupimage.close();
		  //parent.location.reload(true);
    //});			
					
	$("#resetpwd").click(function(){$("#box-login").hide()});		
	
	$("#resetpwd").fancybox({
            'type' : 'iframe',
			'maxWidth' : 330,
			'maxHeight' : 250,
			'padding' : 0,
			'margin' : 20,
			'autoScale'	: true,
			'autoDimensions' : false,
			'scrolling' : false,
			'closeBtn' : true,
			'title' : false,
			'iframe' : {'scrolling': 'no'}
			});			
	
	$('#contact_us').fancybox({
            'type' : 'iframe',
			'maxWidth' : 380,
			'maxHeight' : 520,
			'padding' : 0,
			'margin' : 20,
			'autoScale'	: true,
			'autoDimensions' : false,
			'scrolling' : true,
			'closeBtn' : true,
			'title' : false,
			'iframe' : {'scrolling': 'yes'}
			});			

		$('#slider').nivoSlider({
			directionNav:false,controlNav:false,animSpeed:500
		});			
	
  });
  			
  $("[data-slider]")
    .each(function (){
      var input = $(this);
      $("<span>")
        .addClass("output")
        .insertAfter($(this));
    })
    .bind("slider:ready slider:changed", function (event, data){
      $(this)
        .nextAll(".output:first")
        .html(data.value.toFixed(3));
    });
  </script>
<div id="container">
	<div class="headerWrapper">
		<div id="header">			
			<div id="headerMenu">				
				<ul class="menu">
					<?php
					if ($this->session->userdata('userType')=='customer' || $this->session->userdata('userType')==''){
					?>
						<li class="mnHome">
						<!--<a href="<?=$base?>" class="mnBtn mnHomeBtn">Home</a>-->
						<a href="<?=$base?>" class="btn-style-home">Home</a>
						</li>
						<!--<li class="mnCarakerja"><a  href="<?=$base?>/index.php/home/carakerja" class="mnBtn mnCarakerjaBtn fancybox">Cara Kerja</a></li>-->
						<li class="mnCarakerja"><a  href="" class="btn-div-style fancybox">Cara Kerja</a></li>						
					<?php
					}
					else{
					?>
						<li class="mnHome-"></li>	
						<li class="mnCarakerja"></li>				
					<?php
					}
					?>				
					<?php
					if ($this->session->userdata('userType')=='customer' || $this->session->userdata('userType')=='restaurant'){
					?>
						<li class="mnProfile">
							<!--<div class="mnProfileBtn" id="profile_link"><?=$this->session->userdata('cNama')?></div>-->
							<div id="dd" class="wrapper-dropdown-5" tabindex="1" style="z-index:10">hi, 
								<?php
								$user = $this->session->userdata('cNama');
								$name = explode(" ", $user);
								echo $name[0];									
								?>
								<ul class="dropdown">
									<?php
										foreach ($user_menu->result_array() as $row_user_menu){  	  			
									?>				
									<li><a href="<?=$base?>/index.php/<?=$row_user_menu['cLink']?>"><i class="icon-circle-arrow-right"></i><?=$row_user_menu['cMenuItem']?></a></li>
									<?php
										}
									?>
								</ul>
							</div>
							<!-- jQuery if needed -->	
							<script type="text/javascript">
								function DropDown(el) {
									this.dd = el;
									this.initEvents();
								}
								DropDown.prototype = {
									initEvents : function() {
										var obj = this;
					
										obj.dd.on('click', function(event){
											$(this).toggleClass('active');
											event.stopPropagation();
										});	
									}
								}
					
								$(function() {
					
									var dd = new DropDown( $('#dd') );
					
									$(document).click(function() {
										// all dropdowns
										$('.wrapper-dropdown-5').removeClass('active');
									});
					
								});				
							</script>
						</li>
						<?php //=$this->session->userdata('cNama')?>
					<?
					}
					else{				
					?>				
						<!--<li class="mnLogin"><a href="#" class="mnBtn mnLoginBtn" id="login_link">Login</a></li>-->
						<li><span class="btn-div-style login mnLoginBtn" id="login_link">Login</span></li>
						<!--<li><a href="<?=$base?>/index.php/home/signup" class="mnBtn mnDaftarBtn fancybox" id="daftar_link">Daftar</a></li>-->
						<li><a href="<?=$base?>/index.php/home/signup" class="btn-div-style fancybox" id="daftar_link">Daftar</a></li>
					<?php
					}
					?>				
				</ul>
			</div>		
			<?php
			if($this->session->userdata('userType')==''){
			?>
				<div id="box-login">
					<div id="box-login-arrow"></div>
					<div id="box-login-form">
					<form method="post" name="login">
						<div class="bx-login">
							<div>
								<div class="label-login">Email</div>
								<div class="label-login-box"><input type="text" class="input-login" name="email"></div>
							</div>
							<div>
								<div class="label-login">Password</div>
								<div class="label-login-box"><input type="password" class="input-login" name="password"></div>
							</div>
							<div class="login-submit">
								<input type="submit" name="login_submit" value="login" class="btn-style"> 
								&nbsp;&nbsp;<span class="reset-pwd"><a href="<?=$base?>/index.php/home/reset_password" id="resetpwd" class="fancybox" style="color:#666">Reset Password</a></span>
							</div>
						</div>
					</form>
					</div>
				</div>
			<?php
			}
			?>			
		</div>
		<!-- statis -->
		<div class="header-panel" style="min-width:1349px;">
			<ul class="column">
				<li class="cols" style="width:34%; text-align:center; margin-top:5px;"><img src="<?=$base?>/img/ss.jpg" height="85px" ></li>
				<li class="cols" style="width:66% ;padding-top:8px;">
					<ul class="column header-content-panel">
						<li class="cols"> 
							<div id="search"> 
								<div class="searchText">
									<div style="margin-bottom:7px;height:15px;">Waktu layanan : setiap hari, pk. <?=$open_ss->cValue?> - <?=$close_ss->cValue?></div>
									Cari Menu
								</div>
								<div class="boxsearch"><input type="text" class="inputsearch" id="inputsearch" value="<?=$this->session->userdata('cSearch')?>"></div>
								<div class="btnsearch"><img src="<?=$base?>/img/btnsearch.gif" id="btnsearch" alt="saungsaji" ></div>
							</div>
						</li>						
						<li class="cols"> 
							<div class="searchText">
								<div style="margin-bottom:5px;height:20px;">Telp : 0741-591.2050 - BBM : 54649727</div>
								Restoran
							</div>
							<div class="option-menu" style="width:225px;"> 								
								<select class="options-list" id="optionsmenu1">
							        <option value="0">- Semua Restoran -</option>
									<?php
										foreach ($restoran->result_array() as $row_get_all_restoran){  	  			
									?>
										<option value="<?=$row_get_all_restoran['id']?>">
											<?=$row_get_all_restoran['cNama']?> 
											<?php
												if($row_get_all_restoran['cStatusOpen']=='N')
													echo "- Closed";
											?>					
										</option>
									<?php
									}
									?>
								</select>								
							</div>
						</li>
						<li class="cols"> 
							<div class="searchText">
								<div style="margin-bottom:5px;height:20px;"> </div>
								Harga
							</div>
							<div class="option-menu" style="width:140px;">
								<select class="options-list" id="optionsmenu4">
									<option value="0">- Semua Harga -</option>
									<?php
									foreach ($harga->result_array() as $row_get_all_harga){
									?>
										<option value="<?=$row_get_all_harga['id']?>">
											<?=number_format($row_get_all_harga['iStartHarga'],0,",",".")?> - <?=number_format($row_get_all_harga['iEndHarga'],0,",",".")?>
										</option>
									<?php
									}
									?>
								</select>
							</div>
						</li>						
					</ul>
				</li>
				<li class="clearfix"></li>
			</ul>
		</div>
		<!-- end of statis -->
	</div>
	<div style="padding:50px"></div>	