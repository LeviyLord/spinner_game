<?php

/**
 * @var $this yii\web\View
 * @var UserWon $userWon
 * @var boolean $showAmount
 */

$this->title = 'My Yii Application';

use frontend\models\UserWon;

$amount = $showAmount ? $userWon->amount : '';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Поздравляем! Ваш приз: <?= $userWon->balance->title . ' ' . $amount ?></h1>

        <p class="lead">Вы можете попробовать забрать приз, ведь колличество ограничено или отказаться от него, также
            если приз денежный, его можно конвертировать в бонусы.</p>

        <p>
            <?php if ($userWon->prize_id == 1): ?>
            <a class="btn btn-lg btn-success" href="/spinner/convert?userWonId=<?= $userWon->id ?>"">Конвертировать в бонусы</a>
            <? endif; ?>
            <a class="btn btn-lg btn-success" href="/spinner/accept?userWonId=<?= $userWon->id ?>">Принять</a>
            <a class="btn btn-lg btn-success" href="/spinner/cancel?userWonId=<?= $userWon->id ?>"">Отказаться</a></p>
    </div>

</div>
</div>
