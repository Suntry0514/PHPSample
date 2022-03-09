<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>インターフェース1 - honkaku</title>
</head>
<body>
<?php
    require_once dirname(__FILE__) . '/Bird.php';
    require_once dirname(__FILE__) . '/Sky.php';

    $bird = new Bird();
    $bird->fly();
    $bird->walk();

    // 空を用意する
    $sky = new Sky();
    $sky->draw($bird);
?>
</body>
</html>