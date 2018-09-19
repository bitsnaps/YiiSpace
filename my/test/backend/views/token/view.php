<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var my\test\common\models\Token $model
*/
$copyParams = $model->attributes;

$this->title = $model->getAliasModel() . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => $model->getAliasModel(true), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->user_id, 'url' => ['view', 'user_id' => $model->user_id, 'code' => $model->code, 'type' => $model->type]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="giiant-crud token-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= $model->getAliasModel() ?>        <small>
            <?= $model->user_id ?>        </small>
    </h1>


    <div class="clearfix crud-navigation">
        <!-- menu buttons -->
        <div class='pull-left'>
            <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'user_id' => $model->user_id, 'code' => $model->code, 'type' => $model->type],['class' => 'btn btn-info']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-copy"></span> ' . Yii::t('app', 'Copy'), ['create', 'user_id' => $model->user_id, 'code' => $model->code, 'type' => $model->type, 'Token            '=>$copyParams],['class' => 'btn btn-success']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New'), ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'Full list'), ['index'], ['class'=>'btn btn-default']) ?>
        </div>

    </div>


    <?php $this->beginBlock('my\test\common\models\Token'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
    // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::attributeFormat
[
    'format' => 'html',
    'attribute' => 'user_id',
    'value' => ($model->getUser()->one() ? Html::a($model->getUser()->one()->id, ['crud/user/view', 'id' => $model->getUser()->one()->id,]) : '<span class="label label-warning">?</span>'),
],
        'code',
        'created_at',
        'type',
    ],
    ]); ?>

    
    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'user_id' => $model->user_id, 'code' => $model->code, 'type' => $model->type],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<b class=""># '.$model->user_id.'</b>',
    'content' => $this->blocks['my\test\common\models\Token'],
    'active'  => true,
], ]
                 ]
    );
    ?>
</div>