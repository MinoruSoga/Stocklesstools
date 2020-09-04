<?php 
require_once 'class/User.php';
$user = new User;

?>
<!DOCTYPE html>
<html lang="ja">
  <?php include('head.php'); ?>
  <body>
    <?php include('header.php'); ?>
    <h1>One Point</h1>
    <section id="search">
      <h2>絞り込み検索</h2>
      <div class="container-fluid">
      <form>
        <div class="form-row">
          <div class="form-group col-xl-2">
            <label for="shop">ショップ</label>
            <select id="shop" class="form-control">
              <option selected>未選択</option>
              <option>楽天</option>
              <option>アマゾン</option>
              <option>Yahooショップ</option>
            </select>
          </div>
          <div class="form-group col-xl-2">
            <label for="ranking">ランキング</label>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" id="ranking" placeholder="下限">
              </div>
              ~
              <div class="col">
                <input type="text" class="form-control" id="ranking" placeholder="上限">
              </div>
            </div>
          </div>
          <div class="form-group col-xl-1">
            <label for="new_get">新着/取得</label>
            <select id="new_get" class="form-control">
              <option selected>未指定</option>
              <option>...</option>
            </select>
          </div>
          <div class="form-group col-xl-1">
            <label for="category">カテゴリ</label>
            <select id="category" class="form-control">
              <option selected>未指定</option>
              <option>...</option>
            </select>
          </div>
          <div class="form-group col-xl-1">
            <label for="favorite">お気に入り</label>
            <select id="favorite" class="form-control">
              <option selected>未指定</option>
              <option>...</option>
            </select>
          </div>
          <div class="form-group col-xl-1">
            <label for="asin">ASIN</label>
            <input type="text" id="asin" class="form-control">
          </div>
          <div class="form-group col-xl-2">
            <label for="jan">JAN</label>
            <input type="text" id="jan" class="form-control">
          </div>
          <div class="form-group col-xl-2">
            <label for="product_name">商品名</label>
            <input type="text" id="product_name" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-xl-2">
            <label for="profit">利益額(円)</label>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" id="profit" placeholder="下限">
              </div>
              ~
              <div class="col">
                <input type="text" class="form-control" id="profit" placeholder="上限">
              </div>
            </div>
          </div>
          <div class="form-group col-xl-2">
            <label for="profit_rate">利益率(%)</label>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" id="profit_rate" placeholder="下限">
              </div>
              ~
              <div class="col">
                <input type="text" class="form-control" id="profit_rate" placeholder="上限">
              </div>
            </div>
          </div>
          <div class="form-group col-xl-2">
            <label for="new_seller">新品出品者</label>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" id="new_seller" placeholder="下限">
              </div>
              ~
              <div class="col">
                <input type="text" class="form-control" id="new_seller" placeholder="上限">
              </div>
            </div>
          </div>
          <div class="form-group col-xl-2">
            <label for="ec_price">ECサイト価格帯</label>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" id="ec_price" placeholder="下限">
              </div>
              ~
              <div class="col">
                <input type="text" class="form-control" id="ec_price" placeholder="上限">
              </div>
            </div>
          </div>
          <div class="form-group col-xl-2">
            <label for="amazon_lowest_price">Amazon最安値</label>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" id="amazon_lowest_price" placeholder="下限">
              </div>
              ~
              <div class="col">
                <input type="text" class="form-control" id="amazon_lowest_price" placeholder="上限">
              </div>
            </div>
          </div>
          <div class="form-group col-xl-2">
            <label for="amazon_cart_value">Amazonカート値</label>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" id="amazon_cart_value" placeholder="下限">
              </div>
              ~
              <div class="col">
                <input type="text" class="form-control" id="amazon_cart_value" placeholder="上限">
              </div>
            </div>
          </div>
        </div>

        <h2>ソート</h2>
        <div class="form-row">
          <div class="form-group col-md-4">
            <select id="sort" class="form-control">
              <option>利益益順</option>
              <option>更新時間順</option>
              <option>ランキング順</option>
              <option>登録日新しい順</option>
              <option>利益順</option>
              <option>発売日新しい順</option>
              <option>発売日古い順</option>
            </select>
          </div>
          <button type="submit" class="btn btn-danger">抽出</button>
          <button type="clear" class="btn btn-primary">条件クリア</button>
        </div>
      </form>
      </div>
    </section>
  

</body>
</html>