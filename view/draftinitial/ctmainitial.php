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
			$ctma = new Ctmainitial($idNavire);
			$result1 = $ctma->getCtmaInitialByID($idNavire);
			if(count($result1)==0){
?>
			<h6 class="mb-0 text-uppercase">Etape 3</h6>
	<hr/>

    <h6 class="mb-0 text-uppercase">Information Draft Initial</h6>
					
					<div class="card border-top border-0 border-4 border-primary">
						<div class="card-body p-5">
							<div class="card-title d-flex align-items-center">
								<div><i class="lni lni-plus me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Calcul des tirants moyens apparents</h5>
							</div>
							<hr>
							<form class="row g-3" method="POST" action="./controller/ctmainitial.php">
                                <input type="number" hidden name="idNavire" value="<?=$idNavire?>" class="form-control border-start-0" id="idNavire" placeholder="" />
							<div class="row">
								<div class="col-4">
								<label for="inputLastName1" class="form-label">TEavbd</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
                                    
										<input type="number" required step="any" name="teavbd" class="form-control border-start-0" id="teavbd" placeholder="TEavbd" />
									</div>
							</div>
							<div class="col-4">
								<label for="inputLastName1" class="form-label">TEavtb</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" required onkeyup="calculerTEav();" step="any" name="teavtb" class="form-control border-start-0" id="teavtb" placeholder="TEavtb" />
									</div>
							</div>
							<div class="col-4">
								<label for="inputLastName1" class="form-label">TEav</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" readonly step="any" name="teav" class="form-control border-start-0" id="teav" placeholder="" />
									</div>
							</div>
							</div>
							<div class="row">
								<div class="col-4">
								<label for="inputLastName1" class="form-label">TEarbd</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
                                    
										<input type="number" required step="any" name="tearbd" class="form-control border-start-0" id="tearbd" placeholder="TEarbd" />
									</div>
							</div>
							<div class="col-4">
								<label for="inputLastName1" class="form-label">TEartb</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" required onkeyup="calculerTEar();" step="any" name="teartb" class="form-control border-start-0" id="teartb" placeholder="TEartb" />
									</div>
							</div>
							<div class="col-4">
								<label for="inputLastName1" class="form-label">TEar</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" readonly step="any" name="tear" class="form-control border-start-0" id="tear" placeholder="" />
									</div>
							</div>
							</div>
							<div class="row">
								<div class="col-4">
								<label for="inputLastName1" class="form-label">TEMbd</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
                                    
										<input type="number" required step="any" name="tembd" class="form-control border-start-0" id="tembd" placeholder="TEMbd" />
									</div>
							</div>
							<div class="col-4">
								<label for="inputLastName1" class="form-label">TEMtb</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" required onkeyup="calculerTEM();" step="any" name="temtb" class="form-control border-start-0" id="temtb" placeholder="TEMtb" />
									</div>
							</div>
							<div class="col-4">
								<label for="inputLastName1" class="form-label">TEM</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" readonly step="any" name="tem" class="form-control border-start-0" id="tem" placeholder="" />
									</div>
							</div>
							</div>
							<h5 class="mb-0 text-primary">Calcul de l'Assiette Apparente ou (Apparent Trim)</h5>
							<div class="col-4">
								<label for="inputLastName1" class="form-label">Apparent Trim</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" readonly step="any" name="apparentTrim" class="form-control border-start-0" id="apparentTrim" placeholder="" />
									</div>
							</div>
							<h5 class="mb-0 text-primary">Calcul de la distance entre les marques avant et arriéres</h5>
							<div class="row">
								<div class="col-6">
									<label for="inputLastName1" class="form-label">L</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" required step="any" name="L" class="form-control border-start-0" id="L" placeholder="" />
									</div>
								</div>

								<div class="col-6">
									<label for="inputLastName1" class="form-label">l1</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" required step="any" name="l1" class="form-control border-start-0" id="l1" placeholder="" />
									</div>

									<label for="inputLastName1" class="form-label">l2</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" required step="any" name="l2" class="form-control border-start-0" id="l2" placeholder="" />
									</div>

									<label for="inputLastName1" class="form-label">l3</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" required step="any" onkeyup="calculerl();calculerCorrection();calculerCorrectionTirants();" name="l3" class="form-control border-start-0" id="l3" placeholder="" />
									</div>

									<label for="inputLastName1" class="form-label">l</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" step="any" readonly name="lL" class="form-control border-start-0" id="lL" placeholder="" />
									</div>
								</div>
							</div>

							<h5 class="mb-0 text-primary">Correction à apporter aux tirants apparents</h5>
							<div class="row">
								<div class="col-6">
									
								</div>

								<div class="col-6">
									<label for="inputLastName1" class="form-label">Corr.avant</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" readonly step="any" name="corrAv" class="form-control border-start-0" id="corrAv" placeholder="" />
									</div>

									<label for="inputLastName1" class="form-label">Corr.arr</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" readonly step="any" name="corrAr" class="form-control border-start-0" id="corrAr" placeholder="" />
									</div>

									<label for="inputLastName1" class="form-label">Corr.mil</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" readonly step="any" name="corrM" class="form-control border-start-0" id="corrM" placeholder="" />
									</div>
								</div>
							</div>

							<h5 class="mb-0 text-primary">Correction des Tirants réels</h5>
							<div class="row">
								<div class="col-6">
									
								</div>

								<div class="col-6">
									<label for="inputLastName1" class="form-label">Tav</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" readonly step="any" name="tAv" class="form-control border-start-0" id="tAv" placeholder="" />
									</div>

									<label for="inputLastName1" class="form-label">Tar</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" readonly step="any" name="tAr" class="form-control border-start-0" id="tAr" placeholder="" />
									</div>

									<label for="inputLastName1" class="form-label">TM</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" readonly step="any" name="tM" class="form-control border-start-0" id="tM" placeholder="" />
									</div>
								</div>
							</div>

							<h5 class="mb-0 text-primary">Calcul de l'Assiette réelle ou True Trim</h5>
							<div class="row">
								<div class="col-6">
									
								</div>

								<div class="col-6">
									<label for="inputLastName1" class="form-label">True Trim</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"></span>
										<input type="number" readonly step="any" name="trueTrim" class="form-control border-start-0" id="trueTrim" placeholder="" />
									</div>
								</div>
							</div>
												
							
								<div >
									<button name="btn_ajout_etape3" type="submit" class="btn btn-primary px-5">Valider</button>
									<button type="reset" class="btn btn-secondary px-5" data-bs-dismiss="modal">Annuler</button>

								</div>
							</form>
						</div>
					</div>
				</div>

                <script type="text/javascript">
						var tEav=document.getElementById('teav');
						var tEar=document.getElementById('tear');
						var tEM=document.getElementById('tem');
						var apparentTrim= document.getElementById('apparentTrim');
						var L= document.getElementById('L');
						var l1= document.getElementById('l1');
						var l2= document.getElementById('l2');
						var l3= document.getElementById('l3');
						var lL= document.getElementById('l');
						var corrAv=document.getElementById('corrAv');
						var corrAr=document.getElementById('corrAr');
						var corrM=document.getElementById('corrM');
						var tAv= document.getElementById('tAv');
						var tAr= document.getElementById('tAr');
						var tM= document.getElementById('tM');
						var trueTrim= document.getElementById('trueTrim');

						// Fonction pour calculer TEav
						function calculerTEav(){
							var teavbd =Number(document.getElementById('teavbd').value);
							var teavtb =Number(document.getElementById('teavtb').value);
							var tEav =Number((teavbd + teavtb)/2);
							document.getElementById("teav").value = tEav;
						};
						// Fonction pour calculer TEar
						function calculerTEar(){
							var tearbd =Number(document.getElementById('tearbd').value);
							var teartb =Number(document.getElementById('teartb').value);
							var tEar =Number((tearbd + teartb)/2);
							document.getElementById("tear").value = tEar;
						};
						// Fonction pour calculer TEM et apparent trim
						function calculerTEM(){
							var tEav=Number(document.getElementById('teav').value);
							var tEar=Number(document.getElementById('tear').value);
							var tembd =Number(document.getElementById('tembd').value);
							var temtb =Number(document.getElementById('temtb').value);
							var tEM =Number((tembd + temtb)/2);
							var apparentTrim = Number(tEar-tEav);
							document.getElementById("tem").value = tEM;
							document.getElementById("apparentTrim").value = apparentTrim;
						};
						// Fonction pour calculer l
						function calculerl(){
							var L =Number(document.getElementById('L').value);
							var l1 =Number(document.getElementById('l1').value);
							var l3 =Number(document.getElementById('l3').value);
							var lL =Number(document.getElementById('lL').value);
						
							var lL =Number(L-(l1 + l3));
						
							document.getElementById("lL").value = lL;
						
						};
						// Fonction pour calculer correction
						function calculerCorrection(){
							var apparentTrim= Number(document.getElementById('apparentTrim').value);
							var L =Number(document.getElementById('L').value);
							var l1 =Number(document.getElementById('l1').value);
							var l2 =Number(document.getElementById('l2').value);
							var l3 =Number(document.getElementById('l3').value);
							var lL =Number(document.getElementById('lL').value);
							var tEav=Number(document.getElementById('teav').value);
							var tEar=Number(document.getElementById('tear').value);
							var tEM=Number(document.getElementById('tem').value);
						
							var corrAv =Number((apparentTrim*l1)/lL);
							var corrAr =Number((apparentTrim*l3)/lL);
							var corrM =Number((apparentTrim*l2)/lL);
						
							document.getElementById("corrAv").value = corrAv;
							document.getElementById("corrAr").value = corrAr;
							document.getElementById("corrM").value = corrM;
						};
						// Fonction pour calculer correction tirants réels et true trim
						function calculerCorrectionTirants(){
							var tEav=Number(document.getElementById('teav').value);
							var tEar=Number(document.getElementById('tear').value);
							var tEM=Number(document.getElementById('tem').value);
							var corrAv=Number(document.getElementById('corrAv').value);
							var corrAr=Number(document.getElementById('corrAr').value);
							var corrM=Number(document.getElementById('corrM').value);
						
							var tAv =Number(tEav+corrAv);
							var tAr =Number(tEar+corrAr);
							var tM =Number(tEM+corrM);
							var trueTrim =Number(tAr-tAv);
						
							document.getElementById("tAv").value = tAv;
							document.getElementById("tAr").value = tAr;
							document.getElementById("tM").value = tM;
							document.getElementById("trueTrim").value = trueTrim;
					};
				</script>
				<?php
				}else{
				?>
				<div class="card-body">
								<h6 class="mb-5 text-uppercase">Informations Etape 3</h6>
	<div class="table-responsive">
		<table id="example2" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>tEavbd</th>
					<th>tEavtb</th>
					<th>tEav</th>
					<th>tEarbd</th>
					<th>tEartb</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				$cmma = new Ctmainitial($idNavire);
				$result1 = $cmma->getCtmaInitialByID($idNavire);
				foreach ($result1 as $result) {
				?>
					<tr>
						<td><?= $result['tEavbd'] ?></td>
						<td><?= $result['tEavtb'] ?></td>
						<td><?= $result['tEav'] ?></td>
						<td><?= $result['tEarbd'] ?></td>
						<td><?= $result['tEartb'] ?></td>
						
						
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