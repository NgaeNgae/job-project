<?php
require_once('./connect.php');

class userController extends connect
{
    public function store($data)
    {
        $stmt = $this->db->prepare("INSERT INTO users (`name`,`email`,`password`) VALUE (:name,:email,:password)");
        $stmt->bindParam(":name", $data['name']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":password", password_hash($data['password'], PASSWORD_BCRYPT));
        try {
            $stmt->execute();
            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function show($email)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}