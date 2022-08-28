<?php

include('pass.php');
$ip = "45.162.231.145";
$porta= "22";
$user ="root";
$senha = $pass;


$result = "";
	
$link = $_GET['user'];
	
			$connection = ssh2_connect($ip, $porta);
			ssh2_auth_password($connection, $user, $senha);
			$stream = ssh2_exec($connection, 'chage '.$link.' -l ');
			stream_set_blocking($stream, true);
			$stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
			$result .= stream_get_contents($stream_out);
			//echo $result."<br>";

$resultado = strstr($result, "Minimum ", true);

$result = strstr($resultado, "Account expires");

$string = str_replace("Account expires", "", $result); 
$stringR = str_replace(":", "", $string); 


			
			//echo $stringR;

			$arr = explode(' ', trim($stringR));
            $result = strstr($resultado, $arr[0]);
         

$mes = $arr[0];
$mes1 = $arr[0];

			// grep -c sshd
		
	
				if($mes == "Jar"){
					$mes = "Janeiro";
					$numero = 1;
				}
				elseif($mes == "Feb"){
					$mes = "Fevereiro";
					$numero = 2;
				}
				elseif($mes == "Mar"){
					$mes = "Março";
					$numero = 3;
				}
				elseif($mes == "Apr"){
					$mes = "Abril";
					$numero = 4;
				}
				elseif($mes == "May"){
					$mes = "Maio";
					$numero = 5;
				}
				elseif($mes == "June"){
					$mes = "Junho";
					$numero = 6;
				}
				elseif($mes == "July"){
					$mes = "Julho";
					$numero = 7;
				}
				elseif($mes == "Aug"){
					$mes = "Agosto";
					$numero = 8;
				}
				elseif($mes == "Sept"){
					$mes = "Sept";
					$numero = 9;
				}
				elseif($mes == "Oct"){
					$mes = "Outubro";
					$numero = 10;
				}
				elseif($mes == "Nov"){
					$mes = "Novembro";
					$numero = 11;
				}
				elseif($mes == "Dec"){
					$mes = "Dezembro";
					$numero = 12;
				}

				

				$numerico = str_replace($mes1, "", $result); 
				
				$ano = substr($numerico, 5, 4);
				$Dia = substr($numerico, 0, 3);
				echo $Dia."/";
                echo $numero."/";
				
				echo $ano;
			
				

			
			
