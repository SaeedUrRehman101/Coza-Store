<?php
include("components/header.php");
if($_SESSION['UserRole']!='User'){
    echo '<script>location.assign("index.php");</script>';
}
?>
profile;
<?php
include('components/footer.php');
?>