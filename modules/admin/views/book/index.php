<?php
use yii\widgets\ActiveForm;
/**
 * @var $provider
 * @var $model app\models\Book
 */

?>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">#</th>
        <th>Title</th>
        <th>Author</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <? $index = 1 ?>
        <? foreach ($provider->models as $model):?>
            <tr>
                <th scope="row"><?=$index++?></th>
                <td><?=$model->title?></td>
                <td><?=$model->author->fio?></td>
                <td>
                    <?php
                    $form = ActiveForm::begin([
                        'action' => 'delete',
                        'options' => ['method' => 'post', 'id' => 'delete_form_'.$model->id],
                    ]) ?>
                    <input type="hidden" name="id" value="<?=$model->id?>">
                    <?php ActiveForm::end() ?>
                    <a class="btn btn-danger btn-sm" role="button" onclick="if(confirm('Ishonchingiz komilmi?')) $('#delete_form_<?=$model->id?>').submit() ">Delete</a>
                    <a href="/web/admin/book/update?id=<?=$model->id?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true">Update</a>
                </td>
            </tr>
        <?endforeach;?>
    </tbody>
</table>
