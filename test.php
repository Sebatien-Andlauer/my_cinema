<div class="contenuAff">
	<?php
	if($reponse = $bdd->query("SELECT * FROM film WHERE date_debut_affiche <= CURDATE() AND  date_fin_affiche >= CURDATE() ORDER BY titre ASC"))
		{
		 while ($donnees = $reponse->fetch())
			{
			?>
		<div class="movies-t">
			<p class="title"><?php echo $donnees['titre']; ?></p>
		</div>
		<?php
			}
			}
		?>
		</div>
<div class="check" >
    <?php
	if (isset($_POST['titre']) && isset($_POST['resume']) && isset($_POST['debut']) && isset($_POST['fin']) && isset($_POST['duree'])) 
		{		
			$titre=$_POST['titre'];
			$resume=$_POST['resume'];
			$debut=$_POST['debut'];
			$fin=$_POST['fin'];
			$duree=$_POST['duree'];
			$check = true;
			$genre = (isset($_POST['genre'])) ? '\''.$_POST['genre'].'\'' : 'NULL';
			$distrib=(isset($_POST['distrib'])) ? '\''.$_POST['distrib'].'\'' : 'NULL' ;
			$product = (isset($_POST['product']) && !empty($_POST['product'])) ? '\''.$_POST['product'].'\'' : 'NULL' ;		
			if($reponse = $bdd->query("SELECT id_film FROM film ORDER BY id_film DESC LIMIT 1 "))
				{
				    $getId = $reponse->fetch();
					$id = intval($getId['id_film']) + 1;
					if($bdd->query("INSERT INTO film (`id_film`,`id_genre`,`id_distrib`,`titre`,`resum`,`date_debut_affiche`,`date_fin_affiche`,`duree_min`,`annee_prod`) VALUES ('$id',$genre,$distrib,\"$titre\",\"$resume\",'$debut','$fin','$duree',$product)"))
						{
						    header("Refresh: 0;url=http://localhost/PHP_my_cinema/add_film.php"); 									
						}							
				}		
		}						
		?>	
</div>
<div class="content"> 	
	<div class="add_film"> 	
		<form method="post" class="inscription" action="add_film.php">
			<select name="genre" class="genre form-control movieAdd">
			<option value="" disabled selected hidden>Sélectionner un genre</option>
			<?php			   
				$reponse = $bdd->query('SELECT * FROM genre');
				while ($donnees = $reponse->fetch())
					{
			?>
			<option value="<?php echo $donnees['id_genre']; ?>"><?php echo $donnees['nom']; ?></option> 
			<?php
				    }			  
					$reponse->closeCursor(); 
			?>
			</select><br/>
			<select name="distrib" class="distrib form-control movieAdd">
			<option value="" disabled selected hidden>Sélectionner une distribution</option>
				<?php			   
				$reponse = $bdd->query('SELECT * FROM distrib');
				while ($donnees = $reponse->fetch())
					{
				?>
			<option value="<?php echo $donnees['id_distrib']; ?>"><?php echo $donnees['nom']; ?></option> 
				<?php
				}			  
				$reponse->closeCursor(); 
				?>
			</select><br/>
			<input type="text" placeholder="titre" name = "titre" class="titre form-control movieAdd" required /><br/>
			<textarea name='resume' class='resume form-control movieAddTxt'  placeholder='Ajouter résumé' maxlength="250" required></textarea><br/>
			<label for="debut">*Début affiche:   </label>
			<input type="date" name="debut" id="debut" class="form-control dateDebut" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"/><br/>
			<label for="fin">*Fin affiche:   </label>
			<input type="date" name="fin" id="fin" class="form-control dateDebut" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"/><br/>
			<input type="text" placeholder="durée minute" name = "duree" class="duree form-control movieAdd" required /><br/>
			<input type="text" placeholder="Année de production" name = "product" class="product form-control movieAdd"/><br/>
			<input type="submit" name="send" value="Send" class="btn addfilm" /> 
		</form>
</div>
