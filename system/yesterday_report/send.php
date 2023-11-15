<?php
// データベース接続情報
$host = 'localhost'; // データベースホスト
$dbname = 'system_attendance'; // データベース名
$username = 'root'; // データベースユーザー名
$password = 'root'; // データベースパスワード

try {
    // PDOインスタンスを作成し、データベースに接続
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // エラーモードを例外モードに設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // フォームからのデータを受け取ります
    $work_id = $_POST["work_id"];
    $wakeup_time = $_POST["wakeup_time"];
    $departure_time = $_POST["departure_time"];

    // 画像データのアップロード
    if (isset($_FILES["route_image"]) && $_FILES["route_image"]["error"] == 0) {
        $image_tmp_name = $_FILES["route_image"]["tmp_name"];
        $image_data = file_get_contents($image_tmp_name);
        
        // データベースへのデータ挿入
        $stmt = $pdo->prepare("INSERT INTO yesterday_reports (work_id, wakeup_time, departure_time, image_data) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $work_id);
        $stmt->bindParam(2, $wakeup_time);
        $stmt->bindParam(3, $departure_time);
        $stmt->bindParam(4, $image_data, PDO::PARAM_LOB);
        
        if ($stmt->execute()) {
            echo "データがデータベースに保存されました。";
        } else {
            echo "データベースへの挿入エラー: " . $stmt->errorInfo()[2];
        }
    } else {
        echo "ファイルのアップロードエラーが発生しました。";
    }

} catch (PDOException $e) {
    // 接続エラーが発生した場合の処理
    echo "データベース接続エラー: " . $e->getMessage();
}
?>