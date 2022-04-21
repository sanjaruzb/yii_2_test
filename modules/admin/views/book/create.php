<?php
use yii\widgets\ActiveForm;

/**
 * @var $model \app\models\Author
 * @var $authors array
 */
?>
<?php
    $form = ActiveForm::begin([
        'id' => 'create-form',
        'options' => ['method' => 'post'],
    ]) ?>
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'author_id')->dropDownList($authors) ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    <?php ActiveForm::end() ?>
</form>
