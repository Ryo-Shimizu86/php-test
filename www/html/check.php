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
        $okFlg = true;

        if ($nickname == "") {
            print "ニックネームが入力されていません。<br>";
            $okFlg = false;
        } else {
            print $nickname. "様<br>";
        }

        if ($email == "") {
            print "メールアドレスが入力されていません。<br>";
            $okFlg = false;
        } else {
            print "メールアドレス：". $email. "<br>";
        }
        
        if ($opinion == "") {
            print "ご意見が入力されていません。<br>";
            $okFlg = false;
        } else {
            print "ご意見『". $opinion. "』<br>";
        }
    ?>
    <br>
    <form method="post" action="thanks.php">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="hidden" name="nickname" value="<?php print $nickname; ?>">
        <input type="hidden" name="email" value="<?php print $email; ?>">
        <input type="hidden" name="opinion" value="<?php print $opinion; ?>">
        <?php
            if ($okFlg) {
                print '<input type="submit" value="OK">';
            }
        ?>
    </form>
</body>
</html>