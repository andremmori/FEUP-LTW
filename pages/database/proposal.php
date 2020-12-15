<?php
    function makeProposal() {
        global $db;
        $petId = $_POST['petId'];
        $accountId = $_POST['accountId'];
        $date = $_POST['date'];
        $text = $_POST['text'];
        $status = $_POST['status'];

        if($petId == null || $accountId == null || $date == null || $text == null || $status == null) return false;

        try {
            // Init transaction
            $db->beginTransaction();
            // Insert Proposal
            $proposal_sql = "INSERT INTO proposal (petID, accountID, date, text, state) VALUES (?, ?, ?, ?, ?)";
            $first_stmt = $db->prepare($proposal_sql);
            $first_exec = $first_stmt->execute([$petId, $accountId, $date, $text, $status]);

            if (!$first_exec) throw new Exception();

            $db->commit();
        } catch (Exception $e) {
            $db->rollback();
            return false;
        }
        return true;
    }
?>