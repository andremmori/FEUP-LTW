let form = document.getElementById("addPetForm")
let individual = form[0]
let group = form[1]
let newFields = document.getElementById("newFields")

let nameElement = document.createElement("label")
nameElement.innerHTML = 'Pet profile name: <input type="text" name="name" required>'

let ammountElement = document.createElement("label")
ammountElement.innerHTML = 'Number of pets: <input type="number" name="ammount" min="2" required>'

let speciesElement = document.createElement("label")
speciesElement.innerHTML = 'Species: <input type="text" name="species" required>'

let breedElement = document.createElement("label")
breedElement.innerHTML = 'Breed: <input type="text" name="breed">'

let sizeElement = document.createElement("label")
sizeElement.innerHTML = 'Size: <input type="text" name="size" required>'

let colourElement = document.createElement("label")
colourElement.innerHTML = 'Colour: <input type="text" name="colour">'

let submitElement = document.createElement("input")
submitElement.setAttribute("type","submit")
submitElement.setAttribute("value","Add Pet")

let br1 = document.createElement("BR");
let br2 = document.createElement("BR");
let br3 = document.createElement("BR");
let br4 = document.createElement("BR");
let br5 = document.createElement("BR");

var aux=false;
var box1= true, box2=true;

individual.addEventListener('click', function() { 
    
    if(box1)
    {
        if(aux)
        {
            newFields.removeChild(nameElement)   
            newFields.removeChild(ammountElement)
            newFields.removeChild(submitElement)

            newFields.removeChild(br1)
            newFields.removeChild(br2)
        }

        aux = true;
        

        newFields.appendChild(nameElement)   
        newFields.appendChild(speciesElement)
        newFields.appendChild(breedElement)
        newFields.appendChild(sizeElement)
        newFields.appendChild(colourElement)
        newFields.appendChild(submitElement)


        newFields.insertBefore(br1, speciesElement)
        newFields.insertBefore(br2, breedElement)
        newFields.insertBefore(br3, sizeElement)
        newFields.insertBefore(br4, colourElement)
        newFields.insertBefore(br5, submitElement)

        box1=false;
        box2= true;
    }
})

group.addEventListener('click', function() { 

    if(box2)
    {   
        if(aux)
        {
            newFields.removeChild(nameElement)   
            newFields.removeChild(speciesElement)
            newFields.removeChild(breedElement)
            newFields.removeChild(sizeElement)
            newFields.removeChild(colourElement)
            newFields.removeChild(submitElement)

            newFields.removeChild(br1)
            newFields.removeChild(br2)
            newFields.removeChild(br3)
            newFields.removeChild(br4)
            newFields.removeChild(br5)
        }
    

        aux = true;

        newFields.appendChild(nameElement)   
        newFields.appendChild(ammountElement)
        newFields.appendChild(submitElement)

        newFields.insertBefore(br1, ammountElement)
        newFields.insertBefore(br2, submitElement)  

        box2=false;
        box1=true;
    }
    
})
  
