<?php
    function getInquiryList($id) {
        global $db;
        // Fetch inquirys regarding this pet from database
        $stmt = $db->prepare('SELECT * FROM Inquiry WHERE petID = ?');
        $stmt->execute([$id]);

        $inquirylist = $stmt->fetchAll();

        return $inquirylist;
    }
    function getInquiryInfo($inquiry){
        global $db;
        $messages = getInquiryMessages($inquiry['id']);
        $account = getAccount($inquiry['userID']);

        $inquiryInfo = '<a href="inquiry.php?id=1"><div class="conversation">
                            <img src="images/profileImages/squared/'.$account['profilePic'].'.jpg" alt="" width="55" height="55">
                            <p id="username">%s</p>
                            <p id="lastMessage">%s</p>
                        </div></a>';

        return sprintf($inquiryInfo, $account['name'], $messages[count($messages)-1]['text']);
    }

?> 