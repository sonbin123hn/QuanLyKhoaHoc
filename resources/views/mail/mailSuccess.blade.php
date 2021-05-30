<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Document</title>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
		/>

		<link
			rel="stylesheet"
			href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</head>

	<body>
		<div class="container">
			<div class="row">
				<p style="font-size: 35px; font-weight: bold">
					<span style="color: blue">Hello {{ $details['name'] }}!</span>
				</p>
			</div>
			<div class="row">
				<p>First of all, thank you for signing up for the class and becoming a member of our system - <span style="font-size: 20px; font-weight: bold"> Academia</span></p>
			</div>			
			<div class="row">
				<p>You have <span style="color:green">successfully</span> registered for the class: {{ $details['nameclass'] }}</p>
			</div>
			<div class="row">				
				<p>
					Your
					<span style="color: rgb(255, 0, 0)">Account</span>: + {{ $details['email'] }}
				</p>
			</div>
			<div class="row">				
				<p>
					Your
					<span style="color: rgb(255, 0, 0)">password</span>: usermember123
				</p>
			</div>
			<div class="row">
				<p>
					If you can't login into our system, please contact us by replying to this email or by
					calling us on <span style="color:red; background-color: yellow;">+84 987 319 412</span>.
				</p>
			</div>
			<div class="row">
				<p>
					Finally, wish you a successful course.
				</p>
			</div>
			<div class="row">
				<p>
					<span style="font-size: 20px; font-weight: bold">Best Regards</span> <br />
					Dang Ngoc Duy <br />
					Email: duydn@academia.com
				</p>
			</div>
			<div class="row">
				<p>
					Academia, 169 Nguyen Van Linh Street, Hai Chau District, Da Nang City
					<br />
					Tel: +84 987 319 412 <br />
					Email: academiadn@academia.com<br />
					Website: Academia.com
				</p>
			</div>
		</div>
	</body>
</html>
