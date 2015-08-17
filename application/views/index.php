<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ninja GOLD!!</title>
	<link rel="stylesheet" href="/assets/css/ninja_gold_style.css">
</head>
<body>
	<h2>Your Gold : 
		<?= $this->session->userdata('gold') ?>
	</h2>
	<form action="Ninja_Gold" method="post">
		<input type="hidden" name="farm" value="farm">
		<h3>Farm</h3>
		<input type="submit" value="Find Gold!"/>
	</form>
	<form action="Ninja_Gold" method="post">
		<input type="hidden" name="cave" value="cave">
		<h3>Cave</h3>
		<input type="submit" value="Find Gold!"/>
	</form>
	<form action="Ninja_Gold" method="post">
		<input type="hidden" name="house" value="house">
		<h3>House</h3>
		<input type="submit" value="Find Gold!"/>
	</form>
	<form action="Ninja_Gold" method="post">
		<input type="hidden" name="casino" value="casino">
		<h3>Casino</h3>
		<input type="submit" value="Find Gold!"/>
	</form>
	<ul>
		<?= $this->session->userdata('log') ?>
	</ul>
	<form id="start-over" action="Ninja_Gold" method="post">
		<input type="hidden" name="unset" value="unset">
		<input type="submit" value="start over!"/>
	</form>
</body>
</html>