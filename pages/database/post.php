<?php
    function getPost($id) {
        global $db;

        // Fetch post from database
        $stmt_post = $db->prepare('SELECT * FROM post WHERE id = ?');
        $stmt_post->execute([$id]);

        $post = $stmt_post->fetch();
        if($post == null) return null;

        return $post;
    }

    function deletePost($id) {
        global $db;

        // Delte post from given id
        $stmt = $db->prepare('DELETE FROM post WHERE id = ?');
        return $stmt->execute([$id]);
    }

    function updatePost($id) {
        global $db;

        $description = $_POST['description'];

        // Update post form given id
        $stmt = $db->prepare('UPDATE post SET description = ? WHERE id = ?');
        return $stmt->execute([$description, $id]);
    }

    function getFavouritePetsPost($user_id)
    {
        global $db;

        $stmt = $db->prepare('SELECT * FROM favourite JOIN post ON favourite.petID = post.petID WHERE accountID = ? ORDER BY date DESC');
        $stmt->execute([$user_id]);

        return $stmt->fetchAll();
    }

    function makeFeedPost($post) {
        $article = "";

        $pet = getPet($post['petID']);

        $article =
        '<article class="post">
            <div id="top">
                <a href="pet_profile.php?id='.$pet['id'].'"><img src="images/profileImages/squared/'.$pet['profilePic'].'.jpg" alt="" width="65" height="65"></a>
                <a href="pet_profile.php?id='.$pet['id']. '">
                    <h1>'. $pet['name'] .'</h1>
                </a>
            </div>
            <img src="images/petImages/originals/'. $post['photo'] .'.jpg" alt="">
            <div id="bottom">
                <a href="pet_profile.php?id=' . $pet['id'] . '">
                    <p>'. $pet['name'] .'</p>
                </a>
                <p>' . $post['description'] . '</p>
                <p>'. $post['date'] .'</p>
            </div>
        </article>';

        return $article;
    }

    function likePost($account_id, $post_id) {
        global $db;

        $stmt = $db->prepare('INSERT INTO postlike (accountID, postID) VALUES (? , ?)');
        $stmt->execute([$account_id, $post_id]);

        return $stmt->execute([$account_id, $post_id]);;
    }

    function dislikePost($account_id, $post_id) {
        global $db;

        $stmt = $db->prepare('DELETE FROM postlike WHERE accountID = ? AND postID = ?');
        $stmt->execute([$account_id, $post_id]);

        return $stmt->execute([$account_id, $post_id]);;
    }

    function hasLikedPost($account_id, $post_id) {
        global $db;

        $stmt = $db->prepare('SELECT * FROM postlike WHERE accountID = ? AND postID = ?');
        $stmt->execute([$account_id, $post_id]);

        return $stmt->fetch() != NULL;
    }

    function getPostLikes($post_id) {
        global $db;

        $stmt = $db->prepare('SELECT * FROM postlike WHERE postID = ?');
        $stmt->execute([$post_id]);

        return $stmt->fetchAll();
    }