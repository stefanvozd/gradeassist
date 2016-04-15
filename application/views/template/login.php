<?php
	//$data = array(); 
	switch ($getPageType) {
		case 'student':
			$data['username'] = 'sm120507d';
			$data['password'] = 'password';
			$data['color'] = 'red';
			break;
		case 'demonstrator':
			$data['username'] = 'mn120545d';
			$data['password'] = 'password';
			$data['color'] = 'teal';
			break;
		case 'zaposlen':
			$data['username'] = 'draza';
			$data['password'] = 'drazacar';
			$data['color'] = 'darkblue';
			break;
		case 'admin':
			$data['username'] = 'admin';
			$data['password'] = 'nijeadmin';
			$data['color'] = 'orange';
			break;			
		default:
			$data['color'] = 'grey';
			break;
	}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<title>GradeAssist Login</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo getAssetsUrl();?>css/bootstrap.min.css">
	<!-- icheck -->
	<link rel="stylesheet" href="<?php echo getAssetsUrl();?>css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo getAssetsUrl();?>css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="<?php echo getAssetsUrl();?>css/themes.css">


	<!-- jQuery -->
	<script src="<?php echo getAssetsUrl();?>js/jquery.min.js"></script>

	<!-- Nice Scroll -->
	<script src="<?php echo getAssetsUrl();?>js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- Validation -->
	<script src="<?php echo getAssetsUrl();?>js/plugins/validation/jquery.validate.min.js"></script>
	<script src="<?php echo getAssetsUrl();?>js/plugins/validation/additional-methods.min.js"></script>
	<!-- icheck -->
	<script src="<?php echo getAssetsUrl();?>js/plugins/icheck/jquery.icheck.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo getAssetsUrl();?>js/bootstrap.min.js"></script>
	<script src="<?php echo getAssetsUrl();?>js/eakroko.js"></script>

	<!--[if lte IE 9]>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->


	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo getAssetsUrl();?>img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo getAssetsUrl();?>img/apple-touch-icon-precomposed.png" />

</head>

<body class="login theme-<?php echo $data['color']; ?>" data-theme="theme-<?php echo $data['color']; ?>">

<div class="wrapper">
		<h1>
			<a href="index.html">
				<img src="<?php echo getAssetsUrl();?>img/logo-big.png" width="300px" alt="" class='retina-ready' ></a>
	</h1>
		<div class="login-body">
			<h2>DOBRODOŠLI</h2>
			  <?php echo validation_errors(); ?>
 				<?php echo form_open(current_url().'/login', array('id'=>'form','class'=>'form-validate')); ?>

				<div class="form-group">
					<div class="email controls">
						<input type="text" name='id' id='id' placeholder="Korisničko ime" class='form-control' data-rule-required="true" value="<?php echo $data['username']; ?>" autofocus>
					</div>
				</div>
				<div class="form-group">
					<div class="pw controls">
						<input type="password" name="password" id='password' placeholder="Lozinka" value="<?php echo $data['password']; ?>" class='form-control' data-rule-required="true">
					</div>
				</div>
				<div class="submit">
				  <input type="submit" value="Prijava" class='btn btn-primary'>
				</div>
			</form>
			<div class="forget"></div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#form').submit(function(event){
				event.preventDefault();

				if( $('#id').val().length && $('#password').val().length){
					 //$.post(action, data, onSuccess)	echo/return?
					$.post("<?php echo current_url().'/login' ;?>", {id: $('#id').val(), password: $('#password').val()}, function(uspesno){
							if(!uspesno){
								$('#form').addClass('has-error');
								$('.forget').html('Neispravni podaci za pristup!');
							}
							else{ //refresh
								$(location).attr('href','');}
					});//post
				}
			});//form submit
		});//document.ready
	</script>
</body>

</html>
