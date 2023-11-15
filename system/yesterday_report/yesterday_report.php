<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>朝確システム-前日報告フォーム</title>
</head>
<body>
<form method="post" action="send.php" enctype="multipart/form-data">
  <div>案件ID</div>
  <input type="text" name="user_name" required>
  <div>起床予定時間</div>
  <input type="time" name="wakeup_time" required>
  <div>出発予定時間</div>
  <input type="time" name="departure_time" required>
  <div>経路画像（電車のスクリーンショット）</div>
  <input type="file" name="route_image" accept="image/*" required>
  <div>
    <input type="submit" value="送信">
  </div>
</form>
</body>
</html>