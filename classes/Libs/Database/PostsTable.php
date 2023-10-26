<?php

namespace Libs\Database;

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
}