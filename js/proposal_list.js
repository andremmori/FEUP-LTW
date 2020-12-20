
let proposal = document.getElementsByClassName("proposal");

let confirmm = document.getElementsByClassName("confirm");

let deny = document.getElementsByClassName("deny");


for(var i = 0; i < confirmm.length; i++){
    confirmm[i].addEventListener('click', function() {
        console.log("confirmm")
        var petID = this.parentElement.children[2].value;
        var userID = this.parentElement.children[3].value;
        var proposalID = this.parentElement.children[4].value;
        console.log(petID,userID)
        window.location="proposal_list_action.php?petID="+petID+"&userID="+userID+"&proposalID="+proposalID+"&option=confirm";
    })
}

for(var i = 0; i < deny.length; i++){
    deny[i].addEventListener('click', function() {
        console.log("deny")
        var petID = this.parentElement.children[2].value;
        var userID = this.parentElement.children[3].value;
        var proposalID = this.parentElement.children[4].value;     
        console.log(petID,userID)
        window.location="proposal_list_action.php?petID="+petID+"&userID="+userID+"&proposalID="+proposalID+"&option=deny";
    })
}




