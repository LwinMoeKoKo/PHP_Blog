<?php

namespace Libs\Database;

use PDOException;

class UsersTable{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }


    public function getPosts(){
        try {
           $query = ("SELECT * FROM `posts` ORDER BY id DESC;");
           $statement = $this->db->prepare($query);
           $statement->execute();
           return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getPostsLimit($start,$length){
        try {
           $query = ("SELECT * FROM `posts` ORDER BY id DESC LIMIT $start, $length");
           $statement = $this->db->prepare($query);
           $statement->execute();
           return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getPost($id){
        try {
           $query = "SELECT * FROM `posts` WHERE id = :id;";
           $statement = $this->db->prepare($query);
           $statement->execute([
             ':id' => $id,
           ]);
           $row = $statement->fetch();
           return $row ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function registerUser($name, $email, $password){
        try {
          $query = "INSERT INTO users(`name`,`email`,`password`) VALUES (:name, :email, :password);";
          $statement = $this->db->prepare($query);
          $statement->execute([
            ':name' => $name, 
            ':email' => $email, 
            ':password' => $password,
          ]);
          return $this->db->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function searchPost($title){
        try {
           $query = "SELECT * FROM posts WHERE title LIKE '%$title%' ORDER BY id DESC;";
           $statement = $this->db->prepare($query);
           $statement->execute();
           $row = $statement->fetchAll();
           return $row ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function checkEmail($email){
        try {
           $query = "SELECT * FROM users WHERE email = :email";
           $statement = $this->db->prepare($query);
           $statement->execute([
             ':email' => $email,
           ]);
           $row = $statement->fetch();
           return $row ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function searchPostLimit($start,$length){
        try {
           $query = "SELECT * FROM posts WHERE title LIKE '%Why%' ORDER BY id DESC LIMIT $start,$length;";
           $statement = $this->db->prepare($query);
           $statement->execute();
           $row = $statement->fetchAll();
           return $row ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function createPost($title, $content, $image, $author_id){
        try {
           $query = "INSERT INTO posts(`title`,`content`,`image`, `author_id`) VALUES (:title, :content, :image, :author_id);";
           $statement = $this->db->prepare($query);
           $statement->execute([
             ':title' => $title,
             ':content' => $content,
             ':image' => $image,
             ':author_id' => $author_id,
           ]);
           $statement->fetch();
           return $this->db->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function createPostNoImg($title, $content, $author_id){
        try {
           $query = "INSERT INTO posts(`title`,`content`, `author_id`) VALUES (:title, :content, :author_id);";
           $statement = $this->db->prepare($query);
           $statement->execute([
             ':title' => $title,
             ':content' => $content,
             ':author_id' => $author_id,
           ]);
           $statement->fetch();
           return $this->db->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function EditPost($title, $content, $image,$id){
        try {
           $query = "UPDATE posts SET title =:title,content = :content,image = :image, updated_at = NOW() WHERE id = :id;";
           $statement = $this->db->prepare($query);
           $statement->execute([
             ':title' => $title,
             ':content' => $content,
             ':image' => $image,
             ':id' => $id,
           ]);
           $row = $statement->fetch();
           return $row ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function EditPostNoImg($title, $content, $id){
        try {
           $query = "UPDATE posts SET title =:title,content = :content,updated_at = NOW() WHERE id = :id;";
           $statement = $this->db->prepare($query);
           $statement->execute([
             ':title' => $title,
             ':content' => $content,
             ':id' => $id,
           ]);
           $row = $statement->fetch();
           return $row ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function searchByEmailAndPassword($email, $password){
        try {
           $query = "SELECT * FROM `users` WHERE email = :email AND password = :password;";

           $statement = $this->db->prepare($query);
           $statement->execute([
            ':email' => $email,
            ':password' => $password,
           ]);
           $row = $statement->fetch();
           return $row ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function searchByEmail($email){
        try {
            $query = "SELECT * FROM `users` WHERE email = :email";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ':email' => $email,
            ]);
            $row = $statement->fetch();
            return $row ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function updatePhoto($id, $photo){
        try {
            $query = "UPDATE users SET photo = :photo WHERE id = :id;";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ':id' => $id,
                ':photo' => $photo,
            ]);
            $row = $statement->fetch();
            return $row ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function changeRole($id, $role){
        try {
            $query = "UPDATE users SET role_id = :role WHERE id = :id;";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ':id' => $id,
                ':role' => $role,
            ]);
            $row = $statement->fetch();
            return $row ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addUser($name, $email, $password,$role){
        try {
            $query = "INSERT INTO users(name, email, password, role) VALUES (:name, :email, :password, :role);";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ':name' => $name,
                ':email' => $email, 
                ':password' => $password,
                ':role' => $role,
            ]);
            return $this->db->lastInsertId() ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function deletePost($id){
        try {
           $query = "DELETE FROM posts WHERE id = :id;";
           $statement = $this->db->prepare($query);
           $statement->execute([
             ':id' => $id,
           ]);
           $row = $statement->fetch();
           return $row ?? false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

