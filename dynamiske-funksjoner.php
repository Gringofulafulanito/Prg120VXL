<?php
function listeboksKlasse()
{
    print("hei");
  include("db-tilkobling.php");  /* tilkobling til database-server og valg av database utført */

  $sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen"); 
    /* SQL-setning sendt til database-serveren */
	
  $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */

  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */
      $klasse=$rad["klassekode"]; 
      $klassenavn=$rad["klassenavn"];
      $studiumkode=$rad("studentkode");

      print("<option value='$klasse'>$klassenavn $studiumkode</option>");  /* ny verdi i listeboksen laget */
    }
}




function listeboksstudent()
{
  include("db-tilkobling.php");  /* tilkobling til database-server og valg av database utført */
      
  $sqlSetning="SELECT * FROM student ORDER BY student;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen"); 
    /* SQL-setning sendt til database-serveren */
	
  $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */

  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */
      $student=$$rad["student"]; 
      $brukernavn=$rad["brukernavn"];
      

      print("<option value='$student'>$brukernavn</option>");  /* ny verdi i listeboksen laget */
    }
}




?>