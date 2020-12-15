<?php
    function sendMessage() {
        global $db;
        $inquiryID = $_POST['inquiryID'];
        $petOwner = $_POST['petOwner'];
        $text = $_POST['message'];
        $date = $_POST['date'];

        if($inquiryID == null || $petOwner == null || $text == null || $date == null) return false;

        try {
            // Init transaction
            $db->beginTransaction();
            // Insert Proposal
            $message_sql = "INSERT INTO Message (inquiryID, petOwner, text, date) VALUES (?, ?, ?, ?)";
            $first_stmt = $db->prepare($message_sql);
            $first_exec = $first_stmt->execute([$inquiryID, $petOwner, $text, $date]);

            if (!$first_exec) throw new Exception();

            $db->commit();
        } catch (Exception $e) {
            $db->rollback();
            return false;
        }
        return true;
    }
?>