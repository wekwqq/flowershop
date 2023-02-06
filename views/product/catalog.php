<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Каталог товаров';
$this->params['breadcrumbs'][] = $this->title;?>
    <h1>Каталог товаров</h1>
    <div class="btn-group m-1">
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            По цене</button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="catalog?sort=price">По возрастанию</a></li>
            <li><a class="dropdown-item" href="catalog?sort=-price">По убыванию</a></li>
        </ul>
    </div>

    <div class="btn-group m-1">
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            По новизне</button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="catalog?sort=-time">Новые</a></li>
            <li><a class="dropdown-item" href="catalog?sort=time">Старые</a></li>
        </ul>
    </div>

    <div class="btn-group m-1">
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            По стране поставщика</button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="catalog?sort=contry">По возрастанию (А-Я)</a></li>
            <li><a class="dropdown-item" href="catalog?sort=-contry">По убыванию (Я-А)</a></li>
        </ul>
    </div>

    <div class="btn-group m-1">
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            По названию</button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="catalog?sort=name">По возрастанию (А-Я)</a></li>
            <li><a class="dropdown-item" href="catalog?sort=-name">По убыванию (Я-А)</a></li>
        </ul>
    </div>

    <div class="btn-group m-1">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Фильтр по категориям</button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="catalog?ProdSearch[id]=1">Цветы</a></li>
            <li><a class="dropdown-item" href="catalog?ProdSearch[id]=2">Упаковка</a></li>
            <li><a class="dropdown-item" href="catalog?ProdSearch[id]=3">Дополнительно</a></li>
        </ul>
    </div>

<?php $products=$dataProvider->getModels();
echo "<div class='d-flex flex-row flex-wrap justify-content-start align-items-end'>";
foreach ($products as $product){
    if ($product->count>0) {
        echo "<div class='card m-1' style='width: 22%; min-width: 300px;'>
 <a href='/product/view?id={$product->id}'><img src='{$product->image}'class='card-img-top' style='height: 300px; width: 300px;' alt='image'></a>
 <div class='card-body'>
 <h5 class='card-title'>{$product->name}</h5>
 <p class='text-danger'>{$product->price} руб</p>";
        echo (Yii::$app->user->isGuest ? "<a href='/product/view?id={$product->id}' class='btn btn-primary'>Просмотр товара</a>": "<p onclick='add_product({$product->id},1)' class='btn btn-primary'>Добавить в корзину</p>");
        echo "</div>
</div>";}
}
echo "</div>";
?>