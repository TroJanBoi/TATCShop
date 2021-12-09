<?php
    session_start();
    if($_SESSION['id']){
        echo "<script>window.location.href='login.php'</script>";
    }

?>