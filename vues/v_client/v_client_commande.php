<br><br><br><br><br><br>
<div class="container">
	<div class="row">
		<div class="col m12">
			<h4 class="center-align"> Mes commandes en cours :</h4>
			<hr style="width: 80%;">
			<br><br>
			<!-- Affichage des commandes dans un tableau -->
			<table class="striped centered responsive-table">
				<tr>
					<th class="center-align"> N°commande </th>
					<th class="center-align"> Date commande</th>
					<th class="center-align"> Montant total</th>
				</tr>

				<?php 
				$req = mesCommandes();
				$data = $req->rowCount();
				$i = 0; //num de commande

				if ($data == 0) //Si il n'y a pas de commande pour ce client alors
				{
					echo "<tr><td>Vous n'avez aucune commande en cours </ td></tr>";
				}
				else
				{
					while ($donnees = $req->fetch())
					{	
						$i++;
						echo "<tr>";
						echo "<th class=\"center-align\">";
						echo $i;
						echo "</th>";
						
						echo "<th class=\"center-align\">";
						echo $donnees['date_commande'];
						echo "</th>";	
						
						echo "<th class=\"center-align\">";
						echo $donnees['montant_commande']."€";
						echo "</th>";	
						echo "</tr>";
					} 
				}		
				?>
			</table>

		</div>	
	</div>
</div>
<br><br><br><br><br>