let form = document.getElementById("searchBarForm");
let input = document.getElementById("input")
let submit = document.getElementById("submit")
console.log(form)



function receiveData() {
    alert(input.value)
    let xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("searchResults").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "search_action.php?input="+input.value, true)
    xhttp.send()
}

form.addEventListener('submit', receiveData)

/*
request.onload = 
request.open("get", "search_action.php?input="+input.value, true)
request.send()*/
