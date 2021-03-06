function likePost(account_id, post_id) {
    let xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('like-icon').src = 'images/liked.png';
            document.getElementById('like-btn').setAttribute('onclick', 'dislikePost(' + account_id + ',' + post_id + ')');
            document.getElementById('post-likes').innerText = this.responseText;
        }
    };
    xhttp.open("GET", "post_like_action.php?account_id=" + account_id + "&post_id=" + post_id, true);
    xhttp.send();
}

function dislikePost(account_id, post_id) {
    let xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('like-icon').src = 'images/like.png';
            document.getElementById('like-btn').setAttribute('onclick', 'likePost(' + account_id + ',' + post_id + ')');
            document.getElementById('post-likes').innerText = this.responseText;
        }
    };
    xhttp.open("GET", "post_dislike_action.php?account_id=" + account_id + "&post_id=" + post_id, true);
    xhttp.send();
}

function addPostComment(post_id) {
    let xhttp = new XMLHttpRequest()

    let text = document.getElementById('commentText').value;

    if (text.length == 0) return;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const target = document.getElementById('postComment');
            target.insertAdjacentHTML('beforebegin', this.responseText);
            document.getElementById('commentText').value = "";
            document.getElementById('comments-count').innerText = parseFloat(document.getElementById('comments-count').innerText)+1;

        }
    };
    xhttp.open("GET", "add_post_comment_action.php?post_id=" + post_id + "&text=" + text, true);
    xhttp.send();
}