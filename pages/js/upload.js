

function selectImage(event) {
        
    var reader = new FileReader();
    reader.onload = function()
    {
        var img = "<img id=\"selectedImage\" src="+reader.result+">";
        document.getElementById('uploadedImage').innerHTML = img;
    }
    reader.readAsDataURL(event.target.files[0]);
    
}
