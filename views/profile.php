<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="/">
    <title>Room Library</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Room Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/logout">Exit</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div id="page-wrapper" data-ng-app="books" data-ng-controller="booksController">

<div class="container">

    <div class="row">


        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="mt-45">Recent Books
            </h1>



            <?foreach ( $pageData['books'] as $key =>$value ){
                ?>

            <div class="card md-12 text-center">
                    <h2 class="card-title"><?=$value['title']?></h2>
                    <div class="text-center">
                        <img class="" src="<?=$value['photo']?>"  width="25%" alt=""></div>
                <div class="card-body">
                    <p class="card-text"> <?=substr($value['description'],0,300)?>... </p>
                    <a  data-toggle="modal" data-target="#bookModal"  data-ng-click="getInfoByBookId(<?php echo $value['id'];?>)" href="" class="btn btn-primary">Read More &rarr;</a>
                    <button  type="button" data-ng-click="deleteBook(id)" class="btn btn-danger">Remove  &rarr;</button>

                </div>



            </div>
            <?
            }


            ?>

            <div data-ng-view>

            </div>


            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul>
        </div>




        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">

            </div>



            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">History</a>
                                </li>
                                <li>
                                    <a href="#">Sport</a>
                                </li>
                                <li>
                                    <a href="#">Travel</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Business</a>
                                </li>
                                <li>
                                    <a href="#">Science</a>
                                </li>
                                <li>
                                    <a href="#">Skills</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Manager</h5>
                <div class="card-body">
                    <a  data-toggle="modal" data-target="#addBookModal"   href="" class="btn btn-primary">Add book </a>

                    <div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add new book</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" name="book" data-ng-submit="AddNewBook()">
                                        <div class="form-group">
                                            <label for="bookTitle" class="col-sm-3">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" data-ng-model="bookTitle" id="bookTitle" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="bookAuthor" class="col-sm-3">Author</label>
                                            <div class="col-sm-9">
                                                <input type="text" data-ng-model="bookAuthor" id="bookAuthor" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="bookYear" class="col-sm-3">Year </label>
                                            <div class="col-sm-9">
                                                <input type="text" data-ng-model="bookYear" id="bookYear" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="bookCategory" class="col-sm-3">Category </label>
                                            <div class="col-sm-9">
                                                <input type="text" data-ng-model="bookCategory" id="bookCategory" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="bookDescription" class="col-sm-3">Description </label>
                                            <div class="col-sm-9">
                                                <input type="text" data-ng-model="bookDescription" id="bookDescription" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="bookPhoto" class="col-sm-3">Photo URL </label>
                                            <div class="col-sm-9">
                                                <input type="text" data-ng-model="bookPhoto" id="bookPhoto" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Room Library 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
    <script src="/js/angular.min.js"></script>
    <script src="/js/angular-route.js"></script>
    <script src="/js/app.js"></script>


    <script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>

</body>

</html>
