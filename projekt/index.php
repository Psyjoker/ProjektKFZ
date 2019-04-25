<!DOCTYPE html>

<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
  <title>Kfz</title>
<div>
  <ul>
    <ul> 
      <li><a href="index.php"> Home(Kunden)</a></li>
      <li><a href="auftrag/auftrag.php">Auftrag</a></li>
      <li><a href="teile/teile.php">Teile</a></li>
      <li><a href="fahrzeuge/fahrzeug.html">Reperatur</a></li>  
    </ul>
  </ul>
</div>
</head>
  <button class="button" style="vertical-align:left" data-toggle="modal" data-target="#exampleModalPreview">
    <span>Kunde</span> 
  </button>
  <p class="sample"><input  type="text" id="myInput" onkeyup="myFunction()" placeholder="Kunden suche..."></p>
<table id="myTable">
  <tr class="header">
    <th></th>
  </tr>
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=dbkfz', 'root', '');

    $sql = "SELECT kundennummer, anrede, titel, vorname, nachname, gebdat, strasse, plz, ort, telefon, email, newsletter, kommentar, kundeseit, anzeige FROM kunde";
    foreach ($pdo->query($sql) as $row) { ?>
  <tr>
    <td> 
      <button onclick="document.getElementById('id01<?php echo $row['kundennummer']; ?>').style.display='block'" class="w3-button">
        <?php
        $anzeigen= "<h4>".$row['kundennummer']." | ".$row['anrede']." ".$row['vorname']." ".$row['nachname']."<h4>";

          if ($row['anzeige'] > null ){}
          else {
            echo $anzeigen;
            };
        ?>
      </button>
    </td>
  </tr>
  <div class="w3-container">
    <div id="id01<?php echo $row['kundennummer']; ?>" class="w3-modal">
      <div class="w3-modal-content">
        <div class="w3-container">
          <span onclick="document.getElementById('id01<?php echo $row['kundennummer']; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
          <div class="row">
  <div class="column">
  <h2>Kunde</h2>
  <li><?php echo
        $row['kundennummer']." <br /> "
        .$row['anrede']." <br />"
        .$row['titel']."<br />"
        .$row['vorname']."<br />"
        .$row['nachname']."<br />"
        .$row['gebdat']."<br />"
        .$row['strasse']."<br />"
        .$row['plz']."<br />"
        .$row['ort']."<br />"
        .$row['telefon']."<br />"
        .$row['email']."<br />"
        .$row['newsletter']."<br />"
        .$row['kommentar']."<br />"
        .$row['kundeseit'];
     ?></li>
  </div>
  <div class="column" style="background-color:#bbb;"> 
    <div>
      <button type="button" class="btn btn-success"><a href="fahrzeuge/fahrzeugeingabe.php?kundeid=<?= htmlspecialchars(urlencode($row['kundennummer']), ENT_COMPAT, 'UTF-8') ?> "btn btn-primary">Neues Fahrzeug Anlegen</a></button>
    </div>
      <span onclick="document.getElementById('id01<?php echo $row['kundennummer']; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
      <h2>Fahrzeuge</h2>
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=dbkfz', 'root', '');

    $sql = "SELECT fzid, kundeid,	marke, typ,	kennzeichen, fahrgestellnummer, nationalcode,	motorkennzeichen,	getriebekennzeichen, farbe, treibstoff,	leistung,	hubraum, erstzulassung FROM fahrzeug";
    foreach ($pdo->query($sql) as $row) { ?>
    <li><?php echo
      $row['fzid']." <br /> "
      .$row['kundeid']." <br />"
      .$row['marke']." <br />"
      .$row['typ']." <br />"
      .$row['kennzeichen']." <br />"
      .$row['fahrgestellnummer']." <br />"
      .$row['nationalcode']." <br />"
      .$row['motorkennzeichen']." <br />"
      .$row['getriebekennzeichen']." <br />"
      .$row['farbe']." <br />"
      .$row['treibstoff']." <br />"
      .$row['leistung']." <br />"
      .$row['hubraum']." <br />"
      .$row['erstzulassung']; 
     ?> </li>

 </div>
<?php } }?>
</div>
  </div>
</div>
                      
        </div>
      </div>
    </div>
  </div>


</table>


<!-- Suche -->
<script>
function myFunction() {
  // Declarierte Variablen für Filter
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop für Filter/Suche
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<!-- Suche ende -->
<script>
// Modal Zuweisung
var modal = document.getElementById('id01');

// Bei click modal schließen
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>



<!-- Button Kunde anlegen-->
<div class="modal fade right" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalPreviewLabel"> Neuen Kunde anlegen</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<!-- Button Kunde anlegen ende -->
<!-- Modal Kunde anlegen -->
        <div class="modal-body">
            <form action="kunden/kunden.php" method="GET">
              <table border="0" cellspacing="2" cellpadding="2">
                <tbody>
                  <tr>
                    <td align="right">Kundennummer:</td>
                    <td>
                      <input maxlength="20" name="txtkundennummer" size="20" type="text" required />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">Anrede:</td>
                    <td>
                      <select name="txtanrede">
                        <option value="0">Bitte wählen</option>
                        <option value="Herr">Herr</option>
                        <option value="Frau">Frau</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                      <td align="right">Titel:</td>
                      <td>
                        <input maxlength="5" name="txttitel" size="3" type="text" />
                      </td>
                  <tr>
                    <td align="right">Vorname:</td>
                    <td>
                      <input maxlength="50" name="txtvorname" size="20" type="text" required />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">Nachname:</td>
                    <td>
                      <input maxlength="50" name="txtnachname" size="20" type="text" required />
                    </td>
                  </tr>
                  <tr>
                      <td align="right">Geb. Datum:</td>
                      <td>
                        <input maxlength="50" name="txtgeb" size="7" type="date" />
                      </td>
                  <tr>
                    <td align="right">Strasse:</td>
                    <td>
                      <input maxlength="50" name="txtstrasse" size="20" type="text" required />
                    </td>
                  </tr>
                  <tr>
                  <td align="right">PLZ:</td>
                  <td>
                    <input maxlength="5" name="txtplz" size="6" type="text" required />
                  </td>
                  </tr>
                  <tr>
                    <td align="right">Ort:</td>
                    <td>
                      <input maxlength="50" name="txtort" size="20" type="text" required />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">Telefon:</td>
                    <td>
                      <input name="txttelefon" size="20" type="text" value="0043" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">Email:</td>
                    <td>
                      <input maxlength="80" name="txtemail" size="20" type="text" />
                    </td>
                  </tr>
                  <tr>
                      <td align="right">Newsletter:</td>
                      <td>
                        <select name="txtnews">
                          <option value="0">Bitte wählen</option>
                          <option value="ja">Ja</option>
                          <option value="nein">Nein</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td align="right">Kommentar:</td>
                      <td>
                        <input maxlength="50" name="txtkommentar" size="10" type="text" />
                      </td>
                    </tr>
                    <tr>
                      <td align="right">Kunde seit:</td>
                      <td>
                        <input maxlength="50" name="txtkundeseit" size="10" type="date" required />
                      </td>
                    </tr>
                </tbody>
              </table>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zurück</button>
            <button type="submit" class="btn btn-default">Abschicken</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Kunde anlegen ende -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
  
</body>
</html>