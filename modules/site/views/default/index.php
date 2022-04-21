<?php
use yii\widgets\ActiveForm;
/**
 * @var $provider
 * @var $model app\models\Author
 * @var $book \app\models\Book
 */

?>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">#</th>
        <th>FIO</th>
        <th>Books</th>
    </tr>
    </thead>
    <tbody>
    <? $index = 1 ?>
    <? foreach ($provider->models as $model):?>
        <tr>
            <th scope="row"><?=$index++?></th>
            <td><?=$model->fio?></td>
            <td>
                <? foreach ($model->books as $book):?>
                    <?=$book->title?>,
                <? endforeach;?>
            </td>
        </tr>
    <?endforeach;?>
    </tbody>
</table>
