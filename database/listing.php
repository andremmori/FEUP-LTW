<?php
    function updateListing($description, $requirements,$id) {
        
        global $db;

        try {
            $db->beginTransaction();

            $stmt = $db->prepare("UPDATE pet SET description=(?), requirements=(?) WHERE id=(?)");
            $exec = $stmt->execute([$description, $requirements, $id]);

            if (!$exec) throw new Exception();

            $db->commit();
            
            return true;

        } catch (\Throwable $th) {
            $db->rollback();
        
            return false;
        }
    }
?>
