<?php
    function getAccount($id)
    {
        global $db;

        $stmt = $db->prepare('SELECT * FROM account WHERE id = ?');
        $stmt->execute([$id]);

        return $stmt->fetch();
    }
?>