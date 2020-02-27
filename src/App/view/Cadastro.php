
<form action="<?php echo URL;?>index.php?tipo=inserir" method="POST">
  <div class="form-group">
    <label for="exampleInputPassword1">Nome:</label>
    <input type="text" name="nome_txt" class="form-control" id="nomeTxt" placeholder="Digite seu nome">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Email:</label>
    <input type="email" name="email_txt" class="form-control" id="emailTxt" placeholder="Digite seu Email">
  </div>
     <div class="form-group">
    <label for="exampleInputEmail1">Endereço do Consultório:</label>
    <input type="text" name="endereco_consultorio_txt" class="form-control" id="enderecoConsultorioTxt"  placeholder="Endereço do Consultório">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Senha:</label>
    <input type="password" name="senha_txt" class="form-control" id="senhaTxt" placeholder="Digite uma senha">
  </div>

    
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>