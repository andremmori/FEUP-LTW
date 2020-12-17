<?php
    function checkInquiry($id){
        global $db;
        $user_id = $_SESSION['user']['id'];
        $stmt = $db->prepare('SELECT * FROM Inquiry WHERE petID = ? AND userID = ?');
        $stmt->execute([$id, $user_id]);
        $check = $stmt->fetch();
        
        return $check['id'];
    }

    function addInquiry($id){
        global $db;
        $user_id = $_SESSION['user']['id'];
  
            // Init transaction
            $db->beginTransaction();

            // Insert Account
            $inquiry_sql = "INSERT INTO inquiry (petID, userID) VALUES (?, ?)";
            $first_stmt = $db->prepare($inquiry_sql);
            $first_exec = $first_stmt->execute([$id, $user_id]);
            
            $db->commit();

            $inquiry_id = $db->lastInsertId();

            return $inquiry_id;
    }

    function getInquiry($id) {
        global $db;

        // Fetch inquiry from database
        $stmt = $db->prepare('SELECT * FROM Inquiry WHERE id = ?');
        $stmt->execute([$id]);

        $inquiry = $stmt->fetch();

        return $inquiry;
    }

    function getInquiryMessages($id) {
        global $db;

        // Fetch inquiry messages from database
        $stmt = $db->prepare('SELECT * FROM Message, Inquiry, Pet WHERE Message.inquiryID = Inquiry.id AND Pet.id = Inquiry.petID AND inquiryID = ?');
        $stmt->execute([$id]);

        $inquiry_messages = $stmt->fetchAll();

        return $inquiry_messages;
    }

    
    function getInquiryMessage($message){
        if ($message['petOwner'] == 1){
            $account = getAccount($message['ownerID']);
            $inquiry_message = '<div class="message_owner">
                                <img src="images/profileImages/squared/'.$account['profilePic'].'.jpg" alt="" width="65" height="65">
                                <div id="messageBox">
                                    <p>%s</p>
                                </div>
                                
                            </div>';
        }
        else{
            $account = getAccount($message['userID']);
            $pfp = $account['profilePic'];
            $inquiry_message = '<div class="message_user">
                                <div id="messageBox">
                                    <p>%s</p>
                                </div>
                                <img src="images/profileImages/squared/'.$account['profilePic'].'.jpg" alt="" width="65" height="65">
                            </div>';
        }
        return sprintf($inquiry_message, $message['text']);
    }
?>