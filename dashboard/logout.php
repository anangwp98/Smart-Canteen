<?php 
    session_start();
    unset($_SESSION['username']);
    session_destroy();
?>
<script type="text/javascript">
        alert("Berhasil Logout!");
        window.location.href="login.php";
</script>