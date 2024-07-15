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
    mail("hoge@fuga.com", "お問い合わせありがとうございます", $message );
    $_SESSION = array();
    $mode = "send";
  } else {
    $SESSION = array();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
<body>
  <?php if( $mode == "input" ){ ?>
    <!-- 入力画面 -->
    <form action="./contactform.php" method="post">
      名前 <input type="text" name="fullname" value="<?php echo $_SESSION["fullname"] ?>">
      Eメール <input type="email" name="email" value="<?php echo $_SESSION["email"] ?>">
      本文 <textarea name="message" id="" cols="" rows="" value="<?php echo $_SESSION["message"] ?>"></textarea>
      <input type="submit" name="confirm" value="確認" class="button">
    </form>
  <?php } else if( $mode == "confirm" ){ ?>
    <!-- 確認画面 -->
    <form action="./cotactform.php" method="post">
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
</body>
</html>
