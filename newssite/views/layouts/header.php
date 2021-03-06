<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Новини України</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/webroot/css/style.css">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Новини України</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Головна
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news/<?php echo $categories[0]['cat_name'];?>">Політика</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news/<?php echo $categories[1]['cat_name'];?>">Економіка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news/<?php echo $categories[2]['cat_name'];?>">Спорт</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news/<?php echo $categories[3]['cat_name'];?>">Технології</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/register">Реєстрація</a>
                </li>
                <?php if(User::isGuest()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/user/login">Вхід</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="/user/logout">Вихід</a>
                </li>
                <?php endif; ?>
                <<div class="dropdown open">
                    <a class="nav-link" data-toggle="dropdown" href="/user/login">Список</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                

            </ul>
        </div>
    </div>
</nav>