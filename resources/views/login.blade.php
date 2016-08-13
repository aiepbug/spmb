<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>

        <link href="asset/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <style>
			@font-face {
					font-family: oswald;
					src: url(../fonts/oswald.ttf);
					font-family: oxygen;
					src: url(asset/fonts/oxygen.ttf);
			}
			body {
				  padding-top: 40px;
				  padding-bottom: 40px;
				  background-color: #eee;
				}
				.form-signin-heading {
					font-size: 2.5em;
					font-family: 'oswald';
					text-align:center;
				}
				.form-signin-sub {
					font-size: 1.5em;
					font-family: 'oxygen';
					text-align:center;
				}
				.form-signin {
				  max-width: 330px;
				  padding: 15px;
				  margin: 0 auto;
				}
				.form-signin .form-signin-heading,
				.form-signin .checkbox {
				  margin-bottom: 10px;
				}
				.form-signin .checkbox {
				  font-weight: normal;
				}
				.form-signin .form-control {
				  position: relative;
				  height: auto;
				  -webkit-box-sizing: border-box;
					 -moz-box-sizing: border-box;
						  box-sizing: border-box;
				  padding: 10px;
				  font-size: 16px;
				}
				.form-signin .form-control:focus {
				  z-index: 2;
				}
				.form-signin input[type="email"] {
				  margin-bottom: -1px;
				  border-bottom-right-radius: 0;
				  border-bottom-left-radius: 0;
				}
				.form-signin input[type="password"] {
				  margin-bottom: 10px;
				  border-top-left-radius: 0;
				  border-top-right-radius: 0;
				}
				.logo{
					text-align:center;
					margin-bottom:50px;
				}
				.alert{
					text-align:center;
					margin-top:20px;
					font-size:1em;
				}
        </style>
    </head>
    <body>
		<div class="container">
			<div class="logo"><img src="../public/asset/img/logo.png"></div>
			<div class="form-signin-heading">Penerimaan Calon Mahasiswa</div>
			<div class="form-signin-sub">Institut Agama Islam Negeri Palu</div>
			<form class="form-signin" method="POST" action="masuk">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<label for="input_id" class="sr-only">Nomor pendaftaran</label>
				<input type="text" id="userid" name="userid" class="form-control" placeholder="No ujian / User ID" required value="" autofocus>
				<label for="input_password" class="sr-only">Password</label>
				<input type="password" id="password" name="password" class="form-control" placeholder="Nama Ibu / Password" value="" required>
				<div class="checkbox">
				  <label class="">
					<input type="checkbox" name="admin" value="admin"> Admin
				  </label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
				@if(Session::has('message'))
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
				@endif
			</form>
		</div> 
    </body>
</html>
<script src="asset/js/bootstrap.js"></script>
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery-ui.js"></script>
