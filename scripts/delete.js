"use strict";
const button = document.querySelector("#button");
const img = document.querySelector("#deleteImg");



button.addEventListener('click',()=>{
    if(img.style.display == 'block'){
        img.style.display = 'none';
    } else {
        img.style.display = 'block';
        alert("Appeler Froggy&Co au 06 33 57 07 67")
    }

});