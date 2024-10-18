<?php

use App\Models\Estoque;
use App\Models\Produto;
use App\Widgets\BaseWidget;

/**
 * @see App\Controllers\EstoqueController::formulario()
 * @var Estoque $estoque
 * @var Produto[] $produtos
 */

?>

<form method="post" action="<?= $estoque?->id ? '/estoques/salvar/'.$estoque?->id : '/estoques/salvar' ?>">
    <div class="card">
        <div class="card-header">
            <h4><?= $titulo ?></h4>
        </div>
        <div class="card-body">

            <div class="row">

                <?php if(!$estoque):?>

                <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                    <label for="produto_id" class="form-label">Produto</label>
                    <select id="produto_id" name="produto_id" class="form-control" required>
                        <option value="">Selecione um produto...</option>
                        <?php foreach($produtos as $produto): ?>
                            <option value="<?= $produto->id ?>"><?= $produto->nome ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endif; if ($estoque): ?>

                <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                    <label for="produto_id" class="form-label">Produto</label>
                    <select id="produto_id" name="produto_id" class="form-control" required>
                            <option value="<?= $estoque->produto->id ?>"><?= $estoque->produto->nome ?></option>
                    </select>
                </div>

                <?php endif; ?>

                <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                    <label for="quantidade" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" step="1" min="1" name="quantidade" value="<?= $estoque?->quantidade ?>" required>
                </div>

            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</form>

<script>
    $(function () {

        $('#summernote').summernote();

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>