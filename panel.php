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
 foreach($categoryArray as $category=>$id){
     ?>
    
    <div><input type="checkbox"><?php echo $category ?></div>
    <?php
 }

 ?>

    </div>

 <div class="generuj" onkeyup="getValues()">
 Generuj plik XMl
 </div>

 <script>
function getValues(){
  document.querySelectorAll('.kategorie div').forEach(function(e){console.log(e.innerText)})
}

function doRequest() {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        
      }
    };
    xmlhttp.open("GET", "getProducts.php?q=" + str, true);
    xmlhttp.send();
  
}
</script>