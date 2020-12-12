function favouritePet(account_id, pet_id) {
    let xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('fav').src = 'images/favourited.png';
            document.getElementById('fav').setAttribute('onclick', 'unfavouritePet(' + account_id + ',' + pet_id + ')');
        }
    };
    xhttp.open("GET", "favourite_pet_action.php?account_id=" + account_id + "&pet_id=" + pet_id, true);
    xhttp.send();
}

function unfavouritePet(account_id, pet_id) {
    let xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('fav').src = 'images/unfavourited.png';
            document.getElementById('fav').setAttribute('onclick', 'favouritePet(' + account_id + ',' + pet_id + ')');
        }
    };
    xhttp.open("GET", "unfavourite_pet_action.php?account_id=" + account_id + "&pet_id=" + pet_id, true);
    xhttp.send();
}