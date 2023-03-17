<!DOCTYPE html>
<html lang="en">
<head>
    <title>Table V04</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous">
    </script>
    <meta name="robots" content="noindex, follow">
</head>
<body>
<h2><?= $title ?></h2>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Вид дерево</th>
        <th scope="col">Общее кол-во собранных фруктов</th>
        <th scope="col">Общий вес собранных фруктов (<?= $massUnit ?>)</th>
        <th scope="col">Кол-во посаженых деревьев</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($fruits as $fruit): ?>
        <tr>
            <td><?= $fruit['name'] ?></td>
            <td><?= $fruit['total_fruit_count_by_type'] ?></td>
            <td><?= number_format($fruit['total_fruit_weight_by_type'], 0, '', ' ') ?></td>
            <td><?= $fruit['tree_count_by_type'] ?></td>
        </tr>
    <?php
    endforeach; ?>
    </tbody>
</table>
</body>
</html>