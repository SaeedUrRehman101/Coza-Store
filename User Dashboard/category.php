<?php
include('components/header.php')
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row bg-light rounded mx-0">
                    <div class="col-md-12">
                        <h3 class="px-3 py-4">All Categories</h3>
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>jhon@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>mark@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>jacob@email.com</td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

            <div class="d-flex col-lg-12 justify-content-end mt-3"><button type="button" name="" class="btn btn-primary me-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Categories</button></div>
            
            <!-- Modal -->
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
                                    <div id="emailHelp" class="form-text"><?php if(!empty($error_msg)){ // agr error_msg ka variable khali nhi hai is ka mtlb ye hai
                                        echo $error_msg;
                                    } ?></div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Choose file</label>
                                    <input type="file" class="form-control" name="cateImage" id="" placeholder="" aria-describedby="fileHelpId" />
                                    <div id="fileHelpId" class="form-text"><?php if(!empty($eroor_msg)){
                                        echo $error_msg;
                                    } ?></div>
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