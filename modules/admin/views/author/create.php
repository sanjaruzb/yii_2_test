<?php
use yii\widgets\ActiveForm;

/**
 * @var $model \app\models\Author
 */
?>
<?php
    $form = ActiveForm::begin([
        'id' => 'create-form',
        'options' => ['method' => 'post'],
    ]) ?>
        <?= $form->field($model, 'fio') ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    <?php ActiveForm::end() ?>
</form>
