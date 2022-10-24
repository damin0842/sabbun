<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html><?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $youPass = $_POST['youPass'];
    $myMemberID = $_SESSION['myMemberID'];

    $sql = "UPDATE myBMember SET youPass = '{$youPass}' WHERE myMemberID = '{$myMemberID}'";
    $connect -> query($sql);
    
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.js"></script>

<script>
   
Swal.fire('비밀 번호가 수정 되었습니다.');
setTimeout(() => {
        window.location.href = "myPageSetting.php";
    }, 2000);


</script>