<!DOCTYPE html>
<?php
$contnull=0;
$contbranco=0;
$digito = filter_input(INPUT_GET,'digito');
echo "Número digitado ".$digito;
              
    if (($digito==='13') || ($digito==='24') || ($digito==='45')){                                 
        $arquivo= "valorurna.txt";
        $conteudo=",".$digito;
        $abertura=fopen("$arquivo","a+");
        $gravacao=fwrite($abertura,$conteudo);                                   
        #Reposiciona o ponteiro no início do arquivo
        fseek($abertura,0);
        $leitura=fread($abertura,filesize($arquivo));
        fclose($abertura);
        echo" <br>Conteúdo do arquivo:$leitura";
        /*header('location:form-urna2.php');*/
    }else if($digito===""){    
        $contbranco=$contbranco++;
        $arquivo="valorbranco.txt";
        $conteudo=",".$contbranco;
        $abertura=fopen("$arquivo","w+");
        fseek($abertura,0);
        $leitura=fread($abertura,filesize($arquivo));
        fclose($abertura);
    }else if (($digito!='13') OR ($digito!='24') OR ($digito!='45')){
         $contnull=$contnull++;
        $arquivo="valornull.txt";
        $conteudo=",".$contnull;
        $abertura=fopen("$arquivo","w+");
        fseek($abertura,0);
        $leitura=fread($abertura,filesize($arquivo));
        fclose($abertura);
    };
?>

<html>
<head>
<title>Eleição</title>
</head>
 <body>
  
     <fieldset> 
         <legend>Vote</legend>
         <form name="urna" method="get" action="form-urna2.php">
      
   
        <table>
        <legend> Urna </legend>
     <tr>
      <td>
       <input type="text"  name="digito" >
      </td>
     </tr>
     <tr>
      <td><input type="button" value="1" onClick="urna.digito.value += '1'"></input>
      <input type="button" value="2" onClick="urna.digito.value += '2'"></input>  
      <input type="button" value="3" onClick="urna.digito.value += '3'"></input><br />
      </td>
     </tr>
     <tr>
      <td><input type="button" value="4" onClick="urna.digito.value += '4'"/>
          <input type="button" value="5" onClick="urna.digito.value += '5'"/>
      <input type="button" value="6" onClick="urna.digito.value += '6'"/><br />
      </td>
     </tr>
     <tr>
      <td><input type="button" value="7" onClick="urna.digito.value += '7'"/>
      <input type="button" value="8" onClick="urna.digito.value += '8'"/>  
      <input type="button" value="9" onClick="urna.digito.value += '9'"/><br /></td>
     </tr>
     <tr>
       
      <td><input type="button" value="0" onClick="urna.digito.value += '0'"/><br></td>
      
     </tr>
     
       
    </table></br>
    <input type="submit" value="branco" onClick="urna.digito.value += ''"/>
    <input type="submit" value="confirmar"/>
        <input type="reset" value="resetar"/>

 
</table>
</form>
     </fieldset>
 </body>
</html>
