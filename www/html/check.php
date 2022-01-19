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
        $nickname = $_POST['nickname'];
        $email = $_POST['email'];
        $opinion = $_POST['opinion'];

        if ($nickname == "") {
            print "ニックネームが入力されていません。<br>";
        } else {
            print $nickname. "様<br>";
        }

        if ($email == "") {
            print "メールアドレスが入力されていません。<br>";
        } else {
            print "メールアドレス：". $email. "<br>";
        }
        
        if ($opinion == "") {
            print "ご意見が入力されていません。<br>";
        } else {
            print "ご意見『". $opinion. "』<br>";
        }
    ?>
    <br>
    <form method="post" action="thanks.php">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>
</html>