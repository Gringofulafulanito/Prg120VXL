<?php  /* slett-student */
/*
/*  Programmet lager et skjema for å velge en student som skal slettes  
/*  Programmet sletter den valgte studenten
*/
?> 

<script src="funksjoner.js"> </script>

<h3>Slett student</h3>

<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema" onSubmit="return bekreft()">
  <?php include("dynamiske-funksjoner.php"); listeboksstudent(); ?> 
  </select>  <br/>
  <input type="submit" value="Velg student" id="velgStudentKnapp" name="velgStudentKnapp" /> 
  <input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" /> 
</form>

<?php
  if (isset($_POST ["slettStudentKnapp"]))
    {	
      $student=$_POST ["student"];
	  
	  if (!$student)
        {
          print ("Student m&aring; fylles ut");
        }
      else
        {
          include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="SELECT * FROM student WHERE student='$student';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

          if ($antallRader==0)  /* studenten er ikke registrert */
            {
              print ("student finnes ikke");
            }
          else
            {	  
              $sqlSetning="DELETE FROM student WHERE student='$student';";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
                /* SQL-setning sendt til database-serveren */
		
              print ("F&oslash;lgende student er n&aring; slettet: $student  <br />");
            }
        }
    }
?> 