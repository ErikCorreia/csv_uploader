<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<body>

    <ul>
        <?php foreach ($services as $s) { ?>
            <span><?php echo $s->getName(); ?> </span> <span> Preço: <?php echo $s->getPrice() ?></span><br>
        <?php } ?>
    </ul>

</body>

</html>