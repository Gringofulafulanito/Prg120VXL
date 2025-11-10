<?php  /* vis-alle-klasseer */
/*
/*  Programmet skriver ut alle registrerte studenter
*/
  include("db-tilkobling.php");  /* tilkobling til database-serveren utf�rt og valg av database foretatt */

  $sqlSetning="SELECT * FROM student;";
  
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
    /* SQL-setning sendt til database-serveren */
	
  $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */

  print ("<h3>Registrerte Studenter</h3>");
  print ("<table border=1>"); 
  print ("<tr><th align=left>studenter</th> <th align=left>klassenavn</th> <th align=left>studiumkode</th></tr>"); 

  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra sp�rringsresultatet */
      $brukernavn=$rad["brukernavn"];        /* ELLER $klassekode=$rad[0]; */
      $fornavn=$rad["fornavn"]; 
      $setternavn=$rad["etternavn"];  /* ELLER $klasse=$rad[1]; */
      $klassekode=$rad["klassekode"];

      print ("<tr> <td> $brukernavn </td> <td> $fornavn </td> <td> $etternavn </td> <td> $klassekode </td> </tr>");
    }
  print ("</table>"); 
?>