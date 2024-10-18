<!DOCTYPE html>
<html lang="<?= \Phro\Web\Config\Env::Lang() ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= ($title ?? "") ?>Angie Gray Admin</title>
        <?php include __DIR__ . "/_includes/stylesheet.php"; ?>
        <?php include __DIR__ . "/_includes/favicon.php"; ?>
    </head>
    <body>
        <?php
            if (isset($filepath))
            {
                include $filepath;
            }
        ?>
        <?php include __DIR__ . "/_includes/scripts.php"; ?>
    </body>
</html>