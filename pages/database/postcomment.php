<?php
    function getPostComments($id) {
        global $db;

        // Fetch postcomments from database
        $stmt = $db->prepare('SELECT * FROM postcomment WHERE postID = ?');
        $stmt->execute([$id]);

        $post_comments = $stmt->fetchAll();

        return $post_comments;
    }

    function getPostComment($comment){
        $account = getAccount($comment['accountID']);
        $post_comment = '<div class="comment">
                            <img src="images/profileImages/squared/'.$account['profilePic'].'.jpg" alt="" width="65" height="65">
                            <div id="username">
                                <p>%s</p>
                            </div>
                            <div id="text">
                                <p>%s</p>
                            </div>
                        </div>';
        return sprintf($post_comment, $account['name'], $comment['text']);
    }
?>