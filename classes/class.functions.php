<?php

  Class Functions{

      function checkError( $error ){
        //check for any errors
        if(isset($error)){
          foreach($error as $error){
            echo '<p class="error">'.$error.'</p>';
          }
        }

      }

}


?>
