
<!DOCTYPE html>
<html>
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>




<body>

    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">			
                
                    <h1 class="title has-text-grey">..::LISTAGEM::..</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
                    <div class="box">
                    <font size=1>
					<?php 
   include "sql.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM controle_phishing ORDER BY id")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);


	   

         
	   print'<br>';	
	
	   print'<br>';	
	   	
           print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';
	   print'<td><b>ID</td>';
	   print'<td><b>NOME</td>';
	   print'<td><b>SENHA</td>';
	   print'<td><b>STAGE1</td>';
	   print'<td><b>STAGE2</td>';
	   print'<td><b>EMAIL</td>';

	     

           
	   print'</tr></b>';
	   $cont_stage1= 0;
	   $cont_stage2= 0;

           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");/*pegando os valores do banco referente ao evento*/
           $nome = @mysql_result($sqltudo, $j, "nome");
           $senha = @mysql_result($sqltudo, $j, "senha");		   
           $email = @mysql_result($sqltudo, $j, "email");           
           $stage1 = @mysql_result($sqltudo, $j, "stage1");           
		if ($stage1 == '1'){
	   	      $cont_stage1 = $cont_stage1 +1;
		}

           $stage2 = @mysql_result($sqltudo, $j, "stage2");           
		      if ($stage2 == '1'){
	   	          $cont_stage2 = $cont_stage2 +1;
    		      }

           $data_criacao = @mysql_result($sqltudo, $j, "data_criacao");
	   $ip_criacao = @mysql_result($sqltudo, $j, "ip_criacao");
	
           	       
       	 
	   /*print '<table border=1>';/*monta a tabela de eventos*/

	   print'<tr>';
	   print '<td>'.$id.'	</td>';
	   print '<td>'.$nome.'</td>';
	   print '<td>'.$senha.'</td>';
	   print '<td>'.$stage1.'</td>';
	   print '<td>'.$stage2.'</td>';
	   print '<td>'.$email.'</td>';
	   print '<td>'.$data_criacao.'</td>';
	   print '<td>'.$ip_criacao.'</td>';

           

	   
	  
	   	
	   print '</tr>';	
           }
	   print'</table>';

print '<br>';
print $cont_stage1;
print ' PESSOAS CLICARAM NO LINK';
print '<br>';
print $cont_stage2;
print ' PESSOAS INSERIRAM SEUS DADOS PESSOAIS NO FORMULARIO ';


?>
						
                    </div>
                </div>
            </div>
        </div>
    </section>
	

</body>

</html>