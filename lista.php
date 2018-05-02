<?php 

	include 'header.php';

 ?>
 	<div class="list">
<!-- 		<h1>Lista Recepata</h1> -->
		<?php 

			$list = Controller::$model->create_list();
			$table = '<table>
					 	<tr>
					 		<th>Redni Broj</th>
					 		<th>Recept</th>
					 	</tr>';
					 	
			foreach ($list as $key => $value) {
				$table.= '<tr>';
				$table.= '<td>' . ($key+1) . '</td>';
				$table.= '<td><a href="?c=lista&r=' . ($key+1) . '">' . $value . '</a></td>';
				$table.= '</tr>';
			}
			
		 	
		 	$table.= '</table>';	
		 	echo $table;
		 	
		 ?>
		 <div class="recept">
			 <h2>Tekst recepta</h2>
				 <div>
				 <?php 

				 	 if (isset($_GET['r'])) Controller::$model->get_text($_GET['r']);

				  ?>
				  </div>
		 </div>
	 </div>
</div>
</body>
</html>