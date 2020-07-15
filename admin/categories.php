<?php include "include/admin_header.php" ?>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include "include/admin_navigation.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Admin</small>
                        </h1>
                    </div>
                        <div class="col-xs-6">
                            <?php insert_categories(); ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title"> <br>
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                                </div> 
                            </form>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">
                                    Edit Category</label>
                                    <?php 
                                    if(isset($_GET['edit'])){
                                        $cat_id=$_GET['edit'];
                                        $query = "SELECT * FROM category WHERE cat_id={$cat_id}";
                                        $select_categories_id=mysqli_query($connection, $query);
                                         while($row=mysqli_fetch_assoc($select_categories_id)){
                                            $cat_id=$row['cat_id'];
                                            $cat_title=$row['cat_title'];
                                    ?>
                                    <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
                                    <?php }} ?> 
                                    <br>
                                    <input class="btn btn-primary" type="submit" name="edit" value="Edit category">
                                </div> 
                            </form>
                        </div>
                        <div class="col-xs-6">
                            <?php
                            if(isset($_POST['edit'])){
                                $delete_cat_title=$_POST['cat_title'];
                                $query="UPDATE category SET cat_title='{$delete_cat_title}' WHERE cat_id={$cat_id}";
                                $edit_query=mysqli_query($connection,$query);
                                header("Location: categories.php");
                            }
                            ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php findAllCategories(); ?>
                                    <?php deleteCategories(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
