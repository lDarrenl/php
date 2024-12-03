<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
            text-align: center;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
<?php

for ($i = 0; $i < 25; $i++) {
    echo $i . "<br>";
}

echo '<br> <br>'

?>

<?php
$i = 25;

while ($i > 0) {
    echo $i . "<br>"; 
    $i--; 
}

echo '<br> <br>'
?>

<?php
for ($i = 1; $i <= 25; $i++) { 
    for ($j = 1; $j <= $i; $j++) { 
        echo $j . " "; 
    }
    echo "<br>"; 
}

echo '<br> <br>'
?>

<?php
$somme = 0;

for ($i = 1; $i <= 30; $i++) {
    $somme += $i; 
}

echo "La somme des 30 premiers entiers est : " . $somme;

echo '<br> <br>'
?>

<?php
function EstPair($nombre) {
    return $nombre % 2 == 0;
}

if (isset($_POST['nombre'])) {
    $nombre = intval($_POST['nombre']);
    if (EstPair($nombre)) {
        echo "Le nombre $nombre est pair.";
    } else {
        echo "Le nombre $nombre est impair.";
    }
}
?>
    <form method="POST">
        <label for="nombre">Entrez un nombre :</label>
        <input type="number" id="nombre" name="nombre" required>
        <button type="submit">Vérifier</button>
    </form>

    <br> <br>

<?php
if (!function_exists('EstPair')) {
    function EstPair($nombre) {
        return $nombre % 2 == 0;
    }
}

for ($i = 1; $i <= 20; $i++) {
    if (EstPair($i)) {
        echo $i . "<br>";
    }
}

echo '<br> <br>'
?>

<?php
function calculerHypotenuse($b, $c) {
    return sqrt(($b ** 2) + ($c ** 2));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $b = floatval($_POST['b']);
    $c = floatval($_POST['c']);
    $hypotenuse = calculerHypotenuse($b, $c);
    echo "L'hypoténuse du triangle rectangle est : " . $hypotenuse;
}
?>
    <form method="POST">
        <label for="b">Entrez la longueur du côté b :</label>
        <input type="number" id="b" name="b" step="0.01" required>
        <br>
        <label for="c">Entrez la longueur du côté c :</label>
        <input type="number" id="c" name="c" step="0.01" required>
        <br>
        <button type="submit">Calculer l'hypoténuse</button>
    </form>

    <br> <br>

<?php
$heure = intval(date('H'));

if ($heure >= 5 && $heure < 12) {
    echo "C'est le matin.";
} elseif ($heure >= 12 && $heure < 18) {
    echo "C'est l'après-midi.";
} else {
    echo "C'est le soir.";
}


echo '<br> <br>'
?>

<?php
for ($i = 1; $i <= 100; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "foobar<br>";
    } elseif ($i % 3 == 0) {
        echo "foo<br>";
    } elseif ($i % 5 == 0) {
        echo "bar<br>";
    } else {
        echo $i . "<br>";
    }
}

echo '<br> <br>'
?>

<?php
$identitePersonne = [
    'nom' => 'Croft',
    'prenom' => 'Lara',
    'metier' => 'Archéologue'
];

echo "<h1>C'est un plaisir de vous voir {$identitePersonne['prenom']} {$identitePersonne['nom']}! ({$identitePersonne['metier']})</h1>";

echo '<br> <br>'
?>

<?php
$fighters = ['Zelda', 'Samus', 'Bowser', 'Peach', 'Lucina'];

foreach ($fighters as $fighter) {
    if (strlen($fighter) === 6) {
        echo $fighter . "<br>";
    }
}

echo '<br> <br>'
?>

<?php
$entiers = [];
for ($i = 0; $i < 10; $i++) {
    $entiers[] = rand(1, 100);
}

$min = min($entiers);

sort($entiers);

echo "Tableau généré : " . implode(", ", $entiers) . "<br>";
echo "La plus petite valeur est : " . $min . "<br>";
echo "Tableau trié par ordre croissant : " . implode(", ", $entiers);

echo '<br> <br>'
?>

    <table>
        <?php
        echo "<tr>";
        echo "<th></th>";
        for ($i = 1; $i <= 9; $i++) {
            echo "<th>$i</th>";
        }
        echo "</tr>";
        
        for ($i = 1; $i <= 9; $i++) {
            echo "<tr>";
            echo "<th>$i</th>";
            for ($j = 1; $j <= 9; $j++) {
                echo "<td>" . ($i * $j) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>


<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>