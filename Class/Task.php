<?php
declare(strict_types=1);

class Task
{
    // 優先度を表す定数 ⇦オブジェクト定数
    //自クラス内からアクセス：self::PRIORITY_LOW
    //自クラス外からアクセス：クラス名::PRIORITY_HIGH
    public const PRIORITY_LOW = 0;
    public const PRIORITY_MIDDLE = 1;
    public const PRIORITY_HIGH = 2;
    
    //タスク名
    private $name;
    
    //優先度
    private $priority;
    
    //進行度
    private $progress;

    //コンストラクタ
    public function __construct(string $name, int $priority=1, int $progress=0){ 
        $this->name = $name;
        $this->priority = $priority;
        $this->progress = $progress;
    }

    public function getName():string{
        return $this->name;
    }

    public function setProgress(int $progress):void{
        if($progress < 0)
        {
            $this->progress = 0;
        }
        elseif($progress > 100)
        {
            $progress = 100;
        }
        $this->progress = $progress;
        
    }

    public function setPriority(int $priority):void{
        $this->priority = $priority;
    }
    

    public function isCompleted():bool
    {
        return $this->progress >= 100; //$progressが100以上なら真を返す
    }

    // 優先度を低～高の文字列で取得する
    public function getPriorityAsString(): string
    {
        switch ($this->priority) {
            case self::PRIORITY_LOW :
                return '低';
                break;
            case self::PRIORITY_MIDDLE :
                return '中';
                break;
            case self::PRIORITY_HIGH :
                return '高';
                break;
        }
    }
}