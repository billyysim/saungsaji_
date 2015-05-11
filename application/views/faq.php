<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Saungsaji</title>
	<link type="text/css" rel="stylesheet" href="<?=$base?>/css/popup.css"/>
	<script src="<?=$base?>/js/flexcroll.js"></script>
	<link href="<?=$base?>/css/tutorsty.css" rel="stylesheet" type="text/css" />
	<link href="<?=$base?>/css/flexcrollstyles.css" rel="stylesheet" type="text/css" />
	<style>
		#popup-box-content{padding:1px;}
		#popup-box-title{border-radius:5px;-moz-border-radius:5px;padding:20px 0px 20px 20px;background:#FBC573;font-size:19px}
		.popup-text{padding:0px 30px 10px 20px}
		.padd10px{padding-top:10px}
	</style>
</head>
<body>
	<div id="popup-box-content">	
		<div id="popup-box-title">Pertanyaan Sering</div>
		<div class="padd10px">
			<div id='mycustomscroll' class='flexcroll popup-text'>		
			<p>
				<ol>
					<li>Kapan waktu operasional Saungsaji ?
						<ul><li>Waktu operasional Saungsaji adalah Pk.<?=$open_ss->cValue?> s/d Pk.<?=$close_ss->cValue?> </li></ul>
					</li>
					<li>Bagaimana cara melakukan pemesanan di Saungsaji?
						<ul><li>Anda bisa melihatnya di menu "Cara Pesan" yang ada di bagian bawah website Saungsaji.com</li></ul>
					</li>
					<li>Berapa minimum order untuk pemesanan di Saungsaji?
						<ul><li>Minimum order Rp. <?=number_format($min_order->cValue,0,",",".")?></li></ul>
					</li>
					<li>Apakah ada biaya pengantaran ketika melakukan pemesanan di Saungsaji?
						<ul><li>Tidak ada biaya pengantaran</li></ul>
					</li>
					<li>Apakah ada biaya tambahan ketika melakukan pemesanan di Saungsaji?
						<ul><li>Anda hanya membayar jasa layanan sebesar <?=$charge_delivery->iCharge?>% dari total pembelian yang dilakukan</li></ul>
					</li>					
					<li>Haruskah saya mempunyai akun untuk bisa melakukan pemesanan?
						<ul><li>Tidak wajib, anda juga dapat melakukan pemesanan melalui telepon dengan menghubungi No. 0741-591.2050</li></ul>
					</li>
					<li>Berapa lama pesanan saya sampai?
						<ul><li>Kami berkomitmen anda dapat menerima pesanan makanan anda paling lama 1 jam terhitung dari konfirmasi pesanan dilakukan</li></ul>
					</li>
					<li>Bagaimana cara melakukan pembayaran terhadap pesanan yang dilakukan?
						<ul><li>Anda dapat membayar langsung kepada kurir kami ketika pesanan anda telah diterima</li></ul>
					</li>
					<li>Dimana saya melihat pesanan saya?
						<ul><li>Anda bisa melihatnya di menu "my Order" setelah anda melakukan login</li></ul>
					</li>
					<li>Apa kelebihan melakukan pemesanan di Saungsaji.com?
						<ul><li>Menu yang bervariasi</li><li>Dapat melihat menu secara visual</li><li>Reward Point yang dapat ditukarkan</li></ul>
					</li>
					<li>Saya lupa password saya
						<ul>
							<li>Klik tombol Login</li>
							<li>Klik Reset Password</li>
							<li>Masukkan email anda yang terdaftar di Saungsaji.com</li>
							<li>Password baru akan dikirim ke email anda</li>
						</ul>
					</li>
				</ol>
			</p>
			<p>
				Jika ada pertanyaan lain, maka anda dapat menghubungi kami dengan mengirim email ke info@saungsaji.com atau mengisi form pertanyaan di menu "Hubungi Kami"
				di bagian bawah website ini
			</p>		
			<p>
				Bagi anda yang ingin bergabung menjadi restoran partner dari Saungsaji dapat menghubungi Saungsaji di partner@saungsaji.com
			</p>
			</div>
		</div>
	</div>
</body>
</html>				