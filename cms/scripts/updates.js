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

  let form = document.getElementById('newsForm');

  if(!form.elements.headerKA.value && !form.elements.headerEN.value && !form.elements.headerRU.value){
      valid = false;
      alertMsg = "სათაურის ველები ცარიელია \n";
  }

  if(!form.elements.htmlRU.value && !form.elements.htmlEN.value && !form.elements.headerRU.value){
    valid = false;
    alertMsg += "ტექსტის ველები ცარიელია \n";
  }
  
  if(!form.elements.image.value){
    let imagePreview = document.getElementById('imagePreview');
    console.log(imagePreview.src + " " + imagePreview.baseURI)
    if(imagePreview.src == imagePreview.baseURI){
      console.log(imagePreview.src + " " + imagePreview.baseURI);
      valid = false;
      alertMsg += "მთავარი ფოტო არ არის არჩეული \n";  
    }
  
  }else if(!validImage(form.elements.image.value)){
    valid = false;
    alertMsg += "მთავარი ფოტოს ფორმატი არასწორია \n"
  }

  if(!valid){
      alert(alertMsg);
  }else{
      form.submit();
  }
}

function sendForDelete(id){
  let delArticle = document.getElementById("deleteArticle");
  let article = document.getElementById('deletePreview');
  let div = document.getElementById(id);
  let text = div.children[1].children[0].innerText;
  
  delArticle['selectedAlbumID'] = id;
  article.innerText = text;
}

function deleteNews(){
  let art = document.getElementById("deleteArticle");
  let newsID = art["selectedAlbumID"];
  
  jQuery.ajax({
      type: "POST",
      url: '/cms/method_list.php',
      dataType: 'json',
      data: {name: 'deleteNews', arguments: [newsID]},
      
      success : function(data){
        if(data['result'] == true){
          location.reload();
        }
      }
  });
}

// get image
let image = document.getElementById("image");

image.addEventListener('change',(e)=>{
  reader = new FileReader();
  reader.readAsDataURL(e.target.files[0]);
  reader.onloadend = (el)=>{
    let img = document.getElementById("imagePreview");
    img.src = el.target.result;
  }
});
  
let newsForm = document.getElementById('newsForm');

function setEdit(id){
  
  jQuery.ajax(
    {
      type: "POST",
      url: '/cms/method_list.php',
      contentType: "application/x-www-form-urlencoded;charset=utf-8",
      dataType: 'json',
      data: {name : 'fillFormNews',arguments: [id]},

      success : function(data){
        if(data['result'] == true){
          resp = JSON.parse(data['response']);

          newsForm.elements.headerKA.value = resp['headerKA'];
          newsForm.elements.headerEN.value = resp['headerEN'];
          newsForm.elements.headerRU.value = resp['headerRU'];
          newsForm.elements.htmlKA.value = resp['htmlKA'];
          newsForm.elements.htmlEN.value = resp['htmlEN'];
          newsForm.elements.htmlRU.value = resp['htmlRU'];
          newsForm.elements.pubdate.value = resp['pubdate'];
          newsForm.elements.image.parentNode.children[3].src = '../' + resp['image'];

        }else{
          console.log(data['error']);
        }}
    });
  newsForm.elements.ID.value = id;
}
  
function setInsert(){ //TODO createForm
  newsForm.reset();
    
  //set current date to date-input when adding new article
  const currentDate = document.getElementById('pubdate');
  currentDate.valueAsNumber = Date.now()-(new Date()).getTimezoneOffset()*60000;
    
  newsForm.imagePreview.src = "";
  newsForm.ID.value = "-1";
}
  
// ! Deleting news
function sendToModuleOne(id,name){ 
      delet_pretender = id;
      let art = document.getElementById("DeleteAlbumName");
      art["selectedAlbumID"] = id;
      art.innerHTML = `${name}`;
}

function deleteAlbum(){
  let art = document.getElementById("DeleteAlbumName");
  let Albid = art["selectedAlbumID"];
  
  jQuery.ajax({
      type: "POST",
      url: '/cms/method_list.php',
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
  // # Deleting news