<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Тест экстрасенсов</title>
</head>

<body>
<div class="p-3 mb-2 bg-light.bg-gradient text-dark">
    <?php
    foreach ($psychic as $value) : ?>
        <p>Уровень достоверности экстрасенса <?= $value->id; ?> : <?= $value->level; ?></p>
        <p>История догадок экстрасенса <?= $value->id; ?> :</p>
        <?php
        if ($value->get_history_answer()) : ?>
            <?php
            foreach ($value->get_history_answer() as $v) : ?>
                <?= $v; ?>;
            <?php
            endforeach; ?>
        <?php
        endif; ?>
        <hr>
    <?php
    endforeach; ?>


    <p>История загаданных чисел :</p>
    <?php
    if ($number->get_history_number()) : ?>
        <?php
        foreach ($number->get_history_number() as $value) : ?>
            <?= $value; ?>;
        <?php
        endforeach; ?>
    <?php
    endif; ?>
    <hr>

    <?php
    if ((!isset($_GET['riddle'])) and ($number->error === null)) : ?>
        <p>Загадайте двузначное число</p>
        <div class="d-grid gap-2 col-1 mx-auto">
            <a class="btn btn-primary btn-lg" href=index.php?riddle=true" role="button" formmethod="get">Загадал</a>
        </div>
    <?php
    else: ?>

        <?php
        foreach ($psychic as $value) : ?>
            <p>Догадка экстрасенса <?= $value->id; ?> : <?= $value->answer; ?></p>
            <hr>
        <?php
        endforeach; ?>

        <form action="index.php" method="post" class="row g-1">
            <div class="col-md-3">
                <label for="validationServer05" class="form-label">Введите ваше двузначное число:</label>
                <input type="text" name="number" class="form-control <?php
                if (!empty($number->error)): ?>is-invalid<?php
                endif; ?>" id="validationServer05"
                       aria-describedby="validationServer05Feedback" required>
                <div id="validationServer05Feedback" class="invalid-feedback">
                    <?php
                    if (!empty($number->error)) : ?>
                        <?= $number->error; ?>
                        <?php
                        $number->error = null;
                        ?>
                    <?php
                    endif; ?>
                </div>
            </div>
            <div class="d-grid gap-1 col-2 mx-auto">
                <button class="btn btn-primary btn-sm" type="submit">Отправить</button>
            </div>
        </form>

    <?php
    endif; ?>
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
-->
</body>
</html>