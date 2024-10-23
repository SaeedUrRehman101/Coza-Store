<?php
session_start();
unset($_SESSION['Name'],$_SESSION['Email'],$_SESSION['Phone'],$_SESSION['Password'],$_SESSION['UserRole'],$_SESSION['User_Img'],$_SESSION['User_Bio']);
// session_unset();
echo "<script>alert('Logout Successfully');
location.assign('index.php');
</script>";
?>