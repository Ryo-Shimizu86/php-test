<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP基礎</title>
</head>
<body>
    <?php
        $dsn = 'mysql:dbname=phpkiso;host=db';
        $user = 'root';
        $password = 'secret';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->query('SET NAMES utf8');

        $sql = 'SELECT * FROM questionnaire WHERE 1';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $rec = true;
        while($rec) {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            print $rec['code'];
            print $rec['nickname'];
            print $rec['email'];
            print $rec['opinion']. '<br>';
        }
        $dbh = null;
    ?>
</body>
</html>