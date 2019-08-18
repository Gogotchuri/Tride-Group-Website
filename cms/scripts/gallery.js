function validImage(img){
    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];
    let imgValid = false;
    _validFileExtensions.forEach((ext)=>{
        let mainImgExt = img.substr(img.length - ext.length,ext.length).toLowerCase();
        if(mainImgExt === ext){
          imgValid = true;
        }
    });
    return imgValid;
}

function validateFields(){

    let valid = true;
    let alertMsg = "";

    let form = document.getElementById('edit_create_album');

    if(!form.elements.headerKA.value && !form.elements.headerEN.value && !form.elements.headerRU.value){
        valid = false;
        alertMsg = "სათაურის ველი უნდა იყოს შევსებული \n";
    }

    if(!form.elements.image.value){
        // form uploaded image preview
        let image = document.getElementById("mainImg");
        if(image.src == image.baseURI){
            valid = false;
            alertMsg += "მთავარი ფოტო არ არის არჩეული \n";   
        }
    }else if(form.elements.image.value){
        if(!validImage(form.elements.image.value)){
            valid = false;
            alertMsg += "მთავარი ფოტოს ფორმატი არასწორია \n";
        }
    }

    if(form.elements.images.files.length > 0){
        let arr = form.elements.images.files;
        for(el of arr){
            if(!validImage(el['name'])){
                valid = false;
                alertMsg += "არჩეული ფოტოებიდან ერთი ან მეტი არასწორ ფორმატშია";
                break;
            }
        }
    }

    if(!valid){
        alert(alertMsg);
    }else{
         form.submit();
    }
}


// form uploaded image preview
let image = document.getElementById("image");

image.addEventListener('change',(e)=>{
    reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onloadend = (el)=>{
    let img = document.getElementById("mainImg");
    img.src = el.target.result;
    }
});
// form uploaded image preview

// form editing & inserting
let editForm = document.getElementById('edit_create_album');

// remove choosen images from the form// 
let uploadedPicForm = document.getElementById('uploadedPictures');
let removePic = document.getElementById('remove-pic');

removePic.addEventListener('click',(e)=>{
    e.preventDefault();

    let images = document.getElementsByClassName('removable');
    let imageArr = Array.prototype.slice.call(images);
    let imagePathArr = [];

    let pat = /img.*/g;

    for(el of imageArr){
      imagePathArr.push("../" + el.src.match(pat)[0]);
      el.parentNode.removeChild(el);
    }
    jQuery.ajax({
    type: "POST",
    url: 'method_list.php',
    dataType: 'json',
    data: {name : 'removeImages',arguments: imagePathArr},

    success : function(data){
        if(data['result'] == true){
          data['response'] = JSON.parse(data['response']);
          console.log(data['response']);
        }else{
          console.log(data['error']);
        }
    }
    });

});

// form album uploaded images removing visual effect
uploadedPictures.addEventListener('click', (e)=>{
    e.preventDefault();
    if(e.target.tagName == "IMG"){
    e.target.classList.toggle("removable");
    }
})

// get album info from server
function setEdit(id){

    uploadedPicForm.innerHTML = ``;

    jQuery.ajax({
    type: "POST",
    url: 'method_list.php',
    dataType: 'json',
    data: {name : 'fillFormAlbum',arguments: [id]},

    success : function(data){
        if(data['result'] == true){

        resp = JSON.parse(data['response']);
        editForm.elements.headerKA.value = resp['nameKA'];
        editForm.elements.headerEN.value = resp['nameEN'];
        editForm.elements.headerRU.value = resp['nameRU'];
        editForm.elements.image.parentNode.children[3].src = '../' + resp['defaultImage'];

        images = Object.values(resp['imagePathes']);

        images.forEach((imgName)=>{
            let img = document.createElement('img');
            img.classList.add("form-img");
            img.src = "../" + resp['images'] + imgName;
            uploadedPicForm.appendChild(img);
        })
        }else{
        console.log(data['error']);
        }
    }
    });

    editForm.elements.ID.value = id;
}

// clear module in Insert mode
function insertAlbum(){
    editForm.reset();
    let img = document.getElementById("mainImg");
    img.src = "";
    uploadedPicForm.innerHTML = ``;
    editForm.elements.ID.value = "-1";
}

// Delete album
let deleteForm = document.getElementById('deleteAlbum');

function sendToModuleOne(id){   
    let art = document.getElementById("DeleteAlbumName");
    let div = document.getElementById(id);
    let text = div.children[1].children[0].innerText;
    deleteForm["selectedAlbumID"] = id;
    art.innerText = text;
}

function deleteAlbum(){
    let Albid = deleteForm["selectedAlbumID"];
    
    jQuery.ajax({
        type: "POST",
        url: 'method_list.php',
        dataType: 'json',
        data: {name: 'deleteAlbum', arguments: [Albid]},
        
        //TODO on 'access denied' reaction..
        success : function(data){
        if(data['result'] == true){
            location.reload();
        }
        }
    });
}

// video url delete
function deleteURL(id){
    let url = document.getElementById(id);
    url.parentNode.removeChild(url);
}

// convert youtube url to youtube embed url
function getId(url) {
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);

    if (match && match[2].length == 11) {
        return match[2];
    } else {
        return 'error';
    }
}

// save youtube urls functions
function saveURLS(){
    let urls = document.getElementById('URLs');
    let urlArr = new Array();

    for(el of urls.children){
        if(el.children[0].value){
        let urlID = getId(el.children[0].value);
        let embedURL = '//www.youtube.com/embed/' + urlID;
        urlArr.push(embedURL);
        }
    }
    return urlArr;
}

// save youtube urls functions
let saveUrls = document.getElementById('saveUrls');

saveUrls.addEventListener('click',()=>{
    urlArr = saveURLS();
    if(urlArr.length == 0){
    urlArr[0] = 'empty';
    }
    jQuery.ajax({
        type: "POST",
        url: 'method_list.php',
        dataType: 'json',
        data: {name: 'updateURLs', arguments: urlArr},
        //TODO on 'access denied' reaction..
        success : function(data){
          if(data['result'] == true){
              location.reload();
          }
        }
    });
});