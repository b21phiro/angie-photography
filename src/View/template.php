<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= ($title ?? "") ?>Angie Gray Admin</title>
    </head>
    <body>
        <?php
            if (isset($filename))
            {
                include $filename;
            }
        ?>
    </body>
</html>