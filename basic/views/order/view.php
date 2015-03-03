<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;
use app\models\OrderSearch;
/* @var $this yii\web\View */
$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="view">
   <h1><?= Html::encode($this->title) ?></h1>
</div>
<?php Pjax::begin(); ?>

<?
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => []
    ]); 
    echo "Текущее время: " . date("Y-m-d H:i:s");
?>

<? Pjax::end();?>