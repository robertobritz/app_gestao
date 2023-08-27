<h3>Fornecedor</h3>


@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existe alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existe vários fornecedores cadastrados</h3>
@else
    <h3>Ainda nao existe fornecedores cadastrados</h3>
@endif