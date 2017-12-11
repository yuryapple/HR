	<form method="post" enctype="multipart/form-data" name="formEmployee">

		<div>
			<span onclick="document.getElementById('formEmpl').style.display='none';" class="close">&times;</span>
		</div>
		<input type="hidden" name="idEmployee" value="<?php echo $employeeInfo["idEmployee"];?>">

		<div class="row-form">
			<div class="col-33">
				<label>First name</label>
				<input type="text" style="font-weight: bold;" placeholder="Enter first name" name="firstName" value="<?php echo $employeeInfo["firstName"];?>" required>
			</div>

			<div class="col-33">
				<label>Last name</label>
				<input type="text" style="font-weight: bold;" placeholder="Enter last name" name="lastName" value="<?php echo $employeeInfo["lastName"];?>" required>
			</div>

			<div class="col-33">
				<label>Birthday</label>
				<input type="date"  name="dateOfBirthday" min="1940-01-01" max="2010-01-01" value="<?php echo $employeeInfo["dateOfBirthday"];?>" required>
			</div>
		</div>

		<hr width="98%" align="center">

		<div class="row-form">
			<div class="col-45">
				<div class="col-33">
					<label>Telephone</label>
				</div>
<!--				<input type="number" name="numberOfTel" maxlength="10"	value="<?php echo $employeeInfo["numberOfTel"];?>" required>
-->
				<input type="tel" name="tel" id="tel" placeholder="Enter only digitals" pattern="\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}"
					   value="<?php echo $employeeInfo["telephone"];?>" required >
			</div>

			<div class="col-45">
				<div class="col-33">
					<label>E-mail</label>
				</div>
				<input type="email"  name="eMail" value="<?php echo $employeeInfo["eMail"];?>" required>
			</div>
		</div>


		<div class="row-form">
			<div class="col-45">
				<div class="col-33">
					<label>Status</label>
				</div>
				<select name="status">
					<?php
						foreach ($employeeEnumStatus as $key => $value) {
							if ($value != $employeeInfo["status"]) {
								$strPrint = "<option value={$key}>{$value}</option>";
							} else {
								$strPrint = "<option selected value={$key}>{$value}</option>";
							}
							echo $strPrint;
						}
					?>
				</select>
			</div>

			<div class="col-45">
				<div class="col-33">
					<label>Department</label>
				</div>
				<select name="idDepartment">
					<?php
						foreach ($departamentsList as $key => $value) {
							if ($key != $employeeInfo["idDepartment"]) {
								$strPrint = "<option value={$key}>{$value}</option>";
							} else {
								$strPrint = "<option selected value={$key}>{$value}</option>";
							}
							echo $strPrint;
						}
					?>
				</select>
			</div>
		</div>


		<div class="row-form">
			<div class="col-45">
				<div class="col-33">
					<label>Date of hire</label>
				</div>
				<input type="date"  name="dateOfHire" min="2010-01-01" max="2030-01-01" value="<?php echo $employeeInfo["dateOfHire"];?>" required>
			</div>


			<div class="col-45">
				<div class="col-33">
					<label>Date of fire</label>
				</div>
				<input type="date"  name="dateOfFire" min="2010-01-01" max="2030-01-01" value="<?php echo $employeeInfo["dateOfFire"];?>">
			</div>
		</div>

		<div class="row-form">
			<button type="submit" id="saveButton">Save</button>
			<button type="reset" >Reset</button>
		</div>

	</form>