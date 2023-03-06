<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php

    date_default_timezone_set('asia/Phnom_Penh');
  
    $con = new mysqli('localhost','root','','cms');

    session_start();

    function register(){

        global $con;

        if(isset($_POST['btn_register'])){
            $name   = $_POST['username'];
            $email  = $_POST['email'];
            $password   = $_POST['password'];
            $profile    = $_FILES['profile_thumbnail']['name'];

            if(!empty($name) && !empty($email) && !empty($password) && !empty($profile)){
                $password   = md5($_POST['password']);
                $profile    = date('YmdHis').'-'.$profile;
                $path       = 'assets/icon/'.$profile;
                move_uploaded_file($_FILES['profile_thumbnail']['tmp_name'],$path);
                $sql    = "INSERT INTO `tbl_user`(`username`, `email`, `password`, `profile`) 
                            VALUES ('$name','$email','$password','$profile')";
                $res = $con->query($sql);

                if($res){
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Success",
                                    text: "Admin have register!",
                                    icon: "success",
                                    button: "OK",
                                });
                            });
                        </script>
                    ';
                }
                else{
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Error",
                                    text: "Can not register!",
                                    icon: "error",
                                    button: "Try Again",
                                });
                            });
                        </script>
                    ';
                }
            }
            else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Error",
                                text: "Can not register!",
                                icon: "error",
                                button: "Try Again",
                            });
                        });
                    </script>
                ';
            }
        }
    }
    register();

    function login(){

        global $con;
        if(isset($_POST['btn_login'])){
            $name       = $_POST['name_email'];
            $password   = $_POST['password'];

            if(!empty($name) && !empty($password)){
                $password = md5($password);
                $sql = "SELECT * FROM `tbl_user` WHERE (`username` = '$name' OR `email` = '$name') AND `password` = '$password'";
                $res = $con->query($sql);
                if($res){
                    while($row = $res->fetch_assoc()){
                        $id = $row['id'];
                        $_SESSION['user'] = $id;
                        header('location: index.php');
                    }
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Login success",
                                    text: " login success",
                                    icon: "success",
                                    button: "OK",
                                });
                            });
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Error",
                                    text: "Can not login (check your name or password)",
                                    icon: "error",
                                    button: "try again",
                                });
                            });
                        </script>
                    ';
                }
            }
            else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Error",
                                text: "Can not login (check your name or password)",
                                icon: "error",                                   
                                button: "try again",
                            });
                        });
                    </script>
                ';
            }
        }
    }
    login();

    function getAdminData(){
        global $con;
        $admin_id = $_SESSION['user'];
        $sql_admin = "SELECT username,profile FROM `tbl_user` WHERE $admin_id";
        $res = $con->query($sql_admin);
        $row = $res->fetch_assoc();
        echo'
            <img width="50" src="assets/icon/'.$row['profile'].'" alt="'.$row['profile'].'">
            <h6>Welcome to Admin '.$row['username'].'</h6>
        ';
    }

    getAdminData();

    //add logo

    function add_logo(){
        global $con;
        if(isset($_POST['btn_save_logo'])){
            $status = $_POST['status'];
            $logo   = $_FILES['thumbnail']['name'];
            if(!empty($status) && !empty($logo)){
                $logo = date('YmdHis').'-'.$logo;
                $path = 'assets/icon/'.$logo;
                move_uploaded_file($_FILES['thumbnail']['name'],$path);
                $sql = "INSERT INTO `tbl_logo` (`status`, `thumbnail`) 
                VALUES ('$status','$logo')";
                $res = $con->query($sql);
                if($res){
                    echo 'yes';
                }
                else {
                    echo 'no';
                }
            }
        }
    }
    add_logo();
?>