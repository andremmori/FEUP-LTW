<?php
    function getListingComments($id) {
        global $db;

        // Fetch listing comments from database
        $stmt = $db->prepare('SELECT * FROM Comment WHERE petID = ?');
        $stmt->execute([$id]);

        $listing_comments = $stmt->fetchAll();

        return $listing_comments;
    }

    function getListingComment($comment){
        $account = getAccount($comment['accountID']);
        $listing_comment = '<div class="comment">
                            <img src="images/profileImages/squared/'.$account['profilePic'].'.jpg" alt="" width="65" height="65">
                            <div id="username">
                                <p>%s</p>
                            </div>
                            <div id="text">
                                <p>%s</p>
                            </div>
                        </div>';
        return sprintf($listing_comment, $account['name'], $comment['text']);
    }

    function addListingComment($text, $id) {
        global $db;

        $account_id = $_SESSION['user']['id'];

       // Init transaction
       $db->beginTransaction();
       // Insert comment
       $comment_sql = "INSERT INTO comment (petID, accountID, text, date) VALUES (?, ?, ?, ?)";
       $first_stmt = $db->prepare($comment_sql);
       $first_exec = $first_stmt->execute([$id, $account_id, $text, date('now')]);

       $db->commit();
       return true;
    }
?>

