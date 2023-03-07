<?php 
    include('sidebar.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>All Sport News</h3>
                        </div>
                        <div class="bottom view-post">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <!-- <div class="block-search">
                                        <input type="text" class="form-control" placeholder="SEARCH HERE">
                                        <button type="submit">
                                        <img src="search.png" alt=""></button>
                                    </div> -->
                                    <table class="table table-bordered" border="1px">
                                        <tr>
                                            <th>ID</th>
                                            <th>Thumbnail</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php 
                                            $sql = "SELECT * FROM `tbl_logo`";
                                            $res = $con->query($sql);
                                            while($row = $res->fetch_assoc()){
                                                echo'
                                                    <tr>
                                                        <td>'.$row['id'].'</td>
                                                        <td>
                                                            <img width="60" src="assets/icon/'.$row['thumbnail'].'" alt="'.$row['thumbnail'].'">
                                                        </td>
                                                        <td>'.$row['status'].'</td>
                                                        <td>
                                                            <button class="btn btn-primary">Edit</button>
                                                        </td>
                                                    </tr>
                                                ';
                                            }
                                        ?>
                                        
                                    </table>
                                    <ul class="pagination">
                                        <li>
                                            <a href="">1</a>
                                            <a href="">2</a>
                                            <a href="">3</a>
                                            <a href="">4</a>
                                        </li>
                                    </ul>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to remove this post?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="value_remove" name="remove_id">
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>  
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>