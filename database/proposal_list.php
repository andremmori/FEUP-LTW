<?php
    function confirmProposal($petID, $userID, $proposalID) {
        global $db;

        try {
            // Init transaction
            $db->beginTransaction();
            // Insert Proposal
            $first_stmt = $db->prepare("UPDATE proposal SET state='ACCEPTED' where id=(?)");
            $first_exec = $first_stmt->execute([$proposalID]);

            if (!$first_exec) throw new Exception();

            $second_stmt = $db->prepare("UPDATE proposal SET state='REJECTED' where id!=(?) and petID=(?)");
            $second_exec = $second_stmt->execute([$proposalID, $petID]);

            if (!$second_exec) throw new Exception();

            $account = getAccount($userID);

            $third_stmt = $db->prepare("UPDATE pet SET ownerID=(?) where id=(?)");
            $third_exec = $third_stmt->execute([$account['id'], $petID]);

            if (!$third_exec) throw new Exception();

            $db->commit();

            return true;
        } catch (Exception $e) {
            $db->rollback();
            return false;
        } 
    }

    function denyProposal($proposalID) {
        global $db;

        try {
            // Init transaction
            $db->beginTransaction();
            // Insert Proposal
            $first_stmt = $db->prepare("UPDATE proposal SET state='REJECTED' where id=(?)");
            $first_exec = $first_stmt->execute([$proposalID]);

            if (!$first_exec) throw new Exception();

            $db->commit();
            
            return true;

        } catch (Exception $e) {
            $db->rollback();
            return false;
        }
        
    }
?>