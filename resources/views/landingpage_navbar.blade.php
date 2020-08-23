<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
		div a{
			text-decoration: none !important;
			color: white;
			l
		}
		div a:hover{
			border-bottom: 0;
			color:white;
		}
	</style>
</head>
<body>
	<div class="row"> 
		<div class="col-md-9">
			<a href="/">
				<div id="logo_kiri" class="text-center" style="width: 130px; margin-top: 15px;">
					<img src="{{asset("img/custom/main_logo.png")}}" style="width: 40%;">
					<p style="color: white; font-size: 12px;">Satria Pangan Prima</p>
				</div>
			</a>
		</div>
		<div class="col-md-3">
			<div class="row" style="margin-top:30px; color: white;">
				<div class="col-md-2 text-center"></div>
				<div class="col-md-4 text-center">
					<a href="/signUp"><h6>Daftar</h6></a>
				</div>
				<div class="col-md-4 text-center">
					<a id="btn-masuk" href="#"><h6>Masuk</h6></a>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-86867069-5"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-86867069-5');
	</script>
</body>
</html>