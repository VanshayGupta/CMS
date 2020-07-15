<div class="col-md-4">
   
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                <?php
                if(!isset($_SESSION['user_role'])){
                    
                   echo "<div class='well'>";
                    echo "<h4>Login</h4>";
                    echo "<form action='include/login.php' method='post'>";
                        echo "<div class='form-group'>";
                           echo " <input name='username' type='text' class='form-control' placeholder='Username'>";
                        echo "</div>";
                        echo "<div class='input-group'>";
                            echo "<input name='password' type='password' class='form-control' placeholder='Password'>";
                            echo "<span class='input-group-btn'>";
                                echo "<button class='btn btn-primary' name='login' type='submit'>Submit</button>";
                            echo "</span>";
                        echo "</div>";
                    echo "</form>";
                echo "</div>";
                 }
                ?>
                

                <!-- Blog Categories Well -->
                <div class="well">
                    <?php
                        $query = "SELECT * FROM category";
                        $select_categories_sidebar=mysqli_query($connection, $query);
                    ?>

                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                            <?php
                             $query= "SELECT * FROM category";
                            $select_all_categories_query=mysqli_query($connection, $query);
                            while($row=mysqli_fetch_assoc($select_all_categories_query)){
                                $cat_id=$row['cat_id'];
                                $cat_title=$row['cat_title'];
                                echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                            }
                            ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widget.php"; ?>

            </div>