// Get the modal
var modal = document.getElementById('login-modal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

window.onload = function () {
    // code
    console.log(document.getElementById('login-error').innerText.length);
    if (document.getElementById('login-error').innerText.length > 0) {
        document.getElementById('login-modal').style.display = 'block';
    }
};