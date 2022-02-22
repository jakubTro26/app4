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
  <meta property="og:description" content="A simple HTML5 Template for new projects.">
  <meta property="og:image" content="image.png">

  
  
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">

  <link rel="stylesheet" href="style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
  <!-- your content here... -->
  





        <div class="kategorie">
<?php
 foreach($categoryArray as $category=>$id){
     ?>
    
    <div class="in"><input type="checkbox"><div><?php echo $category ?></div></div>
    <?php
 }

 ?>

    </div>

 <div  class="generuj btn btn-primary"  onclick="getValues()">
 Generuj plik XML
 </div>

 <script>

   var string="";
function getValues(){
  document.querySelectorAll('.kategorie input').forEach(function(e){
    if(e.checked){
   string+=e.parentElement.innerText;
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
        
      }
    };
    xmlhttp.open("GET", "getProducts.php?q=" + string, true);
    xmlhttp.send();
  
}
</script>

</body>
</html>