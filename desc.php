<?php include('config/session.php'); ?>
<?php include('config/db_connect.php'); ?>
<?php $coursid = $_POST['coursid']; ?>

<html>
<head>
<style>
    .center {
    margin: auto;
    width: 60%;
    /*border: 3px solid #73AD21;*/
    padding: 10px;
    }
</style>
</head>
<body>
<div class="center">
    <form action="editdesc.php" method="POST">
        Description1: <input type="text" name="desc1" style="width: 100%">
        <br><br>Description2: <input type="text" name="desc2" style="width: 100%">
        <br><br>Description3:<input type="text" name="desc3" style="width: 100%">
        <br><br>Description4:<input type="text" name="desc4" style="width: 100%">
        <br><br>Description5:<input type="text" name="desc5" style="width: 100%">
        <input type="hidden" name="coursid" value="<?php echo $coursid ?>">
        <br><br><input type="submit" name="submi">
    </form>
</div>
</body>
</html>