@extends('layouts.main')

@section('content')
    <div id="page-container">
        <div id="event-create-container" class="col-md-6 offset-md-3">
            <h1>Crie seu evento!</h1>
            <form action="/events" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Título do evento..." required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="description" id="description" placeholder="Descrição do evento..." required></textarea>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="local" id="local" placeholder="Onde será o evento?" required></textarea>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="minVoluntarios" id="minVoluntarios" placeholder="Qual a quantidade de voluntários necessária?" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="requisitos" id="requisitos" placeholder="Quais os requisitos para o evento?" required  ></textarea>
                </div>
                <div class="form-group">
                    <p>Escolha a imagem do seu evento:</p>
                    <label for="image" class="btn btn-primary img-btn">Upload<p>( Recommended size: 600px - 600px )</p></label>
                    <input type="file" id="image" name="image" class="from-control-file" required>
                </div>
                
                <div class="form-group">
                <input type="submit" class="btn btn-primary create-btn" value="Criar Evento">
                </div>
            </form>
        </div>
    </div>

@endsection