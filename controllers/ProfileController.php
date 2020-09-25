<?php

class ProfileController extends Controller
{

    private $pageTpl = "/views/profile.php";

    public function __construct()
    {
        $this->model = new ProfileModel();
        $this->view = new View();
    }

    public function index()
    {

        if (!$_SESSION['user']) {

            header('Location: /');
            exit();
        }
        $books = $this->model->getBooks();
        $this->pageData['books'] = $books;
        $this->pageData['title'] = "Кабинет";


        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function getBook()
    {

        if (!$_SESSION['user']) {
            header('Location: /');
            return;

        }
        if (!isset($_GET['id'])) {
            echo json_encode(array("success" => false));
        } else {
            $bookID = $_GET['id'];
            #echo json_encode($this->model->getBookById($bookID));
            $bookInfo = json_encode(array($this->model->getBookById($bookID), JSON_PRETTY_PRINT));
            echo $bookInfo;

        }
    }

    public function deleteBook()
    {


        if (!$_SESSION['user']) {
            header('Location: /2');
            return;

        }
        /*  Check if isset post and id*/
        if (empty($_POST) || !isset($_POST['id'])) {
            echo json_encode(array("success" => false));

        } else {
            $id_book = $_POST['id'];
            if ($this->model->deleteBookById($id_book)) {
                echo json_encode(array("success" => true));
            } else {
                echo json_encode(array("success" => false));
            }


        }

    }

    public function addBook()
    {


        if (!empty($_POST) && !empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['year']) && !empty($_POST['description']) && !empty($_POST['photo'])) {

            $bookTitle = $_POST['title'];
            $bookAuthor = $_POST['author'];
            $bookYear = $_POST['year'];
            $bookDescription = $_POST['description'];
            $bookPhoto = $_POST['photo'];
            $bookCategory = $_POST['category'];


            if ($this->model->addNewBook($bookTitle,$bookAuthor,$bookYear,$bookDescription,$bookPhoto,$bookCategory)) {
                echo json_encode(array("success" => true, "text" => "Book was  added","DATA"=>$bookCategory));
            } else {
                echo json_encode(array("success" => false, "text" => "Error"));
            }

        } else {
            echo json_encode(array("success" => false, "text" => "Wrong data"));

    }
}
}
