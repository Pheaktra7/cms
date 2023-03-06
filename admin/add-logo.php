<?php 
    include('sidebar.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add Logo</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Type of Logo</label>
                                        <select class="form-select" name="status">
                                            <option value="header">header</option>
                                            <option value="footer">footer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Logo</label>
                                        <input type="file" class="box" name="thumbnail">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="btn_save_logo" class="btn btn-primary">Save</button>
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