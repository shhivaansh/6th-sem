<?php
session_start();

// Cookie Counter
if (isset($_COOKIE['mycookie'])) {
    $cookie = $_COOKIE['mycookie'] + 1;
} else {
    $cookie = 1;
}

setcookie('mycookie', $cookie, time() + 360);

// Session Counter
if (isset($_SESSION['mysession'])) {
    $_SESSION['mysession'] += 1;
} else {
    $_SESSION['mysession'] = 1;
}
?>

<p>Cookie count: <?php echo $cookie;?></p>
<p>Session count: <?php echo $_SESSION['mysession']?></p>