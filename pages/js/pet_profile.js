var favourited = false;

function changeFavouriteIcon() {

    if(favourited)
    {
        document.getElementById("fav").src = "images/unfavourited.png"
        console.log(-1)
    }
    else
    {
        document.getElementById("fav").src = "images/favourited.png"
        console.log(+1)
    }
        
    favourited = !favourited;
}