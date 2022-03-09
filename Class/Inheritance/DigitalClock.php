<?php

declare(strict_types=1); 

require_once dirname(__FILE__) . '/Clock.php';

final class DigitalClock extends Clock
{
    // 文字色
    private $color;

    // 時間をセットする(オーバーライド)
    //fianlをつけることで継承またはオーバーライドさせないようにできる
    final public function setTime(int $time): void
    {
        if (date('H', $time) >= 6 && date('H', $time) <= 21) {
            // 6時～21時であれば文字色は「白」
            $this->color = 'white';
        } else {
            // それ以外の時間帯であれば文字色は「青」
            $this->color = 'blue';
        }
        $this->time = $time;
    }

    // 文字色を取得する
    public function getColor(): string
    {
        return $this->color;
    }

    // Clockクラスの抽象メソッドshow()は、サブクラスで必ず実装する
    public function show(): string
    {
        return date('H:i', $this->time);
    }
}
