
let proposal = document.getElementsByClassName("proposal");

let deny = document.getElementsByClassName("deny");

console.log(deny);

for(var i = 0; i < deny.length; i++){
    deny[i].addEventListener('click', function() {
        this.parentElement.parentElement.remove();
    })
}


