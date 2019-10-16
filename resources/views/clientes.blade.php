<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Viva Eventos</title>

    <!-- Style -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/cliente">Viva Eventos</a></h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="btn btn-outline-primary" href="/cliente/create">novo cliente</a>
        </nav>
    </div>

    <div class="row">
        <div class="col-sm-10 offset-sm-1">
            <form action="cliente" method="GET">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Ordenação:</label>
                            <select name="ordenacao" class="form-control">
                                <option value="asc">Ascendente</option>
                                <option value="desc">Descendente</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Coluna:</label>
                            <select name="coluna" class="form-control">
                                <option value="cpf">Cpf</option>
                                <option value="nome">Nome</option>
                                <option value="telefone">Telefone</option>
                                <option value="data_nascimento">Data de Nascimento</option>
                                <option value="status">Status</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                            <div class="form-group">
                                <label>Ordenar:</label>
                                <button type="submit" class="form-control btn btn-primary">Atualizar</button>
                            </div>
                        </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-sm-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">CPF</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <th scope="row" class="text-center">{{$cliente->cpf}}</th>
                        <td>{{$cliente->nome}}</td>
                        <td>{{$cliente->telefone}}</td>
                        <td>{{$cliente->cidade}}</td>
                        <td>{{$cliente->data_nascimento}}</td>
                        <td>{{$cliente->status}}</td>
                        <td>
                            <form action="/cliente/{{$cliente->cpf}}/edit" method="GET">
                                <button class="btn btn-link">Editar</button>
                            </form>
                        </td>
                        <td>
                            <form action="/cliente/{{$cliente->cpf}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link">Remover</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2 offset-sm-9">
            <form action="cliente/exportar-xls" method="GET">
                <button class="btn btn-primary" type="submit">Exportar XLS</button><br><br>
            </form>
        </div>
    </div>
</body>
</html>
