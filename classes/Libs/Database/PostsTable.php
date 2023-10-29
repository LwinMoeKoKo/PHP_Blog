<?php

namespace Libs\Database;

use Helpers\HTTP;
use PDOException;

class PostsTable{
    private $db;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function insertComment($content,$author_id,$post_id){
        try {
            $query = "INSERT INTO comments(`content`,`author_id`,`post_id`) VALUES (:content, :author_id, :post_id)";

            $statement = $this->db->prepare($query);
            $statement->execute([
                ':content' => $content,
                ':author_id' => $author_id,
                ':post_id' => $post_id,
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getComment($post_id){
        try {
            $query = "SELECT * FROM `comments` WHERE post_id = :post_id;";

            $statement = $this->db->prepare($query);
            $statement->execute([
                ':post_id' => $post_id,
            ]);
            $row = $statement->fetchAll();
            return $row ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getUser($user_id){
        try {
            $query = "SELECT * FROM users WHERE id = :user_id;";

            $statement = $this->db->prepare($query);
            $statement->execute([
                ':user_id' => $user_id,
            ]);
            $row = $statement->fetch();
            return $row ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getUsers(){
        try {
            $query = "SELECT * FROM users";

            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteUser($id){
        try {
            $query = "DELETE * FROM users WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ':id' => $id,
            ]);
            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getUserLimit($start, $length){
        try {
            $query = "SELECT * FROM `users` LIMIT $start,$length";
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function searchUser($name){
        try {
            $query = "SELECT * FROM `users` WHERE name LIKE '%$name%';";
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function searchUserLimit($name,$start,$length){
        try {
            $query = "SELECT * FROM `users` WHERE name LIKE '%$name%' LIMIT $start, $length;";
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function h($content){
        return htmlspecialchars($content);
    }
    
    public function  updateUser($data){
        try {
            $query = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id;";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            $row = $statement->rowCount();
            return $row ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }
    public function  updateUserNoPassword($data){
        try {
            $query = "UPDATE users SET name = :name, email = :email WHERE id = :id;";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            $row = $statement->rowCount();
            return $row ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    public function tokenCsrf(){
        if(isset($_SESSION['csrf'])){
            return $_SESSION['csrf'];
        } else {
            $token = sha1(rand(1,1000).time(). 'csrf secret');
            $_SESSION['csrf'] = $token;
        }
        
    }
    
    public function tokenCheck($csrf){
            if($csrf !== $_SESSION['csrf']){
                unset($_SESSION['user']);
                unset($_SESSION['csrf']);
                HTTP::redirect("/index.php");
            } else {
                unset($_SESSION['csrf']);
            }
        }

}           
        
            
            
