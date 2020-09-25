<?php


class IndexController extends Controller
{

    private $pageTpl = "/views/main.php";


    public function __construct()
    {
        $this->model = new IndexModel();
        $this->view = new View();
    }


    public function index()
    {
        $this->pageData['title'] = "Room Library";
        if ($_SESSION['user']){
            header('location: /profile');
        }
        if (!empty($_POST)) {
            if (!$this->login()) {
                $this->pageData['error'] = "Неправильный логин или пароль   ";
            }
        }

        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function login()
    {
        if (!$this->model->checkUser()) {
            return false;
        }
    }


}
