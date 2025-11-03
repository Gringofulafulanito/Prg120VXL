<?php  /* vis-alle-klasseer */
/*
/*  Programmet skriver ut alle registrerte klasseer
*/
  include("db-tilkobling.php");  /* tilkobling til database-serveren utf�rt og valg av database foretatt */

  $sqlSetning="SELECT * FROM klasse;";
  
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
    /* SQL-setning sendt til database-serveren */
	
  $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */

  print ("<h3>Registrerte klasser</h3>");
  print ("<table border=1>"); 
  print ("<tr><th align=left>klassekode</th> <th align=left>klassenavn</th> <th align=left>studentkode</th></tr>"); 

  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra sp�rringsresultatet */
      $klassekode=$rad["klassekode"];        /* ELLER $klassekode=$rad[0]; */
      $klassenavn=$rad["klassenavn"]; 
      $studentkode=$rad["studentkode"];   /* ELLER $klasse=$rad[1]; */

      print ("<tr> <td> $klassekode </td> <td> $klassenavn </td> <td> $studentkode </td> </tr>");
    }
  print ("</table>"); 
?>