let form = document.getElementById("searchBarForm");
let input = document.getElementById("input")
let submit = document.getElementById("submit")
console.log(form)
let request = new XMLHttpRequest()

function getValue()
{
    alert(input.value);
}

form.addEventListener('submit', getValue);

request.onload = getValue
request.open("get", "search_action.php?input="+input.value, true)
request.send()
