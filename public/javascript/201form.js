//function for when admin uploads an image in 201 form, it will preview the image.
function updateImage(imageId, inputId){
const imageElement = document.getElementById(imageId);
const inputElement = document.getElementById(inputId);
const file = inputElement.files[0];

if(file){

    const reader = new FileReader();
    reader.onload = function (e){

        imageElement.src = e.target.result;

    }
    reader.readAsDataURL(file);

}else {

    imageElement.src = "./images/userdash/profile_empty.jpg";

}

}