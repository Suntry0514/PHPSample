<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>名前空間1 - honkaku</title>
</head>
<body>
<?php
    require_once dirname(__FILE__) . '/Office/Word/Writer.php';
    require_once dirname(__FILE__) . '/Office/Excel/Writer.php';
    require_once dirname(__FILE__) . '/Office/File.php';
    //まとめてインポート
    // use Office\{
    //     Excel\Writer as ExcelWriter,
    //     Word\Writer
    // };
    use Office\Excel\Writer as ExcelWriter;//あらかじめ使用する名前空間を指定する
    $writer = new ExcelWriter(); // ExcelのWriterクラスを使う
    $writer->write();

    //絶対パスで名前空間を指定
    $writer = new \Office\Word\Writer();
    $writer->write();

    //相対パスで名前空間を指定
    $file = new Office\File();
    $file->setWordProperty();
    $file->setExcelProperty();
?>
</body>
</html>
