<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <!-- exo 1 -->

    <h2>exo 1</h2>

    <div class='box'>
        <form method="get" action="">
            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville" required>
            <label for="transport">Transport :</label>
            <input type="text" id="transport" name="transport" required>
            <button type="submit">Envoyer</button>
        </form>

        <?php
        if (isset($_GET['ville']) && isset($_GET['transport'])) {
            $ville = htmlspecialchars($_GET['ville']);
            $transport = htmlspecialchars($_GET['transport']);
            echo "<p>La ville choisie est $ville et le voyage se fera en $transport !</p>";
        }

        ?>

    </div>

    
    <!-- exo 2 -->
    <h2>exo 2</h2>

    <div class='box'>  
        <form method="get" action="">
            <label for="animal">Votre animal préféré :</label>
            <input type="text" id="animal" name="animal" required>
            <button type="submit">Envoyer</button>
        </form>

        <?php
        if (isset($_GET['animal'])) {
            $animal = htmlspecialchars($_GET['animal']);
            echo "<p>Votre animal choisi est : $animal</p>";
        }

        ?>
    </div>
    
    
    <!-- exo 3 -->
    <h2>exo 3</h2>

    <div class='box'>

    <?php
    if (isset($_POST['pseudo']) && isset($_POST['couleur'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $couleur = htmlspecialchars($_POST['couleur']);
        echo "<div style='width: 100%; height: 100px; background-color: $couleur; border: 1px solid #000; display: flex; align-items: center; justify-content: center;'>
            <p style='color: #fff; margin: 0;'>Bienvenue, $pseudo !</p>
          </div>";
}
    ?>

    <form method="post" action="">
        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" required>
        
        <label for="couleur">Choisissez une couleur :</label>
        <select id="couleur" name="couleur" required>
            <option value="red">Rouge</option>
            <option value="blue">Bleu</option>
            <option value="green">Vert</option>
        </select>
        
        <button type="submit">Envoyer</button>
    </form>

    <br>

    </div>

    <br><br>

    <!-- exo 4 -->
    <h2>exo 4</h2>
    

    <div class='box'>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'])) {
            $nombre = intval($_POST['nombre']);
            if ($nombre % 6 !== 0 || $nombre <= 0) {
                header("Location: ?error=invalid");
                exit;
            }

            $resultats = [];
                $resultats[] = rand(1, $nombre);
            echo "<p>Résultats des dés : " . implode(", ", $resultats) . "</p>";
            exit;
        }

        if (isset($_GET['error']) && $_GET['error'] === 'invalid') {
            echo "<p style='color: red;'>Erreur : Le nombre doit être un multiple de 6 et supérieur à 0.</p>";
        }
        ?>

        <form method="post" action="">
            <label for="nombre">Nombre de dés (multiple de 6) :</label>
            <input type="number" id="nombre" name="nombre" required>
            <button type="submit">Lancer les dés</button>
        </form>

        <br>
    </div>

    <!-- exo 5 -->
    <h2>exo 5</h2>
    <div class='box'>
        <?php
        $hashedPassword = password_hash('1234', PASSWORD_DEFAULT);

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = $_POST['password'];

            if ($username === 'admin' && password_verify($password, $hashedPassword)) {
                header('Location: welcome.php'); 
                exit;
            } else {
                $error = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }
        ?>

            <form method="post" action="" style="text-align: center; margin-top: 20px;">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required><br><br>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required><br><br>

                <button type="submit">Se connecter</button>
            </form>

            <?php if (isset($error)): ?>
                <p style="color: red; text-align: center;"><?= $error ?></p>
            <?php endif; ?>

    </div>

     <!-- exo 6 -->
     <h2>exo 6</h2>
    
    <div class='box'>
        <?php
        $resultat = null;

        if (isset($_POST['nombre1'], $_POST['nombre2'], $_POST['operation'])) {
            $nombre1 = floatval($_POST['nombre1']);
            $nombre2 = floatval($_POST['nombre2']);
            $operation = $_POST['operation'];

            switch ($operation) {
                case 'addition':
                    $resultat = $nombre1 + $nombre2;
                    break;
                case 'soustraction':
                    $resultat = $nombre1 - $nombre2;
                    break;
                case 'multiplication':
                    $resultat = $nombre1 * $nombre2;
                    break;
                case 'division':
                    if ($nombre2 != 0) {
                        $resultat = $nombre1 / $nombre2;
                    } else {
                        $resultat = "Erreur : Division par zéro.";
                    }
                    break;
                default:
                    $resultat = "Opération invalide.";
            }
        }
        ?>

            <form method="post" action="" style="text-align: center; margin-top: 20px;">
                <label for="nombre1">Nombre 1 :</label>
                <input type="number" id="nombre1" name="nombre1" step="any" required><br><br>

                <label for="nombre2">Nombre 2 :</label>
                <input type="number" id="nombre2" name="nombre2" step="any" required><br><br>

                <label for="operation">Opération :</label>
                <select id="operation" name="operation" required>
                    <option value="addition">Addition</option>
                    <option value="soustraction">Soustraction</option>
                    <option value="multiplication">Multiplication</option>
                    <option value="division">Division</option>
                </select><br><br>

                <button type="submit">Calculer</button>
            </form>

            <?php if ($resultat !== null): ?>
                <p style="text-align: center; margin-top: 20px;">
                    Résultat : <?= is_numeric($resultat) ? number_format($resultat, 2) : $resultat ?>
                </p>
            <?php endif; ?>

    </div>

    <!-- exo 7 -->
    <h2>exo 7</h2>
    
    <div class='box'>
        <?php
        $conversionResult = null;

        $exchangeRates = [
            'usd' => 1.1, 
            'gbp' => 0.85, 
            'jpy' => 130.0 
        ];

        if (isset($_POST['montant'], $_POST['devise'])) {
            $montant = floatval($_POST['montant']);
            $devise = $_POST['devise'];

            if (isset($exchangeRates[$devise])) {
                $conversionResult = $montant * $exchangeRates[$devise];
            } else {
                $conversionResult = "Devise invalide.";
            }
        }
        ?>

            <form method="post" action="" style="text-align: center; margin-top: 20px;">
                <label for="montant">Montant en euros :</label>
                <input type="number" id="montant" name="montant" step="any" required><br><br>

                <label for="devise">Choisissez la devise :</label>
                <select id="devise" name="devise" required>
                    <option value="usd">Dollar Américain (USD)</option>
                    <option value="gbp">Livre Sterling (GBP)</option>
                    <option value="jpy">Yen Japonais (JPY)</option>
                </select><br><br>

                <button type="submit">Convertir</button>
            </form>

            <?php if ($conversionResult !== null): ?>
                <p style="text-align: center; margin-top: 20px;">
                    Résultat : <?= is_numeric($conversionResult) ? number_format($conversionResult, 2) . " " . strtoupper($_POST['devise']) : $conversionResult ?>
                </p>
            <?php endif; ?>

    </div>

    <!-- exo 8 -->
    <h2>exo 8</h2>
    
    <div class='box'>
        <?php
        $score = null;

        if (isset($_POST['q1'], $_POST['q2'], $_POST['q3'])) {
            $score = 0;

            if ($_POST['q1'] === 'b') {
                $score++;
            }
            if ($_POST['q2'] === 'a') {
                $score++;
            }
            if ($_POST['q3'] === 'd') {
                $score++;
            }
        }
        ?>

            <form method="post" action="" style="text-align: center; margin-top: 20px;">
                <h3>Question 1 : Quelle est la capitale de la France ?</h3>
                <label><input type="radio" name="q1" value="a" required> Berlin</label><br>
                <label><input type="radio" name="q1" value="b"> Paris</label><br>
                <label><input type="radio" name="q1" value="c"> Madrid</label><br>
                <label><input type="radio" name="q1" value="d"> Rome</label><br><br>

                <h3>Question 2 : Quelle est la plus grande planète du système solaire ?</h3>
                <label><input type="radio" name="q2" value="a" required> Jupiter</label><br>
                <label><input type="radio" name="q2" value="b"> Mars</label><br>
                <label><input type="radio" name="q2" value="c"> Saturne</label><br>
                <label><input type="radio" name="q2" value="d"> Vénus</label><br><br>

                <h3>Question 3 : Quelle est la formule chimique de l'eau ?</h3>
                <label><input type="radio" name="q3" value="a" required> CO2</label><br>
                <label><input type="radio" name="q3" value="b"> CH4</label><br>
                <label><input type="radio" name="q3" value="c"> O2</label><br>
                <label><input type="radio" name="q3" value="d"> H2O</label><br><br>

                <button type="submit">Valider</button>
            </form>

            <?php if ($score !== null): ?>
                <p style="text-align: center; margin-top: 20px;">
                    Vous avez obtenu un score de <?= $score ?>/3.
                    <?= $score === 3 ? "Félicitations, vous avez tout juste !" : "Essayez encore !" ?>
                </p>
            <?php endif; ?>

    </div>

    <!-- exo 9 -->
    <h2>exo 9</h2>
    
    <div class='box'>
        <?php
        

        if (!isset($_SESSION['mystery_number'])) {
            $_SESSION['mystery_number'] = rand(0, 1000);
            $_SESSION['attempts'] = 0;
        }

        $message = null;

        if (isset($_POST['guess'])) {
            $guess = intval($_POST['guess']);
            $_SESSION['attempts']++;

            if ($guess < $_SESSION['mystery_number']) {
                $message = "Le nombre que vous proposez est trop petit.";
            } elseif ($guess > $_SESSION['mystery_number']) {
                $message = "Le nombre que vous proposez est trop grand.";
            } else {
                $message = "Félicitations ! Vous avez trouvé le nombre mystère en {$_SESSION['attempts']} essais.";
                unset($_SESSION['mystery_number']);
                unset($_SESSION['attempts']);
            }
        }
        ?>

            <form method="post" action="" style="text-align: center; margin-top: 20px;">
                <label for="guess">Devinez le nombre (entre 0 et 1000) :</label>
                <input type="number" id="guess" name="guess" required><br><br>
                <button type="submit">Proposer</button>
            </form>

            <?php if ($message): ?>
                <p style="text-align: center; margin-top: 20px;"><?= $message ?></p>
            <?php endif; ?>

    </div>

    <!-- exo 10 -->
    <h2>exo 10</h2>
    
    <div class='box'>
        <?php
        $message = null;
        $imagePath = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
            $file = $_FILES['image'];
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($file['type'], $allowedTypes)) {
                if ($file['error'] === UPLOAD_ERR_OK) {
                    $uniqueName = uniqid() . "-" . basename($file['name']);
                    $uploadDir = 'uploads/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
                    $uploadPath = $uploadDir . $uniqueName;
                    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                        $message = "Image uploadée avec succès !";
                        $imagePath = $uploadPath;
                    } else {
                        $message = "Erreur lors du déplacement du fichier.";
                    }
                } else {
                    $message = "Erreur lors de l'upload : " . $file['error'];
                }
            } else {
                $message = "Le fichier n'est pas une image valide.";
            }
        }
        ?>

            <form method="post" action="" enctype="multipart/form-data" style="text-align: center; margin-top: 20px;">
                <label for="image">Choisissez une image :</label>
                <input type="file" id="image" name="image" accept="image/*" required><br><br>
                <button type="submit">Uploader</button>
            </form>

            <?php if ($message): ?>
                <p style="text-align: center; margin-top: 20px;"><?= $message ?></p>
            <?php endif; ?>

            <?php if ($imagePath): ?>
                <div style="text-align: center; margin-top: 20px;">
                    <img src="<?= htmlspecialchars($imagePath) ?>" alt="Image uploadée" style="max-width: 300px;">
                </div>
            <?php endif; ?>

    </div>


</body>
</html>