<?php
@require_once "authentification.php";
$prenomAgent = $_SESSION["CURRENT_user"]['first_name'];
$nomAgent = $_SESSION["CURRENT_user"]['last_name'];
$idNavire = $_GET['id'];
require_once './Composant/navigation.php';
require_once './model/infodraftinitial.php';
require_once './model/ctmainitial.php';
require_once './model/cmminitial.php';
require_once './model/tpcinitial.php';


$ctma = new Ctmainitial($idNavire);
$result = $ctma->getCtmaInitialByID($idNavire);
foreach ($result as $key => $valeur) {
	$tM = $valeur['tM'];
	$tav = $valeur['tav'];
	$tar = $valeur['tar'];
	$truetrim = $valeur['trueTrim'];
	$tEmbd = $valeur['tEmbd'];
	$tEmtd = $valeur['tEmtb'];
	$L = $valeur['l'];
}
$tpc = new Tcpinitial($idNavire);
$result = $tpc->getTpcnitialByID($idNavire);
foreach ($result as $key => $valeur) {
	$TPCMbd = $valeur['TPCMbd'];
	$TPCMtd = $valeur['TPCMtd'];
	$dplCorrige = $valeur['deplCorrige'];
}
$MAD = (6 * @$tM + @$tav + @$tar) / 8;
$t1 = $MAD - 0.5;
$t2 = $MAD + 0.5;
?>

<?php
$cmma = new Cmminitial($idNavire);
$result1 = $cmma->getCmmInitialByID($idNavire);
if (count($result1) == 0) {
?>
	<h6 class="mb-0 text-uppercase">Etape 4</h6>
	<hr />

	<h6 class="mb-0 text-uppercase">Information Draft Initial</h6>
	<div class="card border-top border-0 border-4 border-primary">
		<div class="card-body p-5">
			<div class="card-title d-flex align-items-center">
				<div><i class="lni lni-plus me-1 font-22 text-primary"></i>
				</div>
				<h5 class="mb-0 text-primary">Calcul de la moyenne des moyennes ou MAD</h5>
			</div>
			<hr>
			<form class="row g-3" method="POST" action="./controller/cmminitial.php">
				<input type="number" hidden name="idNavire" value="<?= $idNavire ?>" class="form-control border-start-0" id="idNavire" placeholder="" />
				<input type="number" hidden name="truetrim" value="<?= $truetrim ?>" class="form-control border-start-0" id="truetrim" placeholder="" />
				<input type="number" hidden name="l" value="<?= $L ?>" class="form-control border-start-0" id="l" placeholder="" />
				<div class="row">
					<div class="col-4">
						<label for="inputLastName1" class="form-label">x1</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>

							<input type="number" step="any" name="x1" class="form-control border-start-0" id="x1" placeholder="TEavbd" />
						</div>
					</div>
					<div class="col-4">
						<label for="inputLastName1" class="form-label">x2</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" step="any" name="x2" class="form-control border-start-0" id="x2" placeholder="TEavtb" />
						</div>
					</div>
					<div class="col-4">
						<label for="inputLastName1" class="form-label">MAD</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" readonly step="any" name="mad" value="<?= $MAD ?>" class="form-control border-start-0" id="mad" placeholder="" />
						</div>
					</div>
				</div>
				<div class="row">
					<h5 class="mb-0 text-primary">Calcul déplacement correspndant à D=0</h5>
					<div class="col-4">
						<label for="inputLastName1" class="form-label">y1</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>

							<input type="number" step="any" name="y1" class="form-control border-start-0" id="y1" placeholder="TEarbd" />
						</div>
					</div>
					<div class="col-4">
						<label for="inputLastName1" class="form-label">y2</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" onkeyup="calculerdeplacementMAD();" step="any" name="y2" class="form-control border-start-0" id="y2" placeholder="TEartb" />
						</div>
					</div>
					<div class="col-4">
						<label for="inputLastName1" class="form-label">Déplacement MAD</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" readonly step="any" name="deplacementMad" class="form-control border-start-0" id="deplacementMad" placeholder="" />
						</div>
					</div>
				</div>
				<div class="row">
					<h5 class="mb-0 text-primary">Calcul des MAD + 0,5 et MAD - 0,5</h5>
					<div class="col-4">

					</div>
					<div class="col-4">

					</div>
					<div class="col-4">
						<label for="inputLastName1" class="form-label">t1</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" readonly step="any" value="<?= $t1 ?>" name="t1" class="form-control border-start-0" id="t1" placeholder="TEMbd" />
						</div>
						<label for="inputLastName1" class="form-label">t2</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" readonly step="any" value="<?= $t2 ?>" name="t2" class="form-control border-start-0" id="t2" placeholder="TEMtb" />
						</div>
					</div>
					<div class="col-4">

					</div>
				</div>
				<div class="row">
					<h5 class="mb-0 text-primary">Calcul du LCF</h5>
					<div class="col-4">
						<label for="inputLastName1" class="form-label">y1</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>

							<input type="number" step="any" name="y1LCF" class="form-control border-start-0" id="y1LCF" placeholder="" />
						</div>
						<label for="inputLastName1" class="form-label">y2</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>

							<input type="number" step="any" name="y2LCF" class="form-control border-start-0" id="y2LCF" placeholder="" />
						</div>
					</div>
					<div class="col-4">
						<div>
							<div class="row">
								<input class="form-check-input" onclick="calculeLCF();" type="radio" name="lcf" id="lcftoap" value="LCF to AP">
								<label class="form-check-label" for="lcf1">LCF to AP</label>
							</div>
							<div class="row">
								<input class="form-check-input" onclick="calculeLCF();" type="radio" name="lcf" id="lcftofp" value="LCF to FP">
								<label class="form-check-label" for="lcf2">LCF to FP</label>
							</div>
							<div class="row">
								<input class="form-check-input" onclick="calculeLCF();" type="radio" name="lcf" id="lcftomidship" value="LCF to midship">
								<label class="form-check-label" for="lcf3">LCF to midship</label>
							</div>
						</div>
						<!-- <label for="inputLastName1" class="form-label">y1</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                    
										<input type="number" step="any" name="y1LCF" class="form-control border-start-0" id="y1LCF" placeholder="" />
									</div>
									<label for="inputLastName1" class="form-label">y2</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                    
										<input type="number" step="any" name="y2LCF" class="form-control border-start-0" id="y2LCF" placeholder="" />
									</div> -->
					</div>

					<div class="col-4">
						<label for="inputLastName1" class="form-label">LCF to </label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>

							<input type="number" readonly step="any" name="lcfto" class="form-control border-start-0" id="lcfto" placeholder="" />
						</div>
					</div>
				</div>
				<h5 class="mb-0 text-primary">Calcul du TPC pour MAD</h5>
				<div class="row">
					<div class="col-4">
						<label for="inputLastName1" class="form-label">y1</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>

							<input type="number" required step="any" name="y1tpcmad" class="form-control border-start-0" id="y1tpcmad" placeholder="" />
						</div>
					</div>
					<div class="col-4">
						<label for="inputLastName1" class="form-label">y2</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" required onkeyup="calculeTPCMAD();calculefirsttrimcorr();" step="any" name="y2tpcmad" class="form-control border-start-0" id="y2tpcmad" placeholder="" />
						</div>
					</div>
					<div class="col-4">
						<label for="inputLastName1" class="form-label">TPC</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" readonly step="any" name="tpcmad" class="form-control border-start-0" id="tpcmad" placeholder="" />
						</div>
					</div>
				</div>
				<h5 class="mb-0 text-primary">Calcul First Trim Correction</h5>
				<div class="row">
					<div class="col-8">

					</div>
					<div class="col-4">
						<label for="inputLastName1" class="form-label">First Trim Correction</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" readonly step="any" name="firstTrimCorrection" class="form-control border-start-0" id="firstTrimCorrection" placeholder="" />
						</div>
					</div>
				</div>
				<h5 class="mb-0 text-primary">Calcul Second Trim Correction</h5>

				<div class="row">
					<div class="col-4">
						<label for="inputLastName1" class="form-label">x1</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" required step="any" name="x1secondtrim" class="form-control border-start-0" id="x1secondtrim" placeholder="" />
						</div>
						<label for="inputLastName1" class="form-label">x2</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" required step="any" name="x2secondtrim" class="form-control border-start-0" id="x2secondtrim" placeholder="" />
						</div>
						<label for="inputLastName1" class="form-label">y1</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" required step="any" name="y1secondtrim" class="form-control border-start-0" id="y1secondtrim" placeholder="" />
						</div>
						<label for="inputLastName1" class="form-label">y2</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" step="any" onkeyup="calculeMTC1();" name="y2secondtrim" class="form-control border-start-0" id="y2secondtrim" placeholder="" />
						</div>
					</div>
					<div class="col-4">
						<label for="inputLastName1" class="form-label">MTC1</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" required readonly step="any" name="mtc1" class="form-control border-start-0" id="mtc1" placeholder="" />
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-4">
						<label for="inputLastName1" class="form-label">x1</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" required step="any" name="x1secondtrim2" class="form-control border-start-0" id="x1secondtrim2" placeholder="" />
						</div>
						<label for="inputLastName1" class="form-label">x2</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" required step="any" name="x2secondtrim2" class="form-control border-start-0" id="x2secondtrim2" placeholder="" />
						</div>
						<label for="inputLastName1" class="form-label">y1</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" required step="any" name="y1secondtrim2" class="form-control border-start-0" id="y1secondtrim2" placeholder="" />
						</div>
						<label for="inputLastName1" class="form-label">y2</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" required step="any" onkeyup="calculeMTC2();" name="y2secondtrim2" class="form-control border-start-0" id="y2secondtrim2" placeholder="" />
						</div>
					</div>
					<div class="col-4">
						<label for="inputLastName1" class="form-label">MTC2</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" required readonly step="any" name="mtc2" class="form-control border-start-0" id="mtc2" placeholder="" />
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-8">

					</div>
					<div class="col-4">
						<label for="inputLastName1" class="form-label">Second Trim Correction</label>
						<div class="input-group"> <span class="input-group-text bg-transparent"></span>
							<input type="number" readonly step="any" name="secondTrimCorrection" class="form-control border-start-0" id="secondTrimCorrection" placeholder="" />
						</div>
					</div>
				</div>

				<div>
					<button name="btn_ajout_etape4" type="submit" class="btn btn-primary px-5">Valider</button>
					<button type="reset" class="btn btn-secondary px-5" data-bs-dismiss="modal">Annuler</button>

				</div>
			</form>



		</div>
	</div>

	<script type="text/javascript">
		var L = document.getElementById('l').value;
		var deplacementMAD = document.getElementById('deplacementMad');
		var LCF = document.getElementById('lcfto');
		var TPCMAD = document.getElementById('tpcmad');
		var FirstTrimCorr = document.getElementById('firstTrimCorrection');
		var MTC1 = document.getElementById('mtc1');
		var MTC2 = document.getElementById('mtc2');
		var secondTrimCorr = document.getElementById('secondTrimCorrection');

		// Fonction pour calculer déplacement MAD
		function calculerdeplacementMAD() {
			var MAD = Number(document.getElementById('mad').value);
			var x1 = Number(document.getElementById('x1').value);
			var x2 = Number(document.getElementById('x2').value);
			var y1 = Number(document.getElementById('y1').value);
			var y2 = Number(document.getElementById('y2').value);
			var deplacementMAD = Number((MAD - x1) / (x2 - x1) * (y2 - y1) + y1);
			document.getElementById('deplacementMad').value = deplacementMAD;
		};
		// Fonction pour calcule LCF
		function calculeLCF() {
			var MAD = Number(document.getElementById('mad').value);
			var x1 = Number(document.getElementById('x1').value);
			var x2 = Number(document.getElementById('x2').value);
			var y1 = Number(document.getElementById('y1').value);
			var y1LCF = Number(document.getElementById('y1LCF').value);
			var y2LCF = Number(document.getElementById('y2LCF').value);
			var L = Number(document.getElementById('l').value);
			if (document.getElementById('lcftoap').checked) {
				var LCF = Number((L / 2) - (MAD - x1) / (x2 - x1) * (y2LCF - y1LCF) + y1);
				document.getElementById('lcfto').value = LCF;
			} else if (document.getElementById('lcftofp').checked) {
				var LCF = Number(((MAD - x1) / (x2 - x1) * (y2LCF - y1LCF) + y1) - L / 2);
				document.getElementById('lcfto').value = LCF;
			} else if (document.getElementById('lcftomidship').checked) {
				var LCF = Number(((MAD - x1) / (x2 - x1) * (y2LCF - y1LCF) + y1) - L / 2);
				document.getElementById('lcfto').value = LCF;
			}
		}
		// Fonction pour calcule du TPC pour MAD
		function calculeTPCMAD() {
			var MAD = Number(document.getElementById('mad').value);
			var x1 = Number(document.getElementById('x1').value);
			var x2 = Number(document.getElementById('x2').value);
			var y1tpcmad = Number(document.getElementById('y1tpcmad').value);
			var y2tpcmad = Number(document.getElementById('y2tpcmad').value);
			var y1 = Number(document.getElementById('y1').value);
			var TPCMAD = Number(((MAD - x1) / (x2 - x1)) * (y2tpcmad - y1tpcmad) + y1);
			document.getElementById('tpcmad').value = TPCMAD;
		}
		// Fonction pour calcule First Trim Correction
		function calculefirsttrimcorr() {
			var LCF = Number(document.getElementById('lcfto').value);
			var TPCMAD = Number(document.getElementById('tpcmad').value);
			var truetrim = Number(document.getElementById('truetrim').value);
			var L = Number(document.getElementById('l').value);
			var TPCMAD = Number(document.getElementById('tpcmad').value);
			var FirstTrimCorr = Number((LCF * TPCMAD * truetrim * 100) / L);
			document.getElementById('firstTrimCorrection').value = FirstTrimCorr;
		}
		// Fonction calcule MTC1
		function calculeMTC1() {
			var x1Mtc1 = Number(document.getElementById('x1secondtrim').value);
			var x2Mtc1 = Number(document.getElementById('x2secondtrim').value);
			var y1Mtc1 = Number(document.getElementById('y1secondtrim').value);
			var y2Mtc1 = Number(document.getElementById('y2secondtrim').value);
			var y1 = Number(document.getElementById('y1').value);
			var t1 = Number(document.getElementById('t1').value);
			var t2 = Number(document.getElementById('t2').value);
			var MTC1 = Number(((t1 - x1Mtc1) / (x2Mtc1 - x1Mtc1)) * (y2Mtc1 - y1Mtc1) + y1);
			document.getElementById('mtc1').value = MTC1;
		}
		// Fonction calcule MTC2
		function calculeMTC2() {
			var x1Mtc2 = Number(document.getElementById('x1secondtrim2').value);
			var x2Mtc2 = Number(document.getElementById('x2secondtrim2').value);
			var y1Mtc2 = Number(document.getElementById('y1secondtrim2').value);
			var y2Mtc2 = Number(document.getElementById('y2secondtrim2').value);
			var y1 = Number(document.getElementById('y1').value);
			var t1 = Number(document.getElementById('t1').value);
			var t2 = Number(document.getElementById('t2').value);
			var MTC2 = Number(((t2 - x1Mtc2) / (x2Mtc2 - x1Mtc2)) * (y2Mtc2 - y1Mtc2) + y1);
			document.getElementById('mtc2').value = MTC2;

			var truetrim = Number(document.getElementById('truetrim').value);
			var L = Number(document.getElementById('l').value);
			var MTC1 = Number(document.getElementById('mtc1').value);
			var secondTrimCorr = Number(((truetrim * truetrim) * (MTC2 - MTC1) * 50) / L);
			document.getElementById('secondTrimCorrection').value = secondTrimCorr;
		}
		// Fonction Calcul Second Trim Correction
		// function secondTrimCorrection(){
		// 	var truetrim=Number(document.getElementById('truetrim').value);
		// 	var MTC2=Number(document.getElementById('mtc2').value);
		// 	var MTC1=Number(document.getElementById('mtc1').value);
		// 	var L =Number(document.getElementById('l').value);
		// 	var secondTrimCorr=Number(((truetrim*truetrim)*(MTC2-MTC1)*50)/L);
		// 	document.getElementById('secondTrimCorrection').value=secondTrimCorr;
		// };
	</script>
<?php
} else {
?>
	<div class="card-body">
		<h6 class="mb-5 text-uppercase">Informations Etape 4</h6>
		<div class="table-responsive">
			<table id="example2" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>x1Mmoyenne</th>
						<th>x2Mmoyenne</th>
						<th>MAD</th>
						<th>y1Deplacement</th>
						<th>y2Deplacement</th>
						<th>Déplacement MAD</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$cmma = new Cmminitial($idNavire);
					$result1 = $cmma->getCmmInitialByID($idNavire);
					foreach ($result1 as $result) {
					?>
						<tr>
							<td><?= $result['x1Mmoyenne'] ?></td>
							<td><?= $result['x2Mmoyenne'] ?></td>
							<td><?= $result['mad'] ?></td>
							<td><?= $result['y1Deplacement'] ?></td>
							<td><?= $result['y2Deplacement'] ?></td>
							<td><?= $result['deplacementMad'] ?></td>

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