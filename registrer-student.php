<?php  /* registrer-student */
/*
/*  Programmet lager et html-skjema for å registrere et poststed
/*  Programmet registrerer data (postnr og poststed) i databasen
*
*/
include("dynamiske-funksjoner.php"); 
?> 

<h3>Registrer Student </h3>

<form method="post" action="" id="registrerStudentSkjema" name="registrerStudentSkjema">
  brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
  fornavn <input type="text" id="fornavn" name="fornavn" required /> <br/>
  etternavn <input type="text" id="etternavn" name="etternavn" required /> <br/>
 Klasse <select name="klassekode" id="klassekode">
<?php print("<option value=''>velg klasse</option>");
  listeboksKlasse();?>
  </select>  <br/> 

  <input type="submit" value="Registrer student" id="registrerstudentdKnapp" name="registrerstudentdKnapp" /> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php 
  if (isset($_POST["registrerstudentdKnapp"]))
    {
      $brukernavn=$_POST["brukernavn"];
      $fornavn=$_POST["fornavn"];
      $etternavn=$_POST["etternavn"];
      $klassekode=$_POST["klassekode"];

      if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode)
        {
          print ("B&aring;de brukernavn, fornavn, etternavn og studentkode m&aring; fylles ut");
        }
      else
        {
          include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="SELECT * FROM student";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

          if ($antallRader!=0)  /* student er registrert fra før */
            {
              print ("Studenten er registrert fra f&oslashr");
            }
          else
            {
              $sqlSetning="INSERT INTO student(brukernavn,fornavn,etternavn,klassekode) VALUES('$brukernavn','$fornavn','$etternavn','$klassekode');";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
                /* SQL-setning sendt til database-serveren */

              print ("F&oslash;lgende student er n&aring; registrert: $brukernavn, $fornavn, $etternavn, $klassekode"); 
            }
        }
    }
?> 