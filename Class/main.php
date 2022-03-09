<?php declare(strict_types=1);?>

<body>
<?php
    require_once dirname(__FILE__).'/Task.php';
    require_once dirname(__FILE__).'/TaskSheet.php';
    require_once dirname(__FILE__) . '/ExcelColumnConverter.php';

    //静的クラスの関数呼び出し
    echo ExcelColumnConverter::$fileName;
    echo ExcelColumnConverter::calcAlphabetColumnName(3).'<br>'; // 出力結果「D」
    echo ExcelColumnConverter::calcNumberColumnName('F').'<br>'; // 出力結果「5」

    $taskSheet = new TaskSheet();

    $task = new Task('パスポート更新');
    $task->setProgress(100);
    $taskSheet->addTask($task);
    $task->setPriority(Task::PRIORITY_HIGH);
    echo '優先度：', $task->getPriorityAsString();

    if($task->isCompleted() === true){
        echo $task->getName().'は完了しました。<br>'.PHP_EOL;
    }else{
        echo $task->getName().'は未完了です。<br>'.PHP_EOL;
    }

    echo 'タスクリストは以下です<br>';
    $taskSheet->show();
?>
</body>