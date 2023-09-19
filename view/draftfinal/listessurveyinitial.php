<?php
@require_once "authentification.php";
require_once './Composant/navigation.php';
require_once './model/draftinitial.php';
?>
 
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary radius-30" data-bs-toggle="modal" data-bs-target="#AjouterUtilisateur"><i class="fa-duotone fa-plus"></i>AJOUTER</button> -->
	<br><br>
<h6 class="mb-0 text-uppercase">Liste des Draft/Draft Final</h6>
	<hr/>

<div class="card-body">
	<div class="table-responsive">
		<table id="example2" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nom Navire</th>
					<th>Call Sign</th>
					<th>Official N°</th>
					<th>Ship Management</th>
					<th>Opérators</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$obj_draft = new Draft();
				$all_draft = $obj_draft->getDraftInitialValide();
				foreach ($all_draft as $draft) {
				?>
					<tr>
						<td><?= $draft['nomNavire'] ?></td>
						<td><?= $draft['callSign'] ?></td>
						<td><?= $draft['officialNo'] ?></td>
						<td><?= $draft['shipManagement'] ?></td>
						<td><?= $draft['operators'] ?></td>
						<td class="d-flex">
							
							<button type="button" onclick="window.location.href = '?page=infodraftfinal&id=<?= $draft['id'] ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Suivant</font></font></button>&nbsp; &nbsp;
							<button type="button" onclick="recupererValeur(<?= $user['id'] ?>,'<?= $user['type'] ?>','<?= $user['first_name'] ?>','<?= $user['last_name'] ?>','<?= $user['email'] ?>')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModifierUtilisateur"><i class="bx bxs-edit"></i></button>&nbsp; &nbsp;
							<button type="button" class="btn btn-danger" onclick="showSwal('warning-message-and-cancel')"><i class="bx bxs-trash-alt"></i></button>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>



	<!-- Modal d'ajout -->
	<div class="modal fade" id="AjouterUtilisateur" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Survey Initial - Etape 1/6</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">	
				<h6 class="mb-0 text-uppercase">Information Du Navire</h6>
					<div class="card border-top border-0 border-4 border-primary">
						<div class="card-body p-5">
							<div class="card-title d-flex align-items-center">
								<div><i class="lni lni-plus me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Nouveau Draft</h5>
							</div>
							<hr>
							<form class="row g-3" method="POST" action="./controller/draftinitial.php">
							<div class="col-3">
								<label for="inputLastName1" class="form-label">Nom du Navire</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="nomNavire" class="form-control border-start-0" id="nomNavire" placeholder="Nom du Navire" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">CALL SIGN</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="callSign" class="form-control border-start-0" id="callSign" placeholder="Call Sign" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">OFFICIAL N°</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="officialN" class="form-control border-start-0" id="officialN" placeholder="Official N°" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">SHIP MANAGEMENT</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="shipManagement" class="form-control border-start-0" id="shipManagement" placeholder="Ship Management" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">OPERATORS</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="operators" class="form-control border-start-0" id="operators" placeholder="Operators" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">REGISTERED OWNERS</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="registeredOwners" class="form-control border-start-0" id="registeredOwners" placeholder="Registered Owners" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">VSA/CSO</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="vsa" class="form-control border-start-0" id="vsa" placeholder="VSA/CCSO" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">SEO</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="seo" class="form-control border-start-0" id="seo" placeholder="SEO" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">FLAG</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="flag" class="form-control border-start-0" id="flag" placeholder="Flag" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">PORT OF REG</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="portOfReg" class="form-control border-start-0" id="portOfReg" placeholder="Port Of Reg" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">BUILDERS</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="builders" class="form-control border-start-0" id="builders" placeholder="Builders" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">HULL N°</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="hull" class="form-control border-start-0" id="hull" placeholder="Hull N°" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">TYPE</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="type" class="form-control border-start-0" id="type" placeholder="Type" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">KEEL LAID</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="keelLaid" class="form-control border-start-0" id="keelLaid" placeholder="Keel Laid" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">DELIVERED</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="delivered" class="form-control border-start-0" id="delivered" placeholder="Delivered" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">CLASS SOCIETY</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="class" class="form-control border-start-0" id="class" placeholder="Class Society" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">H&M Underwrirers</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="hm" class="form-control border-start-0" id="hm" placeholder="H&M Underwrirers " />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">P&I CLUB</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="piclub" class="form-control border-start-0" id="piclub" placeholder="P&I Club" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">LOA</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="loa" class="form-control border-start-0" id="loa" placeholder="LOA" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">LBP</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="lbp" class="form-control border-start-0" id="lbp" placeholder="LBP" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">Breadth (moulded)</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="breadth" class="form-control border-start-0" id="breadth" placeholder="Breadth (moulded)" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">Depth (moulded)</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="depthMoulded" class="form-control border-start-0" id="depthMoulded" placeholder="Depth (moulded)" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">Depth (extreme)</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="depthExterne" class="form-control border-start-0" id="depthExterne" placeholder="Depth (extreme)" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">Keel plate</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="keelPlate" class="form-control border-start-0" id="keelPlate" placeholder="Keel plate" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">DWT</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="dwt" class="form-control border-start-0" id="dwt" placeholder="DWT" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">DISP</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="disp" class="form-control border-start-0" id="disp" placeholder="DISP" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">LIGHTSHIP</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="lightship" class="form-control border-start-0" id="lightship" placeholder="LIGHTSHIP" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">DRAFT (MOULDED)</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="draftMoulded" class="form-control border-start-0" id="draftMoulded" placeholder="DRAFT (MOULDED)" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">DRAFT (EXTREME)</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="draftExtreme" class="form-control border-start-0" id="draftExtreme" placeholder="DRAFT (EXTREME)" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">FP TO FORE DRAFT MARK</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="fp" class="form-control border-start-0" id="fp" placeholder="FP TO FORE DRAFT MARK" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">AP TO AFT DRAFT MARK</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="ap" class="form-control border-start-0" id="ap" placeholder="AP TO AFT DRAFT MARK" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">MIDSHIP TO MID DRAFT MARK</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="midship" class="form-control border-start-0" id="midship" placeholder="MIDSHIP TO MID DRAFT MARK" />
									</div>
							</div>
							<div class="col-3">
								<label for="inputLastName1" class="form-label">BETWEEN DRAFT MARKS</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="between" class="form-control border-start-0" id="between" placeholder="BETWEEN DRAFT MARKS" />
									</div>
							</div>
								
							
								<div >
									<button name="btn_ajout" type="submit" class="btn btn-primary px-5">Valider</button>
									<button type="reset" class="btn btn-secondary px-5" data-bs-dismiss="modal">Annuler</button>

								</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
</div>
<!-- Fin Modal Ajout Utilisateur -->



<!-- Modal Modifier Utilisateur -->
<div class="modal fade" id="ModifierUtilisateur" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Personnel/Utilisateur</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">	
				<h6 class="mb-0 text-uppercase">Formulaire de Modification</h6>
					<div class="card border-top border-0 border-4 border-primary">
						<div class="card-body p-5">
							<div class="card-title d-flex align-items-center">
								<div><i class="lni lni-pencil-alt me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Modifier Utilisateur</h5>
							</div>
							<hr>
							<form class="row g-3" method="POST" action="controller/personnelController.php">
							<div class="col-12">
									
									<div class="input-group">
										<input type="hidden" name="idUser_modif" class="form-control border-start-0" id="idUser_modif" placeholder="ID" />
									</div>
								</div>
							<div class="col-12">
								<label for="inputLastName1" class="form-label">TYPE D'UTILISATEUR</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
									<select name="typeUser_modif" id="type_utilisateur_modif" class="form-select" required>
										<option value="" disabled="disabled" selected="selected">- - Selectionner le type- -</option>
										<option value="Administrateur">Administrateur</option>
										<option value="User">User</option>
										
									</select>
								</div>
							</div>
								<div class="col-12">
									<label for="inputLastName1" class="form-label">PRENOM</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="prenom_modif" class="form-control border-start-0" id="prenom_modif" placeholder="Prenom" required />
									</div>
								</div>
								<div class="col-12">
									<label for="inputLastName2" class="form-label">NOM</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="nom_modif" class="form-control border-start-0" id="nom_modif" required/>
									</div>
								</div>
								
								
								<div class="col-12">
									<label for="inputEmailAddress" class="form-label">E-MAIL</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-envelope'></i></span>
										<input type="email" name="email_modif" class="form-control border-start-0" id="email_modif" required/>
									</div>
								</div>
								
								<div class="col-12">
									<label for="inputChoosePassword" class="form-label">MOT DE PASSE</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock'></i></span>
										<input type="password" name="mot_de_passe_modif" class="form-control border-start-0" id="mot_de_passe_modif" required />
									</div>
								</div>
								
								
								<div >
									<button name="btn_modif_utilisateur" type="submit" class="btn btn-primary px-5">Valider</button>
									<button type="reset" class="btn btn-secondary px-5" data-bs-dismiss="modal">Annuler</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
<!-- Fin Modal Modifier Utilisateur -->
<!-- Script récupération des valeurs pour une  modification -->
<script>
  function recupererValeur(idUser,typeUser,prenomUser,nomUser,email) {
    document.getElementById("idUser_modif").value = idUser;
    document.getElementById("prenom_modif").value = prenomUser;
	document.getElementById("nom_modif").value = nomUser;
    document.getElementById("email_modif").value = email;
	// document.getElementById("mot_de_passe_modif").value = motdepasse;
	document.getElementById("typeUser_modif").value = typeUser;
  }
</script>
<!-- Fin Script récupération des valeurs pour une  modification -->

<?php
    require_once './Composant/footer.php';
?>