<?php
include('components/header.php')
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row bg-light rounded mx-0">
                    <div class="col-md-12">
                        <h3 class="px-3 py-4">All Categories</h3>
                        <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" class="fw-medium fst-italic">Category ID</th>
                                        <th scope="col" class="fw-medium fst-italic">Category Name</th>
                                        <th scope="col" class="fw-medium fst-italic">Category Image</th>
                                        <th scope="col" class="fw-medium fst-italic" colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $query=$run->query('select * from categories');
                                $row=$query->fetchAll(PDO::FETCH_ASSOC);
                                foreach($row as $cate){
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $cate['id']?></th>
                                        <td><?php echo $cate['Category_Name']?></td>
                                        <td><img src="<?php echo $Cate_ImageAddress.$cate['Category_Image'] ?>" alt="<?php echo $cate['Category_Name'] ?>" width="80"></td>
                                        <td><a href="#updatemodl<?php echo $cate['id'] ?>" data-bs-toggle="modal"><i class="far fa-edit" style="color: #74C0FC;"></i></a></td>
                                        <td><a href="?cateDelid=<?php echo $cate['id'] ?>"><i class="fas fa-trash" style="color:red;"></i></a></td>
                                    </tr>

                                    <!--Update Category Modal -->
            <div class="modal fade" id="updatemodl<?php echo $cate['id'] ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $cate['Category_Name'] ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="cateId" value="<?php echo $cate['id'] ?>">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="cateName" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="<?php echo $cate['Category_Name'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Choose file</label>
                                    <input type="file" class="form-control" name="cateImage">
                                    <img src="<?php echo $Cate_ImageAddress.$cate["Category_Image"] ?>" alt="<?php echo $cate['Category_Name'] ?>" width="80">
                                </div>
                                <div class="modal-footer">
                                <button type="submit" name="updateCategory" class="btn btn-primary">Update Category</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>

                            </form>
                </div>
                </div>
            </div>
            </div>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

            <div class="d-flex col-lg-12 justify-content-end mt-3"><button type="button" name="" class="btn btn-primary me-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Categories</button></div>
            
            <!--Add Category Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="cateName" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"><?php echo $error_Name; ?></div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Choose file</label>
                                    <input type="file" class="form-control" name="cateImage" id="" placeholder="" aria-describedby="fileHelpId">
                                    <div id="fileHelpId" class="form-text"><?php echo $error_Img ;?></div>
                                </div>
                                <button type="submit" name="addCategory" class="btn btn-primary">Add Category</button>
                            </form>
                </div>
                </div>
            </div>
            </div>
            


<?php
include('components/footer.php')
?>