<?php
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_d13_23_kadai;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//２．データ抽出SQL作成
$stmt = $pdo->prepare("SELECT * FROM ec_table");
$status = $stmt->execute();



//３．データ表示
$view="";
if($status==false) {
 //execute（SQL実行時にエラーがある場合）
 $error = $stmt->errorInfo();
 exit("ErrorQuery:".$error[2]);

} else {
 //Selectデータの数だけ自動でループしてくれる
 while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){

            $view .= '<li class="cart-list">';
            $view .= '<p class="cart-thumb"><img src="../img_sample/'.$res["fname"].'" width="200"></p>';
            $view .= '<h2 class="cart-title">'.$res["item"].'</h2>';
            $view .= '<p class="cart-price">'.$res["price"].'</p>';
            // $view .= '<p class="cart-number">1</p>'; //数量入れる場合
            // $view .= '<a href="#" class="btn-update">編集</a>';
            $view .= '<a href="#" class="btn-delete">削除</a>';
            $view .= '</li>';

 }

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/jquery.bxslider.css">
</head>
<body class="cms">
  <!--header-->
  <header class="header">
    <!-- <p class="site-title"><a href="#"><img src="../images/common/logo.png" alt="G's Academy Tokyo"></a></p> -->
  </header>
  <!--end header  -->

  <div class="outer">
    <h1 class="page-title page-title__cms">管理画面</h1>
    <div class="wrapper wrapper-main flex-parent">
      <main class="wrapper-main">
        <ul class="cart-products">
        <?php echo $view; ?>
        </ul>
      </main>
    </div>
  </div>

  <!--footer-->
  <footer class="footer">
    <div class="wrapper wrapper-footer">

      <div class="footer-widget__long">
        <!-- <p><a href="#"><img src="../images/common/logo.png" alt="g's academy tokyo"></a></p> -->
      </div>

      <div class="footer-widget">
        <ul class="nav-footer">
          <li class="nav-footer__item"><a href="#">Category</a></li>
          <li class="nav-footer__item"><a href="#">Category</a></li>
          <li class="nav-footer__item"><a href="#">Category</a></li>
          <li class="nav-footer__item"><a href="#">Category</a></li>
          <li class="nav-footer__item"><a href="#">Category</a></li>
        </ul>
      </div>

      <div class="footer-widget">
        <ul class="nav-footer">
          <li class="nav-footer__item"><a href="#">LOCAL DEPARTMENT STORE</a></li>
          <li class="nav-footer__item"><a href="#">Contact Us</a></li>
          <li class="nav-footer__item"><a href="#">Cart</a></li>
          <li class="nav-footer__item"><a href="#">Member Page</a></li>
        </ul>
      </div>

      <div class="footer-widget">
        <ul class="social-list">
          <li class="social-item"><a href="#"><img src="../images/common/facebook.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="../images/common/instagram.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="../images/common/twitter.png" alt=""></a></li>
        </ul>
      </div>

    </div>
    <p class="copyrights"><small>Copyrights LOCAL DEPARTMENT STORE All Rights Reserved.</small></p>
  </footer>
  <!--end footer-->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
</body>
</html>
