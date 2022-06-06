<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert CSV file</title>
</head>

<body>

    <form action="/admin/upload" method="post" enctype="multipart/form-data">
        <select name="category">
            <?php foreach ($category as $c) { ?>
                <option value="<?= $c->getId() ?>"><?= $c->getName() ?></option>
            <?php } ?>
        </select>
        <select name="subcategory">
            <?php foreach ($subcategory as $s) { ?>
                <option value="<?= $s->getId() ?>"><?= $s->getName() ?></option>
            <?php } ?>
        </select>
        <input type="file" name="file" />
        <input type="submit" />
    </form>'

</body>

</html>