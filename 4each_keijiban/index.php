<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>4eachblog 掲示板</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php

    mb_internal_encoding("utf8");
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","mysql");
    $stmt = $pdo->query("select * from 4each_keijiban");
    
    ?>
    <header>
        <div>
        <img src="4eachblog_logo.jpg">
        </div>
        <div class="nav">
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>4eachについて</li>
                <li>登録フォーム</li>
                <li>お問い合わせ</li>
                <li>その他</li>
            </ul>
        </div>
        
    </header>
    <main>
        <div class="column">
            <div class="column-left">
                <h1>プログラミングに役立つ掲示板</h1>
                <form method="post" action="insert.php">
                    <h2>入力フォーム</h2>
                    <div>
                    <label>ハンドルネーム</label>
                    <br>
                    <input type="text" name="handlename" class="text-box ">
                    </div>
                    <div>
                    <label>タイトル</label>
                    <br>
                    <input type="text" name="title" class="text-box">
                    </div>
                    <div>
                    <label>コメント</label>
                    <br>
                    <textarea name="comments"cols="50" rows="7" class="text-box"></textarea>
                    </div>
                    <input type="submit" class="submit">
                </form>
                <?php
                while ($row = $stmt->fetch()){

                    echo "<div class='article'>";
                    echo "<h3>".$row['title']."</h3>";
                    echo "<div class='contents'>";
                    echo $row['comments'];
                    echo "<div class='handlename'>posted by ".$row['handlename']."</div>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
                
            </div>
            <div class="column-right">
                <h2>人気の記事</h2>
                <ul>
                    <li>PHPオススメ本</li>
                    <li>PHP MyAdminの使い方</li>
                    <li>いま人気のエディタtop5</li>
                    <li>HTMLの基礎</li>
                </ul>
                <h2>オススメリンク</h2>
                <ul>
                    <li>インターノウス株式会社</li>
                    <li>XAMPPのダウンロード</li>
                    <li>Eclipseのダウンロード</li>
                    <li>Braketsのダウンロード</li>
                </ul>
                <h2>カテゴリ</h2>
                <ul>
                    <li>HTML</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                    <li>JavaScript</li>
                </ul>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-bar">
            <p>copyright internous | 4each blog is the one which provides A to Z about programming.</p>
        </div>
    </footer>
</body>
</html>