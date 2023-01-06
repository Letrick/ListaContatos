<h1> Editar usuario </h1>


<?php

    $sql = "SELECT * FROM cad_contato WHERE id=".$_REQUEST["id"]; // aqui ele vai selecionar somente o que ja tem cadastrado, o REQUEST pega o ID da tabela de contatos, vai nos trazer as infos. 

    $res = $conn ->query($sql);
    $row = $res  ->fetch_object();




?>





<form action="?page=salvar" method="POST">

  <input type="hidden" name="acao" value="editar">

  <input type="hidden" name="id" value="<?php print $row->id; ?>">

  <div class="mb-3">
    <label> Nome </label>
    <input type="text" name="nome"   value="<?php print $row->nome; ?>"           class=" form-control">

    
  </div>
  <div class="mb-3">
    <label> cpf </label>
    <input type="number" name="cpf" value="<?php print $row->cpf; ?>"  class=" form-control">

  </div>
  <div class="mb-3">
    <label for="phone"> telefone </label>
    <input type="tel" id="phone" name="telefone" value="<?php print $row->telefone; ?>" class=" form-control" >

  </div>
  <div class="mb-3">
    <label> Endereço </label>
    <input type="text" name="endereco" value="<?php print $row->endereco; ?>"  class=" form-control">

  </div>
  <div class="mb-3">
       
  <button type="submit" class="btn btn-primary"> Enviar </button>

    </div>



</form>