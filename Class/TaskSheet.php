<?php
declare(strict_types=1);
require_once dirname(__FILE__).'/Task.php';
//タスク用紙クラス
class TaskSheet{
    //タスクの配列
    public $tasks=[];

    //タスクを追加するメソッド
    public function addTask(Task $task):void
    {
        //insteadofでタスクのクラス型チェックを行なっている
        if ($task instanceof Task) {
            $this->tasks[] = $task;
        } else {
            throw new Exception('Task型のインスタンスしか追加できません。');
        }
        echo $task->name, 'を追加しました', PHP_EOL;
    }
    //タスクリストを表示するメソッド
    public function show():void
    {
        foreach($this->tasks as $task)
        {
            //完了済のタスクは、太字（ボールド体）で表示します。
            if($task->isCompleted())
            {
                echo'<b>',$task->getName(),'</b>',PHP_EOL;
            }else{
                echo$task->getName(),PHP_EOL;
            }
        }
    }
}