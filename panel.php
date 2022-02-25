<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>A Basic HTML5 Template</title>
  <meta name="description" content="XML generation panel">
  <meta name="author" content="Jakub Troczyński">

  <meta property="og:title" content="XML generation panel">
  <meta property="og:type" content="website">
  <meta property="og:description" content="XML generator">
  <meta property="og:image" content="image.png">

  
  
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">

  <link rel="stylesheet" href="style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
  <!-- your content here... -->
  



<?php

 $categoryArray['Kocot Kids Nowy']=801;
 $categoryArray['Comad']=712;
 $categoryArray['Wróbel']=716;
 $categoryArray['Akord']=741;
 $categoryArray['Piaski Skrzyniowe']=715;
 $categoryArray['Piaski Tapicerka']=886;
 $categoryArray['Platforma Mebli']=714;
 $categoryArray['Laski Skrzyniowe']=813;
 $categoryArray['Laski Tapicerka']=880;
 $categoryArray['Furnival']=713;
 $categoryArray['Prestiz']=867;
 $categoryArray['Vivaldi']=742;
 $categoryArray['Lemur']=796;
 $categoryArray['Marpol']=868;
 $categoryArray['Allegro']=788;
 $categoryArray['Katalog domyslny']=72;
 $categoryArray['Akord hurtownia']=1184;

?>

        <div class="kategorie">
<?php

$i =0;
 foreach($categoryArray as $category=>$id){

  $i++;
     ?>
    
    <div class="in"><input type="checkbox"><div class="nazwa"><?php echo $category ?></div><div class="count count<?php echo $i; ?>"></div></div>
    <?php
 }

 ?>

    </div>

 <div class="buttons">
   <div  class="generuj btn btn-primary"  onclick="getValues()">
   Pobierz produkty
   </div>
   <button style="display:none;" type="button" class="btn btn-success">Liczba produktów</button>
   <button style="display:none;" type="button" class="id btn btn-primary" onclick="getVariants()">Pobierz Warianty / Generuj plik</button>
 </div>


 <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>


 <script>



function getVariants(){
  
  doVariantRequest();

}

function doVariantRequest(){

  var body =JSON.stringify(window.array)





  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        
   
      }
    };

    xmlhttp.addEventListener('loadstart', handleEvent);
    xmlhttp.addEventListener('load', handleEvent);
    xmlhttp.addEventListener('loadend', handleEvent);
    xmlhttp.addEventListener('progress', handleEvent);
    xmlhttp.addEventListener('error', handleEvent);
    xmlhttp.addEventListener('abort', handleEvent);

    xmlhttp.open("POST", "getVariants.php", true);
    xmlhttp.send(body);




    function handleEvent(e) {
    
    console.log(e);
}




}


   var string="";
function getValues(){
  document.querySelectorAll('.kategorie input').forEach(function(e){
    if(e.checked){
   string+=e.nextElementSibling.innerText
;
   string+=',';
    }
  });
  doRequest(string);
  string='';
}

function doRequest(string) {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        
        var re = /start.*stop/ig;

        var result = re.exec(xmlhttp.responseText);

    

        window.array = JSON.parse(xmlhttp.responseText);

        console.log(window.array);


        handleCount(window.array[0]);
      }
    };
    xmlhttp.open("GET", "getIds.php?q=" + string, true);
    xmlhttp.send();
  


//     $.ajax({
//   type: 'GET',
//   url: "getIds.php?q=" + string,
//   data: {},
//   beforeSend: function(XMLHttpRequest)
//   {
//     //Upload progress
//     XMLHttpRequest.upload.addEventListener("progress", function(evt){
//       if (evt.lengthComputable) {  
//         var percentComplete = evt.loaded / evt.total;
//         //Do something with upload progress
//       }
//     }, false); 
//     //Download progress
//     XMLHttpRequest.addEventListener("progress", function(evt){
//       if (evt.lengthComputable) {  
//         var percentComplete = evt.loaded / evt.total;
//         //Do something with download progress
//       }
//     }, false); 
//   },
//   success: function(data){
//       //    var re = /start.*stop/ig;

//     //     var result = re.exec(xmlhttp.responseText);

    

//         window.array = JSON.parse(data);


//          handleCount(window.array[0]);
//   }
// });

}


function handleCount(e){

  window.countArray = e.split(',');

  document.querySelector('.btn-success').style.display="inline-block";
  document.querySelector('.id').style.display="block";

  console.log(window.countArray);

  document.querySelectorAll('.kategorie input').forEach(function(e){
    if(e.checked){
        for(var i=0; i< window.countArray.length ;i++){
                    if(e.nextElementSibling.innerText==window.countArray[i]){
                            e.nextSibling.nextSibling.innerText=window.countArray[i+1];
                        }
            
             }

    }
})

}
</script>

</body>
</html>