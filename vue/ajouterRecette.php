<form enctype="multipart/form-data" method="post"  action="index.php?uc=controleur&action=confirmeAjoutRecette">
    <h1>Ajout d'une recette</h1>

    <p>
        <label for = "nomRec">Nom de la recette</label>
        <input type = "text"  name = "nomRec" size = "40" maxlength = "45" placeholder = "Nom de la recette" required>
    </p>

    <label for = "typeRec">Type de la recette</label>
	<SELECT name="typeRec">
		<?php foreach($rec as $name):?>
			<option><?php echo $name['categorieId'];?> - <?php echo $name['nomC'];?></option>
		<?php endforeach;?>
    </SELECT>

    <p>
        <label for = "nom">Ingredients</label>
        <textarea placeholder="Entrer vos ingredients" name="ingredients" required></textarea>
    </p>

    <p>
    <label for = "nom">Description</label>
        <textarea placeholder="Entrer la recette détaillé" name="description" required></textarea>
    </p>
    
    <p>
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000000000000000000000000000000000000000000000000000000000000000000" />
		<label for = "img">Transfère le fichier (*)</label>
		<input type="file" name="nomIMG" />
    </p>

    <input type = "submit" value = "Valider" name = "valider">
    <input type = "reset" value = "Annuler" name = "annuler"> 
</form>