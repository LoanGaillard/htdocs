<?php
    function factorielle($nbr) 
    { 
       if($nbr === 0)
          return 1;  
      else 
          return $nbr*factorielle($nbr-1); 
    } 
    echo factorielle(20);

    echo '<br></br>';
   
    function convfran($fran)
    {
        $fran*=100;
        $fran/=6.5;
        $fran=(int)$fran;
        return $fran/100;
    }

    for ($i= 1; $i <= 1001 ; $i<=+50) { 
        echo'<p>'.($i-1).'franc='.
    }
?>