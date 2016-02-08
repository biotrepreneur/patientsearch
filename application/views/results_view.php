	<i class="material-icons" style="float: left; font-size: 35px; margin-right: 5px;">person</i>
	<h4>Patient Identification</h4>
      	<table class="u-full-width uber-table">
		  <thead>
		    <tr>
		      <th>ID</th>
		      <th>Name</th>
		      <th>Sex</th>
		      <th>DOB</th>
		      <th>Address</th>
		      <th>Zip</th>
		      <th>Phone</th>
		    </tr>
		  </thead>
		  <tbody>

			<?php foreach ($patientList as $patient): ?>

			 	<tr>
			 		<td><?php echo $patient['PID'] ?></td>
				    <td><?php echo ucfirst(strtolower($patient['First_Name'])). ' ' . ucfirst(strtolower($patient['Last_Name'])); ?></td>
				    <td><?php if ($patient['Sex']=='1') {echo 'Male';} else {echo 'Female';} ?></td>
				    <td><?php echo substr($patient['DOB'],4,4).'-'.substr($patient['DOB'],0,2).'-'.substr($patient['DOB'],2,2)?></td>
				    <td><?php echo $patient['Number_Street'] . '  ' . ucfirst(strtolower($patient['City'])) . ', ' . $patient['State']; ?></td>
					<td><?php echo $patient['Zip'] ?></td>
					<td><?php echo substr($patient['Phone'],0,3).'-'.substr($patient['Phone'],3,3).'-'.substr($patient['Phone'],6,4); ?></td>
				</tr>

			<?php endforeach; ?>

		  </tbody>
		</table>
		
	<i class="material-icons" style="float: left; font-size: 35px; margin-right: 5px;">directions_car</i>
	<h4>Patient Visits</h4>
		<table class="u-full-width uber-table counter">
		  <thead>
		    <tr>
		      <th>Visit</th>
		      <th>NPI</th>
		      <th>Doctor</th>
		      <th>Date</th>
		      <th>Address</th>
		    </tr>
		  </thead>
		  <tbody>
			    
			    <?php foreach ($visitList as $visit): ?>

			 	<tr>
			 		<td></td>
			 		<td><?php echo $visit['NPI'] ?></td>
				    <td><?php echo ucfirst(strtolower($visit['Dr_First_Name'])) . ' ' . ucfirst(strtolower($visit['Dr_Last_Name'])); ?></td>
				    <td><?php echo $visit['Event_Date'] ?></td>
				    <td><?php echo $visit['Number_Street'] . '  ' . ucfirst(strtolower($visit['City'])) . ', ' . $visit['State']; ?></td>
				</tr>

				<?php endforeach; ?>

		  </tbody>
		</table>

	<i class="material-icons" style="float: left; font-size: 35px; margin-right: 5px;">card_membership</i>
	<h4>Patient Insurances</h4>
		<table class="u-full-width uber-table counter">
		  <thead>
		    <tr>
		      <th>Visit</th>
		      <th class="center-col">Primary Insurance</th>
		      <th>Secondary Insurance</th>
		      <th class="center-col">Tertiary Insurance</th>
		    </tr>
		  </thead>
		  <tbody>
			    
			    <?php foreach ($insuranceList as $insurance): ?>

			    <?php if($insurance!=FALSE){ ?>

			 	<tr>
			 		<td></td>
			 		<td><?php echo $insurance[0]['Primary_Name'] . '</br>' . $insurance[0]['Primary_Insurance']?></td>
				    <td><?php echo $insurance[0]['Secondary_Name'] . '</br>' . $insurance[0]['Secondary_Insurance']?></td>
				    <td><?php echo $insurance[0]['Tertiary_Name'] . '</br>' . $insurance[0]['Tertiary_Insurance']?></td>
				</tr>

				<?php } else { ?>
					
				<tr>
			 		<td></td>
			 		<td></td>
			 		<td></td>
			 		<td></td>
			 	</tr>
				
				<?php }?>

				<?php endforeach; ?>

		  </tbody>
		</table>