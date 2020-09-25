var app = angular.module("books", ["ngRoute"]);

app.config(function ($routeProvider, $locationProvider) {

    $routeProvider
        .when("/:id", {
            templateUrl: "/views/book.php"
        });


    $locationProvider.html5Mode(true);

});


app.controller('booksController', function ($scope, $http) {


    $scope.getInfoByBookId = function (id) {
        $http({
            method: "GET",
            url: "http://library/profile/getBook",
            params: {id: id}
        }).then(function (result) {
            console.log(result.data);
            $scope.titleBook = result.data[0].title;
            $scope.author = result.data[0].author;
            $scope.year = result.data[0].year;
            $scope.description = result.data[0].description;
            $scope.photo = result.data[0].photo;
            $scope.id = id;


        })
    };

    $scope.deleteBook = function (id) {
        $http({
            method: "POST",
            url: "http://library/profile/deleteBook",
            params: {id: id},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (result) {
            window.location.href = '/profile/';
        })
    };


    $scope.AddNewBook = function () {
        $http({
            method: "POST",
            url: "http://library/profile/addBook",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            data: $.param({title: $scope.bookTitle,author:$scope.bookAuthor,year:$scope.bookYear,category:$scope.bookCategory, description:$scope.bookDescription , photo:$scope.bookPhoto})
        }).then(function (result) {
            console.log(result.data);
            alert('Book was added');
            window.location.href = 'profile';
        })
    }

});

