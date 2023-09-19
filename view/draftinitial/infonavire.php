<?php
@require_once "authentification.php";
$prenomAgent= $_SESSION["CURRENT_user"]['first_name'];
$nomAgent= $_SESSION["CURRENT_user"]['last_name'];
$idNavire= $_GET['id'];
require_once './Composant/navigation.php';
require_once './model/infodraftinitial.php';
require_once './model/ctmainitial.php';
require_once './model/cmminitial.php';
require_once './model/tpcinitial.php';
?>


<?php
						$cmma = new Infodraftinitial($idNavire);
						$result1 = $cmma->getInfoDraftByID($idNavire);
						if(count($result1)==0){
						?>

							<h6 class="mb-0 text-uppercase">Etape 2</h6>
	<hr/>
<?php
if (isset($_GET['success_insersion'])) {
  echo "<div class='row col-md-4 offset-md-4 alert alert-success' role='alert'>
                  Enrigistrement reusssi !
               </div>";
}
if (isset($_GET['erreur_insersion'])) {
  echo "<div class='row col-md-4 offset-md-4 alert alert-danger' role='alert'>
             Erreur de Modification reusssi !
          </div>";
}
?>
<hr/>
    <h6 class="mb-0 text-uppercase">Information Draft Initial</h6>
		<div class="card border-top border-0 border-4 border-primary">
						<div class="card-body p-5">
							<div class="card-title d-flex align-items-center">
								<div><i class="lni lni-plus me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Saisi des informations sur le draft initial</h5>
							</div>
							<!-- <button type="button" href="javascipt:history.go(-1)" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Précédent</font></font></button>&nbsp; &nbsp; -->
							<hr>
							<form class="row g-3" method="POST" action="./controller/infodraftinitial.php">
                                <input type="text" hidden name="idNavire" value="<?=$idNavire?>" class="form-control border-start-0" id="idNavire" placeholder="" />
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Type de minerai</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
                                    
										<input type="text" name="typeMinerai" class="form-control border-start-0" id="typeMinerai" placeholder="Type de minerai" />
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Teneur en eau</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="text" name="teneurEau" class="form-control border-start-0" id="teneurEau" placeholder="Teneur en eau" />
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Teneur en silice (SIO2)</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="text" name="teneurSilice" class="form-control border-start-0" id="teneurSilice" placeholder="Teneur en silice (SIO2)" />
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Teneur en alumin (AI2O3)</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="text" name="teneurAlumin" class="form-control border-start-0" id="teneurAlumin" placeholder="Teneur en alumin (AI2O3)" />
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Inspecteur Minier</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="text" readonly name="inspecteur" value='<?=$prenomAgent ?>&nbsp;<?=$nomAgent?>' class="form-control border-start-0" id="inspecteur" placeholder="" />
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Nom du port de départ</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="text" name="nomPortDepart" class="form-control border-start-0" id="nomPortDepart" placeholder="Nom du port de départ" />
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Nom du port de déstination</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="text" name="nomPortDestination" class="form-control border-start-0" id="nomPortDestination" placeholder="Nom du port de déstination" />
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Nom du Capitaine</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="text" name="nomCapitaine" class="form-control border-start-0" id="nomCapitaine" placeholder="Nom du Capitaine" />
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">IMO Number</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="text" name="imo" class="form-control border-start-0" id="imo" placeholder="IMO Number" />
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Date entrée Navire</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="date" name="dateEntreNavire" class="form-control border-start-0" id="dateEntreNavire" placeholder="Date entrée Navire" />
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Date Survey Initial</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="date" readonly name="dateSurveyInitial" class="form-control border-start-0" id="dateSurveyInitial" placeholder="Date Survey Initial" />
										<script>
                                		document.getElementById("dateSurveyInitial").valueAsDate = new Date();
                                		</script>
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Heure Survey Initial</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="text" readonly name="heureSurveyInitial" class="form-control border-start-0" id="heureSurveyInitial" placeholder="Heure Survey Initial" />
										<script>
											var d = new Date();
											var hours = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
											// console.log(hours);
                                			document.getElementById("heureSurveyInitial").value = hours;
                                		</script>
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Société Miniére</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="text" name="societeMiniere" class="form-control border-start-0" id="societeMiniere" placeholder="Société Miniére" />
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Agence Maritime</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="text" name="agenceMaritime" class="form-control border-start-0" id="agenceMaritime" placeholder="Agence Maritime" />
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Destinataire des échantillons</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="text" name="destinataireEchantillons" class="form-control border-start-0" id="destinataireEchantillons" placeholder="Destinataire des échantillons" />
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Nombre de Cale</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" name="nombreCale" class="form-control border-start-0" id="nombreCale" placeholder="Nombre de Cale" />
									</div>
							</div>
							<div class="col-md-6">
								<label for="inputLastName1" class="form-label">Informations Complémentaire</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="text" name="infoComplémentaire" class="form-control border-start-0" id="infoComplémentaire" placeholder="Informations Complémentaire" />
									</div>
							</div>
												
							
								<div >
									<button name="btn_ajout_etape2" type="submit" class="btn btn-primary px-5">Valider</button>
									<button type="reset" class="btn btn-secondary px-5" data-bs-dismiss="modal">Annuler</button>

								</div>
							</form>
						</div>
					</div>

						<?php
						}else{
							?>
							<div class="card-body">
								<h6 class="mb-5 text-uppercase">Informations Etape 2</h6>
	<div class="table-responsive">
		<table id="example2" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Type Minerai</th>
					<th>Teneur en Eau</th>
					<th>Teneur En Silice</th>
					<th>Teneur En Alumin</th>
					<th>Inspecteur Minier</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				$cmma = new Infodraftinitial($idNavire);
				$result1 = $cmma->getInfoDraftByID($idNavire);
				foreach ($result1 as $result) {
				?>
					<tr>
						<td><?= $result['typeMinerai'] ?></td>
						<td><?= $result['teneurEau'] ?></td>
						<td><?= $result['teneurSilice'] ?></td>
						<td><?= $result['teneurAlumin'] ?></td>
						<td><?= $result['inspecteurMinier'] ?></td>
						
						
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
							<?php
						}
?>
			
					

        <?php
    require_once './Composant/footer.php';
?>