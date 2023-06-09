@extends('layouts.main')

@section('header_sidebar',$pagName)

@section('content')
<h1>{{ $pagName }}</h1>


<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row mt-4 mb-4">
        <a type="button" class="btn-secondary btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php // echo $pag ?>&funcao=novo">Novo usuário</a>
        <a type="button" class="btn-primary btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php // echo $pag ?>&funcao=novo">+</a>

    </div>

<!-- DataTales Example -->
<div class="card shadow mb-4">

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Telefone</th>
						<th>CPF</th>
						<th>Email</th>
						<th>Endereço</th>

						<th>Nível</th>
						<th>Quantidade de acessos</th>
						<th>Ação</th>
					</tr>
				</thead>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="#" title='Editar Dados'><i class='far fa-edit text-primary'></i></a>
                    <a href="#" title='Excluir Registro'><i class='far fa-trash-alt text-danger'></i></a>
				</td>

				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><?php // echo $titulo ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form" method="POST">
				<div class="modal-body">

					<div class="form-group">
						<label >Nome</label>
						<input value="<?php // echo $nome2 ?>" type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
					</div>


					<div class="form-group">
						<label >Telefone</label>
						<input value="<?php // echo $telefone2 ?>" type="text" class="form-control" id="telefone" name="telefone" placeholder="telefone">
					</div>

					<div class="form-group">
						<label >CPF</label>
						<input value="<?php // echo $cpf2 ?>" type="text" class="form-control" id="cpf" name="cpf" placeholder="cpf">
					</div>

					<div class="form-group">
						<label >Email</label>
						<input value="<?php // echo $email2 ?>" type="text" class="form-control" id="email" name="email" placeholder="email">
					</div>

					<div class="form-group">
						<label >Endereço</label>
						<input value="<?php // echo $endereco2 ?>" type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
					</div>

					<div class="form-group">
						<label >Senha</label>
						<input value="<?php // echo $senha2 ?>" type="text" class="form-control" id="senha" name="senha" placeholder="Senha">
					</div>

					<div class="form-group">
						<label>Nível</label>
						<select name="nivel" id="nivel" class="form-control">
							<option selected value="aluno">Aluno</option>
							<option value="admin">Admin</option>
						</select>
					</div>

					<small>
						<div id="mensagem">

						</div>
					</small>

				</div>



				<div class="modal-footer">
					<input value="<?php // echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
					<input value="<?php // echo @$cpf2 ?>" type="hidden" name="antigo" id="antigo">
					<input value="<?php // echo @$email2 ?>" type="hidden" name="antigo2" id="antigo2">
					<input value="<?php // echo @$qtd ?>" type="hidden" name="qtd" id="qtd">

					<button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal" id="modal-deletar" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Excluir Registro</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<p>Deseja realmente Excluir este Registro <?php // echo @$_GET['id'] ?> ?</p>

				<div align="center" id="mensagem_excluir" class="">

				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
				<form method="post">

					<input type="hidden" id="id"  name="id" value="<?php // echo @$_GET['id'] ?>" required>

					<button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
				</form>
			</div>
		</div>
	</div>
</div>

    <!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM OU SEM IMAGEM -->
    <script type="text/javascript">
        $("#form").submit(function () {
            var pag = "<? // =$pag?>";
            event.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: pag + "/inserir.php",
                type: 'POST',
                data: formData,

                success: function (mensagem) {
                    $('#mensagem').removeClass()
                    if (mensagem.trim() == "Salvo com Sucesso!") {
                        //$('#nome').val('');
                        $('#btn-fechar').click();
                        window.location = "index.php?pag="+pag;
                    } else {
                        $('#mensagem').addClass('text-danger')
                    }
                    $('#mensagem').text(mensagem)
                },

                cache: false,
                contentType: false,
                processData: false,
                xhr: function () {  // Custom XMLHttpRequest
                    var myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                        myXhr.upload.addEventListener('progress', function () {
                            /* faz alguma coisa durante o progresso do upload */
                        }, false);
                    }
                    return myXhr;
                }
            });
        });
    </script>

    <!--AJAX PARA EXCLUSÃO DOS DADOS -->
    <script type="text/javascript">
        $(document).ready(function () {
            var pag = "<?//=$pag?>";
            $('#btn-deletar').click(function (event) {
                event.preventDefault();
                $.ajax({
                    url: pag + "/excluir.php",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "text",
                    success: function (mensagem) {

                        if (mensagem.trim() === 'Excluído com Sucesso!') {
                            $('#btn-cancelar-excluir').click();
                            window.location = "index.php?pag=" + pag;
                        }
                        $('#mensagem_excluir').text(mensagem)

                    },

                })
            })
        })
    </script>



    <!--SCRIPT PARA CARREGAR IMAGEM -->
    <script type="text/javascript">

        function carregarImg() {

            var target = document.getElementById('target');
            var file = document.querySelector("input[type=file]").files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                target.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);


            } else {
                target.src = "";
            }
        }

    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#dataTable').dataTable({
                "ordering": false
            })

        });
    </script>
</div>



@endsection
