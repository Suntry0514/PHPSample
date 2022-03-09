
<?php
#※phpだけが書かれたファイルはphpタグを閉じない！

#require：外部ファイルを読み込み、嫁込めなければ処理を中止
#require_once：外部ファイルが既に読み込まれていない場合のみ、require命令を実行する
#include：外部ファイルを読み込み、読み込めなくても処理を継続
#include_once：外部ファイルが既に読み込まれていない場合のみ、include命令を実行する
#※includeは基本的にHTMLファイルを読み込むときに使用する
#例： require ファイル名;
/**生年月日をもとに年齢を計算して返す関数 */
function calcAge(int $birthday):int
{
    return (int)((date('Ymd') - $birthday) / 10000);
}