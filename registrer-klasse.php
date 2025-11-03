<?php  /* registrer-poststed */
/*
/*  Programmet lager et html-skjema for å registrere et poststed
/*  Programmet registrerer data (postnr og poststed) i databasen
*/
?> 

<h3>Registrer klasse </h3>

<form method="post" action="" id="registrerklasseSkjema" name="registrerklasseSkjema">
  Klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/>
  Klassenavn <input type="text" id="klassenavn" name="klassenavn" required /> <br/>
  Studentkode <input type="text" id="studentkode" name="studentkode" required /> <br/>
  <input type="submit" value="Registrer klasse" id="registrerklasseedKnapp" name="registrerklasseKnapp" /> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php 
  if (isset($_POST ["registrerklasseKnapp"]))
    {
      $klassekode=$_POST ["klassekode"];
      $klassenavn=$_POST ["klassenavn"];
      $studentkode=$_POST ("studentkode");

      if (!$klassekode || !$klassenavn || $studentkode )
        {
          print ("B&aring;de klassekode, klassenavn og studentkode m&aring; fylles ut");
        }
      else
        {
          include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="SELECT * FROM klasse;";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

          if ($antallRader!=0)  /* klasse er registrert fra før */
            {
              print ("klasse er registrert fra f&oslashr");
            }
          else
            {
              $sqlSetning="INSERT INTO klasse VALUES('$klassekode','$klassenavn','$studentkode ');";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
                /* SQL-setning sendt til database-serveren */

              print ("F&oslash;lgende klasse er n&aring; registrert: $klassekode $klassenavn $studentkode"); 
            }
        }
    }
?> 