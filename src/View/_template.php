<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="apple-touch-icon" sizes="180x180" href="public/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="public/android-chrome-192x192.png">
        <link rel="icon" type="image/png" sizes="512x512" href="public/android-chrome-512x512.png">
        <link rel="icon" type="image/png" sizes="16x16" href="public/favicon-16x16.png">
        <link rel="icon" type="image/png" sizes="32x32" href="public/favicon-32x32.png">
        <link rel="icon" type="image/x-icon" href="public/favicon.ico">
        <link rel="manifest" href="public/site.webmanifest.json">
        <title>Angie Gray Admin</title>
    </head>
    <body>
        <?php
            if (isset($filepath))
            {
                include $filepath;
            }
        ?>
    </body>
</html>