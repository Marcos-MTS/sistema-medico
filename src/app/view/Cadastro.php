
        <header>
            <h2>Cadastro de médico</h2>
        </header>
        <div class="container">
            <section>
                <form action="<?php echo URL; ?>index.php?tipo=inserir" method="POST">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nome:</label>
                        <input type="text" name="nome_txt" class="form-control" id="nomeTxt" placeholder="Digite seu nome">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email:</label>
                        <input type="email" name="email_txt" class="form-control" id="emailTxt" placeholder="Ex. fulano@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Endereço do Consultório:</label>
                        <input type="text" name="endereco_consultorio_txt" class="form-control" id="enderecoConsultorioTxt"  placeholder="Ex. Rua tal 78, Centro, Pelotas">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha:</label>
                        <input type="password" name="senha_txt" class="form-control" id="senhaTxt" placeholder="Digite uma senha">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Repita a Senha:</label>
                        <input type="password" name="re_senha_txt" class="form-control" id="senhaTxt" placeholder="Digite a senha novamente">
                    </div>


                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </section>
        </div>
   