<header>
    <h2>Edição de Perfil</h2>
</header>
<div class="container">
    <section>
        <form id="form-edicao-cadastro" action="<?php echo URL; ?>index.php?tipo=atualizar" method="POST">
            <input value="<?php echo $medico->getId() ?>" type="hidden" id="idTxt" name="id_txt" >
            <div class="form-group">
                <label>Nome:</label>
                <input value="<?php echo $medico->getNome() ?>" type="text" name="nome_txt" class="form-control" id="nomeTxt" placeholder="Digite seu nome">
            </div>
            <div class="form-group">
                <label>Endereço do Consultório</label>
                <input value="<?php echo $medico->getEnderecoConsultorio() ?>" type="text" name="endereco_consultorio_txt" class="form-control" id="enderecoConsultorioTxt"  placeholder="Endereço do Consultório">
            </div>
            <div class="form-group">
                <label>Nova Senha:</label>
                <input type="password" name="senha_txt" class="form-control" id="senhaTxt" placeholder="Deixe em branco para manter a senha">
            </div>
             <div class="form-group">
                <label>Repita a Senha:</label>
                <input type="password" name="re_senha_txt" class="form-control" id="reSenhaTxt" placeholder="Deixe em branco para manter a senha">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </section>
</div>