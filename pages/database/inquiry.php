<?php
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
            $inquiry_message = '<div class="comment">
                                <img src="images/pfp.png" alt="" width="65" height="65">
                                <div id="username">
                                    <p>%s</p>
                                </div>
                                <div id="text">
                                    <p>%s</p>
                                </div>
                            </div>';
        }
        else{
            $account = getAccount($message['userID']);
            $inquiry_message = '<div class="comment">
                                <img src="images/pfp.png" alt="" width="65" height="65">
                                <div id="username">
                                    <p>%s</p>
                                </div>
                                <div id="text">
                                    <p>%s</p>
                                </div>
                            </div>';
        }
        return sprintf($inquiry_message, $account['name'], $message['text']);
    }
?>