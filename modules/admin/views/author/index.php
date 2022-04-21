<?php
use yii\widgets\ActiveForm;
/**
 * @var $provider
 * @var $model app\models\Author
 */

?>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">#</th>
        <th>FIO</th>
        <th>Books Count</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <? $index = 1 ?>
        <? foreach ($provider->models as $model):?>
            <tr>
                <th scope="row"><?=$index++?></th>
                <td><?=$model->fio?></td>
                <td><?=$model->getBooks()->count()?></td>
                <td>
                    <?php
                    $form = ActiveForm::begin([
                        'action' => 'delete',
                        'options' => ['method' => 'post', 'id' => 'delete_form'],
                    ]) ?>
                    <input type="hidden" name="id" value="<?=$model->id?>">
                    <?php ActiveForm::end() ?>
                    <a class="btn btn-danger btn-sm" role="button" onclick="if(confirm('Ishonchingiz komilmi?')) $('#delete_form').submit() ">Delete</a>
                    <a href="/web/admin/author/update?id=<?=$model->id?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true">Update</a>
                </td>
            </tr>
        <?endforeach;?>
    </tbody>
</table>
