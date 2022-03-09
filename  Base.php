<?php
    //厳密な方チェックを行うようにする。このチェックはプログラムファイル単位でしか適用されない。
    //⇨宣言していない別ファイルで呼び出した場合、適用されない。
    //⇨全てのファイルで定義する必要がある
    declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //PHP設定情報確認
    //phpinfo();
    //プログラムミスに気づきやすくなる設定
    //ini_set('display_errors', 'On');
    //ini_set('error_reporting', E_ALL & ~E_NOTICE);

    //変数の内容を出力する方法
    //print_r(変数)：戻り値あり
    //var_export(変数)：戻り値あり
    //var_dump(変数)：戻り値なし

#http://192.168.64.2/project/sample.php
      /**変数の情報取得 */
    $money = 100;
    var_dump($money);
    /**変数の文字列の結合 */
    $val = 'World!';
    echo 'Hello,'.$val.'!<br>';
    echo "Hellow,${val}<br>";
    
    /**改行コード  web上で表示される際は改行されない。あくまで、デバイス上での表示でwindowsとlinuxなどOSの差異を気にしなくするためのもの
    */
    $mailBody = "お問い合わせを受け付けました。".PHP_EOL;
    $mailBody .= "ありがとうございました。";
    echo $mailBody;
    
    /**配列 */
    echo "<br>配列<br>";
    $week_name = ['日','月','火','水','木','金','土'];
    $week = date('w');//今日の曜日が数字でリターンされる
    echo "今日の曜日は、$week_name[$week]曜日です。<br>";
    print_r($week_name);
    echo '<br>連想配列<br>';
    $fruits=[
        'Apple' => 'りんご',
        'Lemon' => 'レモン',
        'Peach' => 'もも'
    ];
    echo $fruits['Apple'] . "<br>";
    
    //要素数を取得
    count($week_name);
    
    //list() 配列の各要素を変数に割り当てる　スカラー変数
    $userData=[12345,'TarouYamada','Tokyo',32];
    list($id,$name,$prefecture,$age)=$userData;
    echo $id;
    $today='2019-03-16';
    list($year, $month, $day) = explode('-',$today);
    
    //定数
    define('TAX', 0.08);
    
    //参照渡し
    $greeting1 = 'Hello';
    $greeting2 = &$greeting1;
    $greeting1 = 'World';

    //宇宙船演算子 一度の処理で大小を判定できる
    $point = 85;
    var_dump($point <=> 85);//0
    var_dump($point <=> 70);//1
    var_dump($point <=> 85);//-1
    
    //null合体演算子
    $a = null;
    echo $a ?? '<br>default value<br>';

    //switch文 データ型の比較は「===」でなく「==」で比較している
    switch($point)
    {
      case 90:
          //処理A
          break;
      
      case 50:
          //処理B
          break;
      default:
          //処理C
    }
    //強制終了
    //exit(ステータスコード)
    //die('エラーメッセージ') 

    $week_name = ['日','月','火','水','木','金','土'];
    foreach($week_name as $week)
    {
        echo "<p>${week}</p>";
    }
    $fruits=[
      'Apple' => 'りんご',
      'Lemon' => 'レモン',
      'Peach' => 'もも'
    ];

    foreach($fruits as $key => $value)
    {
        echo "<dt>$key</dt>";
        echo "<dd>$value</dd>";
    };
    
    //リファレンス渡し array_walkでも対応可能
    $numbers = [3,5,-1,2];
    foreach ( $numbers as &$number){
        if($number < 0){
            $number = 0;
        }
    }
    //※必ずunset命令でリファレンスを削除する。リファレンス渡しで上書き可能なのは値のみ。キーは上書きできない。
    unset($number);

    //＊＊＊＊＊＊＊＊関数＊＊＊＊＊＊＊＊
    function add($a, $b)
    {
        $total = $a + $b;
        return $total;
    }

    $num1=10;
    //関数　リファレンス渡し グローバルスコープ
    function add2($a, $b, &$errormsg)
    {
        if(is_numeric($a) && (int)$a)
        {
            return $errormsg='(エラー：１番目の引数が正の整数ではありません。)';
        }
        //関数外の変数を使用する
        global $num;
        return $a + $b + $num;
    }

    //?をつけることでnullを許容している。 ...$varで可変長引数リストになる
    function doSomething(int $num, ?string $msg="message", string ...$msg2):?bool
    {
        return true;
    }

    //クロージャー(名前を持たない関数)。引数として記述することができる
    $greeting='Good';
    //use：クロージャー外のスコープで定義された変数を参照する際に使用する。
    //※useで引き継がれるのは関数が定義されて時点の値のみ。
    //⇨Beautifulは値として引き継がれない。
    $greetingMaker = function($time)use($greeting)
    {   
        print $greeting.' '.$time."<br>";
    };

    $greetingMaker('Morning');

    //下記の出力はGood Eveningになる
    $greeting='Beautiful';
    $greetingMaker('Evening');

    function printCalc(callable $equation):void
    {
        print $equation(2,4,5);
    }

    printCalc(function (int ...$nums)
    {
        return array_sum($nums);
    });

    //外部ファイルの読み込み
    require dirname('__FILE__').'/Functions.php';
    echo "<br>".calcAge(19950512)."歳<br>";

    ?>
</body>
</html>