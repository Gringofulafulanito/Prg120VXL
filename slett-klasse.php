<?php  /* slett-klasse */
/*
/*  Programmet lager et skjema for å velge en klasse som skal slettes  
/*  Programmet sletter det valgte klassen
*/
?> 

<script src="funksjoner.js"> </script>

<h3>Slett klasse</h3>

<form method="post" action="" id="slettklasseSkjema" name="slettklasseSkjema" onSubmit="return bekreft()">
 Klasse
  <select name="klasse" id="klasse">
<?php print("<option value=''>velg klasse</option>");
include("dynamiske-funksjoner.php"); listeboksKlasse(); ?> 
  </select>  <br/>
  <input type="submit" value="Velg klasse" id="velgklasseKnapp" name="velgKlasseKnapp" /> 
</form>
  <input type="submit" value="Slett klasse" name="slettklasseKnapp" id="slettklasseKnapp" /> 
</form>

<?php
  if (isset($_POST ["slettklasseKnapp"]))
    {	
      $klasse=$_POST ["klasse"];
	  
	  if (!$klasse)
        {
          print ("klasse m&aring; fylles ut");
        }
      else
        {
          include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klasse';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

          if ($antallRader==0)  /* klasse er ikke registrert */
            {
              print ("klasse finnes ikke");
            }
          else
            {	  
              $sqlSetning="DELETE FROM klasse WHERE klassekode='$klasse';";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
                /* SQL-setning sendt til database-serveren */
		
              print ("F&oslash;lgende klasse er n&aring; slettet: $klasse  <br />");
            }
        }
    }
?> 