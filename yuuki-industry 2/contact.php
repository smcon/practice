<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>株式会社　悠希工業</title>
  <meta name="description" content="お問い合わせ　お気軽にご連絡ください。">
  <link rel="icon" href="images/悠希 工業.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!--header-->
  <header id="header">
    <h1 class="site-title">
      <a href="#"><img src="images/logo.png" alt="株式会社悠希工業"></a>
    </h1>
    <nav id="navi">
      <ul>
        <li><a href="index.html">ホーム</a></li>
        <li><a href="about_us.html">会社案内</a></li>
        <li><a href="constaraction.html">施工実績</a></li>
        <li><a href="recruit.html">採用情報</a></li>
        <li><a href="recruit.html#news_link">お知らせ</a></li>
        <li><a href="contact.html">お問い合わせ</a></li>
      </ul>
    </nav>
  </header>  

  <!--ホーム-->
  <div id="home">
    <img src="images/top-Contact.png" alt="contact">
  </div>

 <!--お問い合わせフォーム-->
 <?php
session_start();
  $mode = "input";
  if( isset($_POST["back"] ) && $_POST["back"] ){
    // 何もしない
  } else if( isset($_POST["confirm"] ) && $_POST["confirm"] ){
    $_SESSION["fullname"] = $_POST["fullname"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["message"] = $_POST["message"];
    $mode = "confirm";
  } else if( isset($_POST["send"] ) && $_POST["send"] ){
    // 送信ボタンを押下
    $message = "お問い合わせを受け付けました\r\n"
             . "名前" . $_SESSION["fullname"] . "\r\n"
             . "email" . $_SESSION["email"] . "\r\n"
             . "お問い合わせ内容:\r\n"
             . preg_replace("/\r\n|\r|\n/", "\r\n", $_SESSION["message"] );
    mail($_SESSION["email"], "お問い合わせありがとうございます", $message );
    mail("zhixiaotian805@gmail.com", "お問い合わせありがとうございます", $message );
    $_SESSION = array();
    $mode = "send";
  } else {
    $_SESSION = array();
  }
?>


<?php if( $mode == "input" ){ ?>
    <!-- 入力画面 -->
    <form action="./contact.php" method="post">
      名前 <input type="text" name="fullname" value="<?php echo $_SESSION["fullname"] ?>">
      Eメール <input type="email" name="email" value="<?php echo $_SESSION["email"] ?>">
      本文 <textarea name="message" id="" cols="" rows="" value="<?php echo $_SESSION["message"] ?>"></textarea>
      <input type="submit" name="confirm" value="確認" class="button">
    </form>
  <?php } else if( $mode == "confirm" ){ ?>
    <!-- 確認画面 -->
    <form action="./contact.php" method="post">
      名前 <?php echo $_SESSION["fullname"] ?>
      Eメール <?php echo $_SESSION["email"] ?>
      本文 <?php echo nl2br($_SESSION["message"]) ?>
      <input type="submit" name="back" value="戻る" />
      <input type="submit" name="send" value="送信" />
    </form>
  <?php } else { ?>
    <!-- 完了画面 -->
    送信しました。お問い合わせありがとうございました。
  <?php } ?>

  <!--問い合わせフォームここまで--> 
  
  <!--CONTACT-->
  <div id="contact">
    <div class="text">
    <h2><span>CONTACT<br>お問い合わせ</span></h2>
    </div>
    <div class="text">
      <h3>電話でのお問い合わせ</h3>
      <h3>TEL 000-0000-0000</h3>
      <span></span>
      <h3>メールでのお問い合わせ</h3>
      <div class="botton">
      <a href="contact.html" class="btn bgleft"><span>CONTACT<br>お問い合わせ</span></a>
      </div>
    </div>
  </div>
    <!--footer-->
    <footer id="footer">
      <div class="footer_navi">
        <h2><a href="#">株式会社　悠希工業</a></h2>
        <h4><a href="#">兵庫県姫路市の橋梁施工会社</a></h4>
        <h3>&#12306;671-1107<br>兵庫県姫路市広畑区城山町2-21</h3>
        <h3>TEL : 079-237-5613</h3>
      </div>
      <div class="footer_navi">
        <ul>
          <li><a href="index.html">ホーム</a></li>
          <li><a href="about_us.html">会社案内</a></li>
          <li><a href="constaraction.html">施工実績</a></li>
          <li><a href="recruit.html">採用情報</a></li>
          <li><a href="recruit.html">お知らせ</a></li>
          <li><a href="contact.html">お問い合わせ</a></li>
        </ul>
      </div>
    </footer>
</body>
</html>