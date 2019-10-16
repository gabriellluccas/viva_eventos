<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Viva Eventos</title>
    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <!-- NAVBAR -->
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-md">
        <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/cliente">Viva Eventos</a></h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="btn btn-outline-primary" href="/cliente/create">novo cliente</a>
        </nav>
    </div>
    
    <!-- FORM -->
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form action="/cliente{{isset($cliente)?'/'.$cliente->cpf:''}}" method="POST" class="form-signin">
                <h1 class="h3 mb-3 font-weight-normal">{{isset($cliente)?'Editar':'Cadastrar'}} cliente</h1>
                @csrf
                @if(isset($cliente))
                @method('PATCH')
                @endif
                <!-- LINE 1 -->
                <div class="row">
                    <div class="form-group col-md-4">
                        <label> CPF</label>
                        <input name="cpf" value="{{isset($cliente)?$cliente->cpf:''}}" class="form-control">
                    </div>
                    <div class="form-group col-md-8">
                        <label> Nome</label>
                        <input name="nome" value="{{isset($cliente)?$cliente->nome:''}}" class="form-control">
                    </div>
                </div>
                
                <!-- LINE 2 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label> Telefone</label>
                        <input name="telefone" value="{{isset($cliente)?$cliente->telefone:''}}" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label> Tipo</label>
                        <select name="tipo" class="form-control">
                            <option value="fixo" {{isset($cliente) && $cliente->tipo == 'fixo'?'selected':''}}>fixo</option>
                            <option value="celular" {{isset($cliente) && $cliente->tipo == 'celular'?'selected':''}}>celular</option>
                        </select>
                    </div>
                </div>
                
                <!-- LINE 3 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label> CEP</label>
                        <input name="cep" value="{{isset($cliente)?$cliente->cep:''}}" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label> Logradouro</label>
                        <input name="logradouro" value="{{isset($cliente)?$cliente->logradouro:''}}" class="form-control">
                    </div>
                </div>
                
                <!-- LINE 4 -->
                <div class="row">
                    <div class="form-group col-md-4">
                        <label> Bairro</label>
                        <input name="bairro" value="{{isset($cliente)?$cliente->bairro:''}}" class="form-control">
                    </div>
                    <div class="form-group col-md-5">
                        <label> Cidade</label>
                        <input name="cidade" value="{{isset($cliente)?$cliente->cidade:''}}" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label> Estado</label>
                        <input name="estado" value="{{isset($cliente)?$cliente->estado:''}}" class="form-control">
                    </div>
                </div>
                
                <!-- LINE 5 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label> Data de Nascimento</label>
                        <input name="data_nascimento" value="{{isset($cliente)?$cliente->data_nascimento:''}}" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label> Status</label>
                        <select name="status" class="form-control">
                            <option value="ativo" {{isset($cliente) && $cliente->status == 'ativo'?'selected':''}}>ativo</option>
                            <option value="excluido" {{isset($cliente) && $cliente->status == 'excluido'?'selected':''}}>excluido</option>
                            <option value="inativo" {{isset($cliente) && $cliente->status == 'inativo'?'selected':''}}>inativo</option>
                        </select>
                    </div>
                </div>
                
                <!-- SUBMIT BUTTON -->
                <div class="row">
                    <div class="col-xl-3 offset-xl-9">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        const main = () => {
            
            const request = function() {
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4){
                        switch(this.status){
                            case 200:
                                const endereco = JSON.parse(this.responseText);
                                document.getElementsByName("logradouro")[0].value = endereco.logradouro;
                                document.getElementsByName("bairro")[0].value = endereco.bairro;
                                document.getElementsByName("cidade")[0].value = endereco.localidade;
                                document.getElementsByName("estado")[0].value = endereco.uf;
                                break;
                            default:
                                alert("Erro na requisição de busca do endereço");
                                break;
                        }
                    }
                };
                xhttp.open("GET", `http://viacep.com.br/ws/${document.getElementsByName("cep")[0].value}/json`, true);
                xhttp.send();
                
            }
            
            document.getElementsByName("cep")[0].addEventListener('change', request);
            
        }; 
        main();
    </script>
    
</body>
</html>
