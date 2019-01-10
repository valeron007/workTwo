<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formuls</title>
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">

	<script src="js/jquery.slim.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
<?php
session_start();
require_once (realpath(dirname(__FILE__)) . '/../db/User.php');
$user = new User();
$userData = $user->getUserByName("Valeron");
$_SESSION['user'] = $userData['name'];
?>
<header class="wrap">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-9">

                </div>
                <div class="col-3 user-info">
                    <div class="card border-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Вы зарегестрированы как</div>
                        <div class="card-body text-primary">
                            <h4 class="card-title login-user"><?php echo isset($_SESSION['user']) ? $_SESSION['user'] : 'nobody'; ?></h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
