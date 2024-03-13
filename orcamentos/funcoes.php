<?php
require "../config.php";
include DATABASE;
valid_login();
if($_SESSION['cargo'] != "orçamento" and $_SESSION['cargo'] != "admin" and $_SESSION['cargo'] != "Cliente")
    header("Location: ../index.php");   
//confere se o formulário foi completado corretamente
function form($vFk=null){
    if(!empty($_POST)){
        try{
            invalid_Clientes();
            $vOrcamentos = $_POST;
            if (is_null($vFk)) {
                var_dump($vOrcamentos);
                if($vIdFuncionario = readOutros("id_funcionario","Funcionarios","cargo_funcionario","orçamento"))
                foreach ($vIdFuncionario as $key) {

                    $vOrcamentos['fk_funcionario'] = $key['id_funcionario'];
               } 
                else
                    throw new Exception("Sem funcionários da funcionalidade 'Orçamento'");
            }
            $vOrcamentos['valorParcelas'] = $vOrcamentos['valorTotal'] / $vOrcamentos['parcelas'];
            $vOrcamentos['conclupag'] = "n";
            $vOrcamentos['fk_funcionario'] = $vFk;
            add($vOrcamentos,"_orcamentos");
        } catch(Exception $objErr){
            echo "<h2> Algo deu errado ". $objErr-> getMessage(). "</h2>";
        }
      
    }

}
function leitura($vFk = null){
    try {
        if (!is_null($vFk)) { //Cliente
            $vSelect = "o.id_orcamento, o.entrega_orcamento, o.parcelas_orcamento, o.valorTotal_orcamento,o.valorParcelas_orcamento, o.formapag_orcamento, o.conclupag_orcamento, f.nome_funcionario";
            $vWhere = "o.fk_cliente = ?";
            $vResult = readInner($vSelect, "Orcamentos o ", "Funcionarios f", "o.fk_funcionario", "f.id_funcionario",null,null,$vWhere,$vFk);
            
        }
        else { //Funcionario
            $vSelect = "o.id_orcamento, o.entrega_orcamento, o.parcelas_orcamento, o.valorTotal_orcamento,o.valorParcelas_orcamento, o.formapag_orcamento, o.conclupag_orcamento, c.nome_cliente";
            $vResult = readInner($vSelect, "Orcamentos o ", "Funcionarios f", "o.fk_funcionario", "f.id_funcionario", "Clientes c","c.id_cliente",null,null,"o.fk_cliente");
        }

        return $vResult;
    } catch(Exception $objErr){
        echo "<h2> Algo deu errado ". $objErr-> getMessage(). "</h2>";
    }
}
function editar($vId)
{
    valid_login();
    Invalid_Clientes();
    try {
        if($_SERVER['REQUEST_METHOD'] =="POST"){
            if (!empty($_POST)) {
                $vOrcamentos = $_POST;
                if($vOrcamentos['conclupag'] == "n"){
                    $vOrcamentos['entrega'] = null;
                }
                $vOrcamentos['valorParcelas'] = $vOrcamentos['valorTotal'] / $vOrcamentos['parcelas'];
                update($vId,$vOrcamentos,"_orcamentos");
                $vValue = readId($vId, "Orcamentos");
                return $vValue;
            }
            else {
                throw new Exception("Erro no formulário");
            }
            
        } else {
            if (isset($vId)) {
                $vValue = readId($vId, "Orcamentos");
                return $vValue;
            } else {
                throw new Exception("Id não foi passado corretamente");
            }
        }

    } catch (Exception $objErr) {
        echo "<h2> Algo deu errado ". $objErr-> getMessage(). "</h2>";
    }
}
function deletar($vId){
    valid_login();
    invalid_Clientes();
    try {
        deleteReferencia("oc","Orcamento_Produtos oc","Orcamentos o","oc.fk_orcamento", "o.id_orcamento",$vId);	
        delete($vId,"_orcamentos");

       header("Location:index.php");
    } catch (Exception $objErr) {
        echo "<h2> Algo deu errado ". $objErr-> getMessage(). "</h2>";
    }
}
function DataLivre($vData){
    if (!readOutros("visita_agenda","Agendas","visita_agenda",$vData))
        return true;  
    else 
        return false;
}
function TodosClientes(){
    $vClientes = readOutros("id_cliente, nome_cliente","Clientes");
    return $vClientes;
}
function NomeCliente($vId){
    $vCliente = readOutros("c.nome_cliente","Orcamentos o inner join Clientes c on o.fk_cliente = c.id_cliente","id_orcamento",$vId);
    foreach ($vCliente as $vKey) {
        $vNome = $vKey['nome_cliente'];
    }
    return $vNome;
}
?>