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
				<p>
					Welcome to
					<span style="font-size: 20px; font-weight: bold"> Academia</span>, one of
					the top programming schools in Danang City.
				</p>
			</div>
			<div class="row">
				<p>
					Please check the
					<span style="background-color: yellow">information</span> below you have
					registered with us.
				</p>
			</div>
			<div class="row">
				<table class="table">
					<thead>
						<th>Full Name</th>
						<th>Phone Number</th>
						<th>Class</th>
						<th>Class Fee</th>
					</thead>
					<tbody>
						<td>{{ $details['name'] }}</td>
						<td>{{ $details['phone'] }}</td>
						<td>{{ $details['nameclass'] }}</td>
						<td>{{ $details['price'] }}</td>
					</tbody>
				</table>
			</div>
			<div class="row">
				<p>
					If your
					<span style="color: rgb(255, 0, 0)">information is not exactly</span> what
					you have registered, please contact us by replying to this email or by
					calling us on +84 987 319 412.
				</p>
			</div>
			<div class="row">
				<p>
					<span style="font-size: 20px;font-weight: bold">Best Regards</span> <br />
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