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
        $nickname = htmlspecialchars($_POST['nickname']);
        $email = htmlspecialchars($_POST['email']);
        $opinion = htmlspecialchars($_POST['opinion']);

        $dsn = 'mysql:dbname=phpkiso;host=db';
        $user = 'root';
        $password = 'secret';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->query('SET NAMES utf8');

        print $nickname. "様<br>";
        print "ご意見ありがとうございました<br>";
        print "頂いたご意見『". $opinion. "』<br>";
        print $email. "にメールを送りましたのでご確認ください。";

        $mail_sub = 'アンケート受け付けました。';
        $mail_body = $nickname. "様へ\nアンケート後享禄ありがとうございました。";
        $mail_body = html_entity_decode($mail_body, ENT_QUOTES, "UTF-8");
        $mail_head = 'r.shimizu1986@gmail.com';
        mb_language('Japanese');
        mb_internal_encoding("UTF-8");
        mb_send_mail($email, $mail_sub, $mail_body, $mail_head);

        $sql = 'INSERT INTO questionnaire (nickname, email, opinion) VALUES ("'. $nickname.'","'.$email.'","'.$opinion.'")';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $dbh = null;
    ?>
</body>
</html>