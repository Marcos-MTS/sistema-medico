
<header>
    <h2>Cadastro de médico</h2>
</header>
<div class="container">
    <section>
        <form id="form-cadastro" action="<?php echo URL; ?>index.php?tipo=inserir" method="POST">
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="nome_txt" class="form-control" id="nomeTxt" placeholder="Digite seu nome">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email_txt" class="form-control" id="emailTxt" placeholder="Ex. fulano@gmail.com">
            </div>
            <div class="form-group">
                <label>Endereço do Consultório:</label>
                <input type="text" name="endereco_consultorio_txt" class="form-control" id="enderecoConsultorioTxt"  placeholder="Ex. Rua tal 78, Centro, Pelotas">
            </div>
            <div class="form-group">
                <label>Senha:</label>
                <input type="password" name="senha_txt" class="form-control" id="senhaTxt" placeholder="Digite uma senha">
            </div>
            <div class="form-group">
                <label>Repita a Senha:</label>
                <input type="password" name="re_senha_txt" class="form-control" id="reSenhaTxt" placeholder="Digite a senha novamente">
            </div>
            <button id="btn-submit-cadastro" type="submit" class="btn btn-primary">Cadastrar</button>
            <!--<button id="btn_submit_cadastro" class="btn btn-primary">Cadastrar</button>-->


        </form>
        <!--<button id="btn_submit_cadastro" class="btn btn-primary">Cadastrar</button>-->


    </section>
</div>
