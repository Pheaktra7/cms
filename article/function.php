<!-- @import jquery & sweet alert  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php 
// @Connection database
    $con = new mysqli('localhost','root','','cms');

    function get_logo($status){
        global $con;
        $sql = "SELECT thumbnail FROM `tbl_logo` WHERE `status` = '$status' LIMIT 1";
        $res = $con->query($sql);

        $row = mysqli_fetch_assoc($res);
        return $row['thumbnail'];
    }

?>