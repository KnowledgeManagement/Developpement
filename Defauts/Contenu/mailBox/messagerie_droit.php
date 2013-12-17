<?php

							include_once "../../../SQL/Fonctions_SQL/categorie.php";
							include_once "../../../SQL/Fonctions_SQL/souscategorie.php";
							include_once "../../../SQL/Fonctions_SQL/messagerie.php";
									
									$mess = GetMess();
									echo "<table id='mess_array'>";
									for($i=0;$i<countMessAllRead();$i++){
										if($mess[$i]['etat'] == "Non lu"){ 
											echo "<tr style='background-color:#11283e;'>";
										}	
											
											echo "<td id='mess_checkbox'>";
											echo "<input type='checkbox' name='' value=''>";
											echo "</td>";
											echo "<td id='mess_name'>";
											echo $mess[$i]['nom'].' '.$mess[$i]['prenom'];
											echo "</td>";
											echo "<td id='mess_title'><a href='#'>";
											echo $mess[$i]['intitule'];
											echo "</a></td>";
											echo "<td id='mess_time'>";
											echo $mess[$i]['date']->format('d-m-Y');
											echo "</td>";
											
											echo "</tr>";
									}
									echo "</table>";
									echo "<input type='submit' class='bouton' id='mess_button' name='mess_delete' value='Supprimer' />";
?>