<?php
Session_Start();
$IS_DEBUG = false;
$_SESSION["current_page"] = "fingerprint/index.php";
$finger_id = "";
$active_user = "";
$active_user_zh = "";
if (isset($_SESSION["finger_id"])) {
    $finger_id = $_SESSION["finger_id"];
}
if (isset($_SESSION["active_user"])) {
    $active_user = $_SESSION["active_user"];
}
if (isset($_SESSION["active_user_zh"])) {
    $active_user_zh = $_SESSION["active_user_zh"];
}
if ($IS_DEBUG) {
    print_r($_SESSION);
}

if (strlen($active_user) == 0) {
    ?>
    <html> 
        <head> 
            <meta HTTP-EQUIV="REFRESH" CONTENT="2; URL=../fingerprint" /> 
        </head> 
    </html> 

    <?php
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/jquery-1.10.2.js"></script>


    </head>
    <body>
        <center>

            <h1>--- RFQ 報價自動化 ---</h1>
            <div style="font-size: 16pt">

                <?php // echo "session id is $finger_id <br>";   ?>
                <?php //echo "登入帳號︰ $active_user ";  ?>
                <?php
                if (strlen($active_user_zh) > 0) {
                    echo "登入用戶︰ $active_user_zh ($active_user)";
                    echo '&nbsp;&nbsp;<a href="../fingerprint/logout.php">[登出]</a>';
                }
                ?>

            </div>
            <div style="font-size: 32pt">
                <ul>
                    <li>
                        <a href="A0629/rfq/index.php">RFQ 報價自動化 (公版)</a>
                    </li>
                    <li>
                        <a href="A0629/rfq/index-en.php">RFQ 報價自動化 (中英文版)</a>
                    </li>
                </ul>
            </div>
        </center>
    </body>
</html>
