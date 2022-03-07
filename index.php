<?php

$home = 0;
$man = 0;
$woman = 0;
$salary = 0;

if (!empty($_POST)) {
	$home = $_POST['home'];
	$man = $_POST['man'];
	$woman = $_POST['woman'];

	$home = str_replace(' ', '', $home);
	$man = str_replace(' ', '', $man);
	$woman = str_replace(' ', '', $woman);
}

if ($home && $man && $woman != 0) {
	$salary = $man + $woman;

	$man_percent = round($man * 100 / $salary);
	$woman_percent = round($woman * 100 / $salary);

	$man_coin = round($home * $man_percent / 100);
	$woman_coin = round($home * $woman_percent / 100);
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Равные расходы</title>

	<link rel="stylesheet" href="style.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
	<div class="page">
		<div class="page__inner">
			<form method="POST" action="" class="form" action="">
				<p class="form__title">Равные расходы</p>
				<p class="form__subtitle">По мере своих возможностей</p>

				<input id="home" name="home" type="text" class="form__input form__input__firsr" placeholder="Расходы на дом" value="<?php if ($home == 0) echo null;
																																											else echo $home = $_POST['home'] ?>">
				<input id="man" name="man" type="text" class="form__input" placeholder="Парень" value="<?php if ($man == 0) echo null;
																																	else echo $man = $_POST['man'] ?>">
				<input id="woman" name="woman" type="text" class="form__input" placeholder="Девушка" value="<?php if ($woman == 0) echo null;
																																			else echo $woman = $_POST['woman'] ?>">
				<button type="submit" class="form__btn">Рассчитать</button>

				<div class="form__bottom">
					<div class="form__result">
						<p class="form__itog"><?php if ($salary && $home != 0) {
															echo $man_coin;
														} ?></p>
						<p class="form__percent"><?php if ($salary && $home != 0) {
																echo "$man_percent%";
															} ?></p>
						</p>
						<img src="img/man.svg" alt="" class="form__gender">
					</div>
					<div class="form__result">
						<p class="form__itog"><?php if ($salary && $home != 0) {
															echo $woman_coin;
														} ?></p>
						<p class="form__percent"><?php if ($salary && $home != 0) {
																echo "$woman_percent%";
															} ?></p>
						</p>
						<img src="img/woman.svg" alt="" class="form__gender">
					</div>
				</div>
			</form>
		</div>
	</div>


			<script>
				var home = document.getElementById("home");

				function update() {
					var n = home.value.replace(/[^0-9]/g, '').split('').reverse();
					if (n.length > 1) n.splice(3, 0, ' ');
					if (n.length > 7) n.splice(7, 0, ' ');
					if (n.length > 11) n.splice(11, 0, ' ');
					home.value = n.reverse().join('');
				}
				home.addEventListener("input", update);
			</script>

			<script>
				var man = document.getElementById("man");

				function update() {
					var b = man.value.replace(/[^0-9]/g, '').split('').reverse();
					if (b.length > 1) b.splice(3, 0, ' ');
					if (b.length > 7) b.splice(7, 0, ' ');
					if (b.length > 11) b.splice(11, 0, ' ');
					man.value = b.reverse().join('');
				}

				man.addEventListener("input", update);
			</script>

			<script>
				var woman = document.getElementById("woman");

				function update() {
					var a = woman.value.replace(/[^0-9]/g, '').split('').reverse();
					if (a.length > 1) a.splice(3, 0, ' ');
					if (a.length > 7) a.splice(7, 0, ' ');
					if (a.length > 11) a.splice(11, 0, ' ');
					woman.value = a.reverse().join('');
				}

				woman.addEventListener("input", update);
			</script>
</body>

</html>