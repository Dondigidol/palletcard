<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	header("location: index.php");
}

switch ($_SESSION["otdel_id"]) {
	case 51:
		$rows = 10;
		break;
	case 50:
		$rows = 10;
		break;
	case 55:
		$rows = 10;
		break;
	case 715:
		$rows = 10;
		break;
	case 12:
		$rows = 10;
		break;
	default:
		$rows = 5;
		break;
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/card.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title media=noprint>Карточка паллеты</title>
</head>

<body>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/card.js"></script>
	<script type="text/javascript" src="js/JsBarcode.all.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	<div id="header" name="header">
		<div id="triangle" name="triangle"></div>
		<div id="logo" name="logo"></div>
		<div id="buttonsBlock">
			<div id="printButton" onclick="window.print()" class="menuButtons"></div>
		</div>
		<a href="index.php" onclick="logout();">Выйти</a>
	</div>
	<div id="cardcont" name="cardcont">
		<div id="card" name="card">
			<h1>Карточка паллеты</h1>
			<table class="tables" width="80%">
				<tr class="tableshead">
					<td>Отдел</td>
					<td>Дата</td>
				</tr>
				<tr class="tablescont">

					<?php
					$otdels_select = "<div id='otdelCont'><select id='otdels_select' onchange='otdelChange();'>
										<option value=''></option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
										<option>9</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
										<option>13</option>
										<option>14</option>
										<option>15</option>
									</select></div>";
					switch ($_SESSION["otdel_id"]) {
						case 53:
							echo "<td>" . $otdels_select . "</td>";
							break;
						case 50:
							echo "<td>" . $otdels_select . "</td>";
							break;
						case 715:
							echo "<td>" . $otdels_select . "</td>";
							break;
						default:
							echo "<td>" . $_SESSION["otdel_id"] . "</td>";
							break;
					}
					echo "<td>" . date("d.m.Y") . "</td>";
					?>

				</tr>
			</table>
			<br>
			<table class="tables" width="100%">
				<tr class="tableshead">
					<td width="5%">№</td>
					<td width="10%">код ЛМ</td>
					<td width="15%">код EAN</td>
					<td width="35%">наименование</td>
					<td width="10%">20/80</td>
					<td width="10%">AVS</td>
					<td width="10%">кол-во</td>
				</tr>

				<?php
				$tab = 0;
				for ($i = 0; $i < $rows; $i++) {

					echo ("<tr class = 'tablescont2'>
								<td>" . ($i + 1) . "</td>
								<td>
									<div id='lm_" . $i . "_label' class='lmLabel' onclick='editLm(" . $i . ");'></div>
									<input type='number' id= 'lm_" . $i . "'  class='tab_article_input' onchange= 'getItemByLm(this.value, " . $i . ");' onfocusout = 'lostFocus(" . $i . ");' tabindex='" . ($tab + 1) . "'/>
								</td>
								<td>
									<svg id='barcode_" . $i . "' class='barcode'></svg>
									<div id='sku_" . $i . "_label' class='skuLabel' onclick='editSku(" . $i . ");'></div>
									<input type='number' id= 'sku_" . $i . "'  class='tab_article_input' onchange= 'getItemBySku(this.value, " . $i . ");' onkeyup = 'nextRow(event," . $i . ");' onfocusout = 'lostFocus(" . $i . ");' tabindex='" . ($tab + 2) . "'/>
								</td>
								<td>
									<div id = 'name_" . $i . "_label'></div>
								</td>
								<td>
									<div id = 'label_" . $i . "_2080'></div>
								</td>
								<td>
									<div id='avs_" . $i . "_label'></div>
								</td>
								<td>
									<input type='number' id= 'kol_" . $i . "' tabindex='" . ($tab + 3) . "' onfocusout = 'lostFocus(" . $i . ");'/>
									<div id = 'clear_" . $i . "' class = 'clearButton' onclick='clearItem(" . $i . ")'></div>
								</td>
							</tr>");
					$tab = $tab + 3;
				}
				?>

			</table>
			<br>
			<h3><b>Составил:</b><u> <?php echo $_SESSION["username"]; ?></u></h3>
			<p><b> Памятка для постановки паллета на склад:</b><br>
				1. Товар должен находиться на исправном поддоне<br>
				2. Высота паллета не должна превышать 1.2м<br>
				3. Паллет должен быть полностью замотан стрейч пленкой<br>
				4. Карточка паллеты (оба экземпляра) должна лежать на паллете</p>
		</div>
	</div>
	<div id="errorCont"></div>


	<script>
		document.onready = function() {
			otdelChange();
		}

		document.onclick = function(e) {
			<?php
			if (!isset($_SESSION['user_id'])) {
				header("location: index.php");
			}
			?>
		}

		var lmLabel = [];
		var lmInput = [];
		var skuLabel = [];
		var skuInput = [];
		var barcode = [];
		var kolInput = [];
		var nameLabel = [];
		var AVSLabel = [];
		var label2080 = [];

		function loadVariables() {
			<?php
			for ($i = 0; $i < $rows; $i++) {
				echo "lmLabel[" . $i . "] = document.getElementById('lm_" . $i . "_label');";
				echo "lmInput[" . $i . "] = document.getElementById('lm_" . $i . "');";
				echo "skuLabel[" . $i . "] = document.getElementById('sku_" . $i . "_label');";
				echo "skuInput[" . $i . "] = document.getElementById('sku_" . $i . "');";
				echo "barcode[" . $i . "] = document.getElementById('barcode_" . $i . "');";
				echo "kolInput[" . $i . "] = document.getElementById('kol_" . $i . "');";
				echo "nameLabel[" . $i . "] = document.getElementById('name_" . $i . "_label');";
				echo "AVSLabel[" . $i . "] = document.getElementById('avs_" . $i . "_label');";
				echo "label2080[" . $i . "] = document.getElementById('label_" . $i . "_2080');";
			}
			?>
		}

		function otdelChange() {
			if (document.getElementById("otdels_select")) {
				if (document.getElementById("otdels_select").value == "") {
					document.getElementById("otdelCont").style.background = "rgba(255,0,0,0.3)";
				} else {
					document.getElementById("otdelCont").style.background = "transparent";
				}
			}

		}

		function nextRow(event, row) {
			if (event.keyCode == 13) {
				if (row != <?php echo $rows - 1; ?>) {
					editSku(row + 1);
				} else {
					document.getElementById("sku_" + row).blur();
				}
			}
		}

		window.addEventListener('load', loadVariables, false);

		function getAVS(item, pos) {
			$.ajax({
				type: "POST",
				url: "aj/getAVS.php",
				data: {
					"item": item
				},
				success: function(data) {
					let avs = JSON.parse(data);
					if (!avs.error) {
						AVSLabel[pos].innerHTML = avs.avsDate;
					} else {
						if (avs.status != 404) {
							console.error(avs);
							AVSLabel[pos].innerHTML = "Ошибка!";
						}
					}
				},
			})
		}

		function get2080(item, pos) {
			$.ajax({
				type: "post",
				url: "aj/get2080.php",
				data: {
					"item": item
				},
				success: function(data) {
					let status2080 = JSON.parse(data);
					if (!status2080.error) {
						label2080[pos].innerHTML = status2080.status;
					} else {
						if (status2080.status != 404) {
							console.error(status2080);
							label2080[pos].innerHTML = "Ошибка!";
						}
					}
				}
			})
		}

		function getItemBySku(sku, pos) {
			skuLabel[pos].innerHTML = "";
			barcode[pos].innerHTML = "";
			if (sku) {
				$.ajax({
					type: "POST",
					url: "aj/getdata.php",
					data: {
						"sku": sku
					},
					success: function(data) {
						data = data.split("|");
						if (data[0] == "") {
							data[0] = sku;
						}
						lmLabel[pos].innerHTML = data[1];
						skuLabel[pos].innerHTML = data[0];
						if (data[0] != "") {
							JsBarcode("#barcode_" + pos, data[0], {
								width: 1.5,
								height: 30,
								font: "Helvetica"
							});

						}
						nameLabel[pos].innerHTML = data[2];
						getAVS(data[1], pos);
						get2080(data[1], pos);
					}
				});
			} else {
				clearItem(pos);
			}

		}



		function getItemByLm(lm, pos) {
			lmLabel[pos].innerHTML = "";
			barcode[pos].innerHTML = "";
			if (lm) {
				$.ajax({
					type: "POST",
					url: "aj/getdata.php",
					data: {
						"lm": lm
					},
					success: function(data) {
						data = data.split("|");
						if (data[1] == "") {
							data[1] = lm;
						}
						lmLabel[pos].innerHTML = data[1];
						skuLabel[pos].innerHTML = data[0];
						if (data[0] != "") {
							JsBarcode("#barcode_" + pos, data[0], {
								width: 1.5,
								height: 30,
								font: "Helvetica"
							});

						}
						nameLabel[pos].innerHTML = data[2];
						getAVS(data[1], pos);
						get2080(data[1], pos);
					}
				});
			} else {
				clearItem(pos);
			}

		}

		function editLm(pos) {
			lmInput[pos].value = lmLabel[pos].innerHTML;
			lmLabel[pos].style.visibility = "hidden";
			lmInput[pos].style.visibility = "visible";
			lmInput[pos].focus();
		}

		function editSku(pos) {
			skuInput[pos].value = skuLabel[pos].innerHTML;
			skuLabel[pos].style.visibility = "hidden";
			barcode[pos].style.visibility = "hidden";
			skuInput[pos].style.visibility = "visible";
			skuInput[pos].focus();
		}

		function lostFocus(pos) {
			skuInput[pos].style.visibility = "hidden";
			lmInput[pos].style.visibility = "hidden";
			skuLabel[pos].style.visibility = "visible";
			lmLabel[pos].style.visibility = "visible";
			barcode[pos].style.visibility = "visible";
			if (skuInput[pos].value != "" || lmInput[pos].value != "" || kolInput[pos].value != "") {
				document.getElementById("clear_" + pos).style.display = "block";
			} else {
				document.getElementById("clear_" + pos).style.display = "none";
			}

			if ((skuInput[pos].value != "" || lmInput[pos].value != "") && kolInput[pos].value == "") {
				kolInput[pos].style.background = "rgba(255,0,0,0.3)";
			} else {
				kolInput[pos].style.background = "transparent";
			}

		}

		function clearItem(pos) {
			lmInput[pos].value = "";
			skuInput[pos].value = "";
			kolInput[pos].value = "";
			lmLabel[pos].innerHTML = "";
			skuLabel[pos].innerHTML = "";
			barcode[pos].innerHTML = "";
			nameLabel[pos].innerHTML = "";
			AVSLabel[pos].innerHTML = "";
			label2080[pos].innerHTML = "";
			kolInput[pos].style.background = "transparent";
			document.getElementById("clear_" + pos).style.display = "none";

		}

		function checkKol() {
			for (i = 0; i <= 2; i++) {
				if ((lmLabel[i].innerHTML != "" || skuLabel[i].innerHTML != "") && kolInput[i].value == "") {
					kolInput[i].style.background = "rgba(255,0,0,0.3)";
				} else {
					kolInput[i].style.background = "transparent";
				}
			}
		}
	</script>
</body>

</html>