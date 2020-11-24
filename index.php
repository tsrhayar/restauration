<?php
include "./connect.php";
require "mail.php";

$stmt1 = $db->prepare("SELECT * FROM this_day WHERE id=1");
$stmt1->execute(array());
$row1 = $stmt1->fetch();

$oldDay = $row1["this_day"];
$today = date("Y-m-d");

if($oldDay != $today) {
    $stmt = $db->prepare("UPDATE this_day_number SET this_day_number=? WHERE id=1");
    $stmt->execute(array(rand(1,10)));

    $stmt = $db->prepare("UPDATE this_day SET this_day=? WHERE id=1");
    $stmt->execute(array($today));
}

$stmt2 = $db->prepare("SELECT * FROM this_day_number WHERE id=1");
$stmt2->execute(array());
$row2 = $stmt2->fetch();
$this_day_number = $row2["this_day_number"];

$stmt3 = $db->prepare("SELECT * FROM menu WHERE id=?");
$stmt3->execute(array($this_day_number));
$row3 = $stmt3->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    <title>YouLunch</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="row container mx-auto mb-5">
            <div class="col-md-6">
                <img src="./img/<?php echo $row3["id"] ?>.png" class="w-100" alt="">
            </div>
            <div class="col-md-6 d-flex flex-column">
                <h1 class="text-uppercase"><?php echo $row3["lunch_name"] ?></h1>
                <h2 class="text-uppercase"><?php echo $row3["lunch_price"] ?> DH</h2>
                <small class="text-muted mb-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid minus
                    officiis iste mollitia
                    laboriosam, consectetur dolorum id assumenda! Dolores veritatis earum quam tempore dolorum qui.
                    Eveniet facere perspiciatis a optio?
                </small>
                <a href="#form" class="btn btn-success mt-4 w-75 m-auto">Reserver Maintenant</a>
            </div>
        </div>

        <hr class="container">

        <?php 

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $client_name = $_POST['name'];
            $client_phone = $_POST['phone'];
            $client_adress = $_POST['adress'];

            $stmt4 = $db->prepare("INSERT INTO commande (  name, phone, email) VALUES (?, ?, ?)");
            $stmt4->execute(array($client_name, $client_phone, $client_adress));

            //PHP Mailer
            $mail->setFrom('tahasrhdev@gmail.com', 'Restaurant xxx');
            $mail->addAddress('tahasrhayar1@gmail.com');               // Name is optional
            $mail->Subject = 'Nouveau commande';
            $mail->Body    = 'Commande pour ' . $client_name . ' , <br> N° téléphone: ' . $client_phone . ' , <br> adress: ' . $client_adress . ' , <br> Plat: '  . $row3["lunch_name"] . '.';

            $mail->send();
            echo '<div class="container"><div class="alert alert-success" role="alert">Commande effectuée</div></div>';

        }
        
        ?>

        <h3 class="text-center mt-5">Resérvation</h3>

        <form class="container mb-5" id="form" method="post">
            <div class="form-group ">
                <label for="formGroupExampleInput">Nom et Prénom</label>
                <input type="text" class="form-control" name="name" id="formGroupExampleInput"
                    placeholder="Nom et Prénom" required autocomplete>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">N° Téléphone</label>
                <input type="phone" class="form-control" name="phone" id="formGroupExampleInput2"
                    placeholder="N° Téléphone" required autocomplete>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Adress</label>
                <input type="text" class="form-control" name="adress" id="formGroupExampleInput2" placeholder="Adress"
                    required autocomplete>
            </div>

            <button type="submit" class="btn btn-primary">Confirmer</button>
        </form>

    </main>

    <footer class=" p-5 bg-light">
        <div class="container">
            <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur exercitationem
                sit blanditiis animi, ut
                est ad tempora. Modi maiores, placeat, quos facilis expedita, culpa quibusdam dolor quae ipsa ipsum
                ratione
                animi. Ipsam dignissimos eveniet ipsum quos debitis, eius quam voluptate eaque temporibus enim hic
                aliquid
                accusamus? Ipsam perferendis dicta ad.</p>
        </div>

    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>