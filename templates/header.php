<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/stylfe.css">
    <title>Список дел на PHP</title>
</head>

<body>

    <header>

        <nav class="navigation">
            <div>
                <ul>
                    <li class="li-nav"><a href="/">ГЛАВНАЯ</a></li>
                </ul>
            </div>
            <div>
                <ul class="ul-nav">
                    <?php if($this->userCheck['user'] === null): ?>
                    <li class="li-nav"><a href="/avto">ВОЙТИ</a></li>
                    <li class="li-nav"><a href="/reg">СОЗДАТЬ АКАУНТ</a></li>
                    <?php else: ?>
                    <span>|</span>
                    <a href="/logout">Выход</a>
                    <?php endif ?>
                </ul>
            </div>
        </nav>
    </header>

    <main>