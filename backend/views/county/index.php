<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Country;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CountySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Counties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="county-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create County', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            [
                'attribute'=>'country_id',
                'value' => 'country.name',
                'label' => 'Country',
                'filter'=>ArrayHelper::map(Country::find()->asArray()->all(), 'id', 'name'),
            ],
            'name',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
