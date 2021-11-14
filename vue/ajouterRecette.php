<script>
var nbEtape = document.getElementById("nombreEtape");
nbEtape.addEventListener("change",function(e){ //On ajoute un ecouteur d'evenement de type change, et on appelle l'evenement e
    var div = document.getElementById("numero_etape");
    div.innerHTML= '';
    var x = e.target.value; //On recupere la value du select
    for(i=1;i<=x;i++){
        var div_input = document.createElement("div");
        var label_input = document.createElement("label");
        label_input.innerHTML='Étape '+i;
        div_input.appendChild(label_input); //on ajoute le label dans la div input
 
        var textarea = document.createElement("textarea");
        textarea.setAttribute("class","form-control");
        textarea.setAttribute("name","etape"+i);
        textarea.setAttribute("required","required");
        div_input.appendChild(textarea);
        div.appendChild(div_input); //ajoute textarea dans div     
    }
})
</script>

<form role="form" name="form" action="includes/actions/creerpartie.php" method="post">
            
</form>

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
    <label for = "nom">Temps de préparation</label>
        <input type="time" name="temps" min="00:00" max="23:59" required>
    </p>

    <p>
    <label for = "nom">Difficulté</label>
        <SELECT name="difficulte">
		    <option value=''>----</option>
			<option value='debutant'>Débutant</option>
            <option value='intermediaire'>Intermédiaire</option>
            <option value='confirme'>Confirmé</option>
            <option value='expert'>Expert</option>
        </SELECT>
    </p>

    <p>
        <label for = "nom">Ingredients</label>
        <textarea placeholder="Entrer vos ingredients" name="ingredients" required></textarea>
    </p>

    <p>
        <div class="form-group">
                <div class="form-group">
                     <label for="inputPassword1" class="col-sm-8 control-label center-block">Description Nombre d'étapes</label>
                        <select required class="form-control" name='nombreEtape' id='nombreEtape'>
                            <option value="" disabled selected >Sélectionne le nombre d'étape'</option>
                            <option name='newpartie_nombrejoueur'>2</option>
                            <option name='newpartie_nombrejoueur'>3</option>
                            <option name='newpartie_nombrejoueur'>4</option>
                            <option name='newpartie_nombrejoueur'>5</option>
                        </select>
                        <div id="numero_etape"></div>
                </div>
            </div>           
    </p>
    
    <p>
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000000000000000000000000000000000000000000000000000000000000000000" />
		<label for = "img">Transfère le fichier (*)</label>
		<input type="file" name="nomIMG" />
    </p>

    <input type = "submit" value = "Valider" name = "valider">
    <input type = "reset" value = "Annuler" name = "annuler"> 
</form>