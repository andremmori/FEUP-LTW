

function receiveData(x) {
    //alert(x)
    let xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("searchResults").innerHTML = this.responseText;
    }
    };
    xhttp.open("GET", "search_action.php?input="+x, true)
    xhttp.send()
}