<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="<?=app()->settings->getRootPath()?>/css/css.css">
   <header>
    <h2>Телефонная связь </h2>
    <div class="avatar"></div>
   </header>
   <title>Main site</title>
</head>
<body>
<div>
   <?= $content ?? ''; ?>
</div>
<footer></footer>
</body>
</html>
