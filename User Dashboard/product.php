<?php
include('components/header.php')
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row bg-light rounded mx-0">
                    <div class="col-md-12 table-responsive">
                        <h3 class="px-3 py-4">Product Detail</h3>
                        <table class="table text-center table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-light-emphasis fw-medium fst-italic" width="10%">Product ID</th>
                                        <th scope="col" class="text-light-emphasis fw-medium fst-italic" width="13%">Product Name</th>
                                        <th scope="col" class="text-light-emphasis fw-medium fst-italic" width="13%">Product Price</th>
                                        <th scope="col" class="text-light-emphasis fw-medium fst-italic">Product Description</th>
                                        <th scope="col" class="text-light-emphasis fw-medium fst-italic" width="13%">Product Image</th>
                                        <th scope="col" class="text-light-emphasis fw-medium fst-italic" width="15%">Product Category</th>
                                        <th class="text-light-emphasis fw-medium fst-italic" scope="col" colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $query=$run->query('select * from products');
                                $row=$query->fetchAll(PDO::FETCH_ASSOC);
                                foreach($row as $proCate){
                                ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $proCate['Product_Id']?></th>
                                        <td><?php echo $proCate['Product_Name']?></td>
                                        <td><?php echo $proCate['Product_Price']?></td>
                                        <td><?php echo $proCate['Product_Description']?></td>
                                        <td><img src="<?php echo $Pro_ImageAddress.$proCate['Product_Image'] ?>" alt="<?php echo $proCate['Product_Name'] ?>" width="80"></td>
                                        <!-- <td><?php //echo $proCate['Product_CatId']?></td> -->
                                        <td><?php 
                                        $query=$run->prepare('select c.Category_Name from products p inner join categories c on p.Product_CatId = c.Id where p.Product_Id= :pid');
                                        $query->bindParam('pid',$proCate['Product_Id']);
                                        $query->execute();
                                        $category = $query->fetch(PDO::FETCH_ASSOC);
                                        echo $category['Category_Name'];
                                        ?></td>
                                        <!-- <td><a href="#proCategorydetail<?php //echo $proCate['Product_Id'] ?>" data-bs-toggle="modal">Click Here</a></td> -->
                                        <td><a href="#updatePromodl<?php echo $proCate['Product_Id'] ?>" data-bs-toggle="modal"><i class="far fa-edit" style="color: #74C0FC;"></i></a></td>
                                        <td><a href="?proCateDelid=<?php echo $proCate['Product_Id'] ?>"><i class="fas fa-trash" style="color:red;"></i></a></td>
                                    </tr>

                                    <!--Update Product Category Modal -->

            <div class="modal fade" id="updatePromodl<?php echo $proCate['Product_Id'] ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $proCate['Product_Name'] ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="proId" value="<?php echo $proCate['Product_Id'] ?>" id="">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Id</label>
                                    <input type="text" class="form-control" name="proId" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="<?php echo $proCate['Product_Id'] ?>">
                                    <div id="emailHelp" class="form-text"><?php echo $error_Name; ?></div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="proName" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="<?php echo $proCate['Product_Name'] ?>">
                                    <div id="emailHelp" class="form-text"><?php echo $error_Name; ?></div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Price</label>
                                    <input type="text" class="form-control" name="proPrice" id="exampleInputEmail1"
                                        aria-describedby="emailHelp"  value="<?php echo $proCate['Product_Price'] ?>">
                                    <div id="emailHelp" class="form-text"><?php echo $error_Name; ?></div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                                    <input type="text" class="form-control" name="proQuan" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="<?php echo $proCate['Product_Quantity'] ?>">
                                    <div id="emailHelp" class="form-text"><?php echo $error_Name; ?></div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Description</label>
                                    <input type="text" class="form-control" name="proDesc" id="exampleInputEmail1"
                                        aria-describedby="emailHelp"  value="<?php echo $proCate['Product_Description'] ?>">
                                    <div id="emailHelp" class="form-text"><?php echo $error_Name; ?></div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Category</label>
                                    <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="proCatId">
                                    <!-- <option selected>Open this select menu</option> -->
                                    <?php 
                                    $query = $run->query('select * from categories');
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($result as $cate){
                                        ?>
                                    <option value="<?php echo $cate['id']; ?>"
                                        <?php if($cate['id'] == $proCate['Product_CatId']) echo 'selected'; ?> >
                                        <?php echo $cate['Category_Name']; ?>
                                    </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                    <div id="emailHelp" class="form-text"><?php echo $error_Name; ?></div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Choose Product Image</label>
                                    <input type="file" class="form-control" name="proImage" id="" placeholder="" aria-describedby="fileHelpId">
                                    <img src="<?php echo $Pro_ImageAddress.$proCate['Product_Image'] ?>" width="80" alt="">
                                    <div id="fileHelpId" class="form-text"><?php echo $error_Img ;?></div>
                                </div>
                                <button type="submit" name="updateProduct" class="btn btn-primary">Update Product</button>
                            </form>

                    

                </div>
                </div>
            </div>
            </div>

                                            <!-- Product Category Detail Modal -->
                <div class="modal fade" id="proCategorydetail<?php echo $proCate['Product_Id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

            <div class="d-flex col-lg-12 justify-content-end mt-3"><button type="button" name="" class="btn btn-primary me-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Add  Product Categories</button></div>
            
            <!--Add Product Category Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Product Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Id</label>
                                    <input type="text" class="form-control" name="proId" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"><?php echo $error_Name; ?></div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="proName" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"><?php echo $error_Name; ?></div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Price</label>
                                    <input type="text" class="form-control" name="proPrice" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"><?php echo $error_Name; ?></div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                                    <input type="text" class="form-control" name="proQuan" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"><?php echo $error_Name; ?></div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Description</label>
                                    <input type="text" class="form-control" name="proDesc" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"><?php echo $error_Name; ?></div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Category</label>
                                    <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="proCateId">
                                    <option selected>Open this select menu</option>
                                    <?php 
                                    $query = $run->query('select * from categories');
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($result as $cate){
                                        ?>
                                    <option value="<?php echo $cate['id'] ?>"><?php echo $cate['Category_Name'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                    <div id="emailHelp" class="form-text"><?php echo $error_Name; ?></div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Choose Product Image</label>
                                    <input type="file" class="form-control" name="proImage" id="" placeholder="" aria-describedby="fileHelpId">
                                    <div id="fileHelpId" class="form-text"><?php echo $error_Img ;?></div>
                                </div>
                                <button type="submit" name="addProduct" class="btn btn-primary">Add Product</button>
                            </form>
                </div>
                </div>
            </div>
            </div>
            


<?php
include('components/footer.php')
?>