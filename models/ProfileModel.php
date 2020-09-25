<?php

class ProfileModel extends Model
{

    public function getUserID()
    {


        $query = $this->db->prepare("SELECT id FROM users WHERE login = ? ");
        $query->execute(array($_SESSION['user']));
        return $query->fetchColumn();
    }

    public function getBooks()
    {

        $sql = "SELECT * FROM books  WHERE  books.id_user =  " . $this->getUserID() . "   ORDER BY id ASC  ";
        $answer = array();
        $stmt = $this->db->prepare($sql);

        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $answer[$row['id']] = $row;
        }
        return $answer;
    }

    public function getBookById($id)
    {
        $sql = "SELECT * FROM books WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function deleteBookById($id)
    {
        $sql = "DELETE FROM books WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function addNewBook($bookTitle, $bookAuthor, $bookYear, $bookDescription, $bookPhoto,$bookCategory)
    {
        $sql = "INSERT INTO books (id_user,title, author,year, description, photo,category)
				VALUES (:id_user, :title, :author, :year, :description, :photo,:category)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id_user", $this->getUserID(), PDO::PARAM_INT);

        $stmt->bindValue(":title", $bookTitle, PDO::PARAM_STR);
        $stmt->bindValue(":author", $bookAuthor, PDO::PARAM_STR);
        $stmt->bindValue(":year", $bookYear, PDO::PARAM_INT);
        $stmt->bindValue(":description", $bookDescription, PDO::PARAM_STR);
        $stmt->bindValue(":photo", $bookPhoto, PDO::PARAM_STR);
        $stmt->bindValue(":category", $bookCategory, PDO::PARAM_STR);

        $stmt->execute();
        return true;
    }
}
