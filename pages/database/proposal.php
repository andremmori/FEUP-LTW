<?php
    function makeProposal() {
        global $db;
        $userId = $_POST['userId'];
        $petId = $_POST['petId'];
        $accountId = $_POST['accountId'];
        $date = $_POST['date'];
        $text = $_POST['text'];
        $status = $_POST['status'];

        if($userId == null || $petId == null || $accountId == null || $date == null || $text == null || $status == null) return false;

        try {
            // Init transaction
            $db->beginTransaction();
            // Insert Proposal
            $proposal_sql = "INSERT INTO proposal (userId, petID, accountID, date, text, status) VALUES (?, ?, ?, ?, ?, ?)";
            $first_stmt = $db->prepare($proposal_sql);
            $first_exec = $first_stmt->execute([$userId, $petId, $accountId, $date, $text, $status]);

            if (!$first_exec) throw new Exception();

            $db->commit();
        } catch (Exception $e) {
            $db->rollback();
            return false;
        }
        return true;
    }
?>