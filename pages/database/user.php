<?php
    function getAllUsers() {
        global $db;
        $stmt = $db->prepare('SELECT * FROM user');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Add User to the database
    function addUser(){
        global $db;
        $name = $_GET['name'];
        $email = $_GET['email'];
        $username = $_GET['username'];
        $password = $_GET['password'];
        $repeat = $_GET['repeat'];

        if($password != $repeat) return false;

        try {
            // Init transaction
            $db->beginTransaction();

            // Insert Account
            $account_sql = "INSERT INTO account (name) VALUES (?)";
            $first_stmt = $db->prepare($account_sql);
            $first_exec = $first_stmt->execute([$name]);

            if(!$first_exec) throw new Exception();
            // Get Account id after insert
            $account_id = $db->lastInsertId();

            // Insert User
            $user_sql = "INSERT INTO user (email, passwordhash) VALUES (?, ?)";
            $second_stmt = $db->prepare($user_sql);
            $second_exec = $second_stmt->execute([$email, $password]);

            if(!$second_exec) throw new Exception();

            $db->commit();
        } catch (Exception $e) {
            $db->rollback();
            return false;
        }
        // Start session with new user
        $_SESSION['id'] = $account_id;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        return true;
    }

?>