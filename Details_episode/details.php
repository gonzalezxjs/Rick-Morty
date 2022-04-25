<?php


  $curl = curl_init();

  curl_setopt_array($curl, array(
  CURLOPT_URL => $_POST['url'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  ));

  $response = curl_exec($curl);

  curl_close($curl);

  $api = json_decode($response,true);



?>















<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Details_episode/stile.css" />
    <title>Episode details</title>
  </head>
  <body>
    <div class="mastery">


    <?php 
             foreach ( [$api] as $key => $value) {
            
              $episodename = $value['name'];
              $episodenumber = $value['episode'];
              $episodeair_date =$value['air_date'];
              $episodeurl = $value['url'];
              $episodecreated = $value['created'];
              $episodecharacters = $value['characters'];
                
            ?>
      <div class="son-mastery-details">

        <div class="son-master-left">

          <div class="episode-image-cont">
            <img src="../Img/rick&.png" alt="" />
          </div>
    
          <div class="episode-title-cont">
            <h1><?php echo $value['name'] ?></h1>
          </div>
        </div>


        <div class="son-master-right">
          
          <div class="episode-details">
            <h3><?php echo $value['episode'] ?> </h3>
            <h3><?php echo $value['air_date'] ?></h3>
            <h3><?php echo $value['url'] ?></h3>
            <h3><?php echo $value['created'] ?></h3>
          </div>

        </div>

      </div>
        
      
      <div class="son-mastery-characters">

        <div class="characters-image-cont">
          <img src="../Img/w.png" alt="" style="width: 100px" />
        </div>

      </div>

      <?php
            }
      ?>        
    
    </div>

  </body>
</html>

