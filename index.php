<?php
require_once('config/db.php');
?>
<html>
<head>
<title>GESTIONE DIABETICI</title>
	<style>
body{width:100%;font-family:arial;letter-spacing:1px;line-height:20px;}
.tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;vertical-align:top;}
.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
</style>
</head>
<body>
<?php	
	$pdo_statement = $db->prepare("SELECT * FROM clienti ORDER BY cognome ASC");
	$pdo_statement ->bindValue(':id', $id, PDO::PARAM_INT);
	$pdo_statement ->bindvalue(':cognome' , $cognome, PDO::PARAM_STR);
	$pdo_statement ->bindvalue(':nome' , $nome, PDO::PARAM_STR);
	$pdo_statement ->bindvalue(':codice_fiscale' , $codice_fiscale, PDO::PARAM_STR);
	$pdo_statement ->bindvalue(':codice_verifica' , $codice_verifica, PDO::PARAM_STR);
	$pdo_statement ->bindvalue('piano_terapeutico' , $piano_terapeutico, PDO::PARAM_STR);
	$pdo_statement ->bindvalue('note' , $note, PDO::PARAM_STR );
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
	<div style="text-align:right;margin:20px 0px;">
	<a href="crea_cliente.php" class="button_link"><img src="images/icon/add.png" title="Aggiungi Nuovo Cliente" style="vertical-align:bottom;" /> Crea Cliente</a>
	<a href="prodotti.php" class="button_link"><img src="images/icon/add.png" title="Aggiungi Nuovo Prodotto" style="vertical-align:bottom;" /> Prodotti</a>
	<a href="categorie.php" class="button_link"><img src="images/icon/add.png" title="Aggiungi Nuovo Categoria" style="vertical-align:bottom;" /> Categorie</a>
	<a href="erogazioni.php" class="button_link"><img src="images/icon/add.png" title="Aggiungi Nuova Erogazione" style="vertical-align:bottom;" /> Erogazioni</a></div>
	
<table width="100%" class="tbl-qa">
<thead>
	<tr>
	  <th class="table-header" width="20%">Cognome</th>
	  <th class="table-header" width="20%">Nome</th>
	  <th class="table-header" width="15%">Codice Fiscale</th>
	  <th class="table-header" width="5%">Codice Verifica</th>
	  <th class="table-header" width="15%">Piano Terapeutico</th>
	  <th class="table-header" width="25%">Note</th>
	  <th class="table-header" width="5%">Azioni</th>
	</tr>
  </thead>
	<tbody id="table-body">
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
	  <tr class="table-row">
		<td><?php echo $row["cognome"]; ?></td>
		<td><?php echo $row["nome"]; ?></td>
	    <td><?php echo $row["codice_fiscale"]; ?></td>
		<td><?php echo $row["codice_verifica"]; ?></td>
		<td><?php echo $row["piano_terapeutico"]; ?></td>
		<td><?php echo $row["note"]; ?></td>
		<td><a class="ajax-action-links" href='aggiorna_cliente.php?id=<?php echo $row['id']; ?>'><img src="images/icon/edit.png" title="Edit" /></a> <a class="ajax-action-links" href='cancella_cliente.php?id=<?php echo $row['id']; ?>'><img src="images/icon/delete.png" title="Delete" /></a></td>
	  </tr>
    <?php
		}
	}
	?>
	</tbody></table>
</body>
</html>