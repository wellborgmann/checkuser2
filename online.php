<?php
include("conexao.php");


global $banco;

	$result = "";
	//Seleciona os servidores
	$SQLServer = "SELECT * FROM servidor";
	$SQLServer = $banco->prepare($SQLServer);
	$SQLServer->execute();
	
	$ArrayServer = array();
	while($LnServer = $SQLServer->fetch()){
		if(!in_array($LnServer['server'], $ArrayServer)) {
		$ArrayServer[] = $LnServer['server'];
			$connection = ssh2_connect($LnServer['server'], $LnServer['porta']);
			ssh2_auth_password($connection, $LnServer['user'], $LnServer['senha']);
			$stream = ssh2_exec($connection, 'ps aux | grep priv | grep Ss');
			stream_set_blocking($stream, true);
			$stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
			$result .= stream_get_contents($stream_out);
			echo $result;
		}
	}
	 
//Usuário
$CadUser = $_SESSION['id'];
$acesso = 3;
$acessoT = 4;

$SQLUser = "SELECT * FROM login ";
$SQLUser = $banco->prepare($SQLUser);
$SQLUser->bindParam(':id_cad', $CadUser, PDO::PARAM_INT);
$SQLUser->bindParam(':acesso', $acesso, PDO::PARAM_INT);
$SQLUser->bindParam(':acessoT', $acessoT, PDO::PARAM_INT);
$SQLUser->execute();
?>

		
									
												<?php
						
												while($LnUser = $SQLUser->fetch()){
													
												$SqlS = "SELECT icone FROM servidor";
												$SqlS = $banco->prepare($SqlS);
												$SqlS->bindParam(':nome', $LnUser['operadora'], PDO::PARAM_STR);
												$SqlS->execute();
												$LnU = $SqlS->fetch();
												
												$SqlI = "SELECT imagem FROM icone_perfil ";
												$SqlI = $banco->prepare($SqlI);
												$SqlI->bindParam(':id', $LnU['icone'], PDO::PARAM_STR);
												$SqlI->execute();
												$LnI = $SqlI->fetch();
											
																								
												$conexao = substr_count($result, "sshd: ".trim($LnUser['login'])." [priv]");
												$conexao = empty($conexao) ? 0 : $conexao;
													
												$SqlU = "SELECT login FROM login";
												$SqlU = $banco->prepare($SqlU);
												$SqlU->bindParam(':id', $LnUser['id_cad'], PDO::PARAM_INT);
												$SqlU->execute();
												$LnU = $SqlU->fetch();
												
												if($conexao > 0) {
													$status = "&nbsp;&nbsp;<span class=\"pointer label label-success\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"Online\">Online</span>";
												}else{
													$status = "&nbsp;&nbsp;<span class=\"pointer label label-danger\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"Offline\">Offline</span>";
												}
																																																				
												echo "
												<tr>
													<td>".$LnUser['nome']."</td>
													<td>".$LnUser['login']."</td>";
											
											
												
												echo "<td>".$status."</td>&nbsp;";
												
												
												
												echo "<td>".$conexao."</td><br>";
												
									
												
												
													
											echo "</tr>";
												}
												?>
													</tbody>
												</table>
											</div>
										</div>                             
									</div>



								</div>
							</div>                                
							
						</div>
						<!-- PAGE CONTENT WRAPPER -->      
				
			


