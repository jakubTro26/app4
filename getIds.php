<?php


   global $responseArray;

   $responseArray=array();

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


 


$q = $_REQUEST["q"];



$idArray = explode(',', $q);



get_products_ids();


array_push($responseArray,$responseString);

array_push($responseArray,$productIdsArray);


echo json_encode($responseArray);


function get_products_ids(){


    

    global $categoryArray;

    global $productIdsArray;

    global $idArray;

    global $idCount;

    global $responseString;

    $idCount = 0;

    $productIdsArray = array();

    foreach($idArray as $category)
        {
            
          $needle =  array_key_exists($category , $categoryArray);
            
          if(true == $needle){

            
          
        
            
                 $methodParams = '{
                     "inventory_id":'. $categoryArray[$category] .'
                
                 }';
                 $apiParams = [
                     "method" => "getInventoryProductsList",
                    "parameters" => $methodParams
                ];

                $options = array(
                    CURLOPT_RETURNTRANSFER => true,   // return web page
                    CURLOPT_HEADER         => false,  // don't return headers
                    CURLOPT_FOLLOWLOCATION => true,   // follow redirects
                    CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
                    CURLOPT_ENCODING       => "",     // handle compressed
                    CURLOPT_USERAGENT      => "test", // name of client
                    CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
                    CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
                    CURLOPT_TIMEOUT        => 120,    // time-out on response
                    CURLOPT_POST           => 1,
                    CURLOPT_HTTPHEADER     => ["X-BLToken: 2001325-2004269-W4ZO31ZQNSLN0NI8ITHJ3Q1R71L479QBKOGVABB9YBXJXF6BZZQPFOLMN7IT5BJV"],
                    CURLOPT_POSTFIELDS     => http_build_query($apiParams),

                ); 


                $ch = curl_init("https://api.baselinker.com/connector.php");
                curl_setopt_array($ch, $options);

                $content  = curl_exec($ch);

                

                $json=json_decode($content);
                
                


               $categoryString = 'category'. $categoryArray[$category];

               $productIdsArray[$categoryString] = array();

              $idCount=0;

                foreach ($json->products as $product){
                    $idCount++;
                    array_push($productIdsArray[$categoryString],$product->id);
                }

                

              
               
                $responseString .= $category . ',' . $idCount . ',';
               
                
                
               

                curl_close($ch);

                array_push($productIdsArray[$categoryString],$idCount);
        }

    }
 
    
 
    return $content;

 }




?>