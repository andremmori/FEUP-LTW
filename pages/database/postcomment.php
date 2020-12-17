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

    function addPostComment($text, $post_id) {
        global $db;

        $account_id = $_SESSION['user']['id'];

        $stmt = $db->prepare('INSERT INTO postcomment (postID, accountID, text, date) VALUES (?,?,?,?)');
        $stmt->execute([$post_id, $account_id, $text, date('now')]);
        $new_id  = $db->lastInsertId();

        $stmt_2 = $db->prepare('SELECT * FROM postcomment WHERE id = ?');
        $stmt_2->execute([$new_id]);
        $comment = getPostComment($stmt_2->fetch());

        return $comment;
    }
