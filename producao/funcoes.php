<?php
require "../config.php";
include DATABASE;
valid_login();
invalid_Clientes(); 
//confere se o formulário foi completado corretamente
function form($vFk=null){
    if(!empty($_POST)){

        try{
            $vProducao = $_POST;
            $vProducao['fk_orcamento'] = $vFk;
            add($vProducao,"_orcamento_produtos");
            
        } catch(Exception $objErr){
            echo "<h2> Algo deu errado ". $objErr-> getMessage(). "</h2>";
        }
       
    }
}
function selecao(){
    $vSelect = "c.nome_cliente, o.conclupag_orcamento, o.id_orcamento";
    $vResult = readInner($vSelect,"Orcamentos o ","Clientes c","o.id_orcamento","c.id_cliente",null,null,"o.conclupag_orcamento = ?","s");
    return $vResult;
}
function leitura(){
    try {
        $vSelect = "op.id_orcamento_produto, op.medida_orcamento_produto, op.material_orcamento_produto,op.servico_orcamento_produto, p.nome_produto, o.entrega_orcamento, (SELECt c.nome_cliente FROM clientes c INNER JOIN orcamentos o on c.id_cliente = o.fk_cliente WHERE o.id_orcamento = op.fk_orcamento ) AS nome_cliente, (SELECt f.nome_funcionario FROM funcionarios f INNER JOIN orcamentos o on f.id_funcionario = o.fk_funcionario WHERE o.id_orcamento = op.fk_orcamento ) AS nome_funcionario";
        $vResult = readInner($vSelect, "Orcamento_Produtos op ", "Orcamentos o", "op.fk_orcamento", "o.id_orcamento","Produtos p","p.id_produto",null,null,"op.fk_produto");
        
        return $vResult;
    } catch(Exception $objErr){
        echo "<h2> Algo deu errado ". $objErr-> getMessage(). "</h2>";
    }
}
function editar($vId)
{
    valid_login();
    try {
        if($_SERVER['REQUEST_METHOD'] =="POST"){
            if (!empty($_POST)) {
                $vProducao = $_POST;
                update($vId,$vProducao,"_orcamento_Produtos");
                $vValue = readId($vId, "Orcamento_Produtos");
                return $vValue;
            }
            else {
                throw new Exception("Erro no formulário");
            }
        } else {
            if (isset($vId)) {
                $vValue = readId($vId, "Orcamento_Produtos");
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
    try {
        delete($vId,"_orcamento_Produtos");

       header("Location:index.php");
    } catch (Exception $objErr) {
        echo "<h2> Algo deu errado ". $objErr-> getMessage(). "</h2>";
    }
}
function TodosProdutos(){
    $vProdutos = readOutros("id_produto, nome_produto","Produtos");
    return $vProdutos;
}
function Concluir($vId){
    try {
        deleteReferencia("o","Orcamentos o","Orcamento_Produtos oc","o.id_orcamento", "oc.fk_orcamento",$vId);	
        delete($vId,"_orcamento_Produtos");

       header("Location:index.php");
    } catch (Exception $objErr) {
        echo "<h2> Algo deu errado ". $objErr-> getMessage(). "</h2>";
    }
}
?>