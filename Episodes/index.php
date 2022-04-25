<?php


  $curl = curl_init();

  curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://rickandmortyapi.com/api/episode',
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
    <link rel="stylesheet" href="./stiles.css" type="text/css" />
    <title>Document</title>
  </head>
  <body>
    <div class="start">
      <div class="title">
        <h1>Rick and Morty</h1>
      </div>

      <div class="subtitle">
        <h2>All episodes</h2>
      </div>

      
      <div class="episodies">
        
      <?php 
             foreach ($api['results'] as $key => $value) {
            
                $episodename = $value['name'];
                $episodenumber = $value['episode'];
                $issuedate = $value['air_date'];
                
            ?>
            <form action="../Details_episode/details.php" method="POST">
              <div class="card">
        
                <img src="../Img/rick&.png" class="card-img-top" alt="episode image" />

                <div class="card-body">

        
                  <h3 class="card-title"><?php echo $value['name'] ?></h3>
                  <p class="card-text"><?php echo $value['episode'] ?></p>
                  <p class="card-text"><?php echo $value['air_date'] ?></p>
                  <input style="display:none" name="url" value="<?php echo $value['url'] ?>">
                  <button type="submit">Details</button>

                </div>

              </div>
            </form>

            <?php
            }
            ?>

        </div>
        
      </div>

    </div>

  </body>
</html>
