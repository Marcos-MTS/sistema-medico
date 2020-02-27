<header>
    <h2>Médicos Cadastrados</h2>
</header>

<div class="container">
    <section>
        <table class="table table-bordered table-striped" style="top:40px;">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço do Consultório</th>
                    <th><a href="?tipo=criar" id="btn-novo" class="btn btn-success btn-sm">Adicionar Médico</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($medicos) {
                    foreach ($medicos as $medico) {
                        ?>
                        <tr>
                            <td><?php echo $medico->getNome(); ?></td>
                            <td><?php echo $medico->getEnderecoConsultorio(); ?></td>
                            <td>
                                <a href="?tipo=editar&id=<?php echo $medico->getId(); ?>" class="btn btn-primary btn-sm">Editar</a>
                                <a href="?tipo=excluir&id=<?php echo $medico->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="5">Nenhum registro encontrado</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </section>
</div>