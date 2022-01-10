@extends('layouts.main')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1 style="margin-top: 80px;">Editando evento: {{ $event->title }}</h1>
    <form action="/events/update/{{ $event->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image" class="img-btn" style="padding: 5px 10px; border-radius: 5px; cursor: pointer;">Imagem: (upload)</label>
            <input type="file" id="image" name="image" class="from-control-file">
            <img src="/images/events/{{ $event->image }}" alt="" class="img-preview">
        </div>
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Título do evento..." value="{{ $event->title }}">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea class="form-control" name="description" id="description" placeholder="Descrição do evento...">{{ $event->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="local">Local:</label>
            <textarea class="form-control" name="local" id="local" placeholder="Onde será o evento?">{{ $event->local }}</textarea>
        </div>
        <div class="form-group">
            <label for="minVolutarios">Mínimo de Voluntários:</label>
            <input type="number" class="form-control" name="minVoluntarios" id="minVoluntarios" placeholder="Qual o mínimo de voluntários necessários?" value="{{ $event->minVoluntarios }}">
        </div>
        <div class="form-group">
            <label for="requisitos">Requisitos:</label>
            <textarea class="form-control" name="requisitos" id="requisitos" placeholder="Quais os requisitos para o evento?">{{ $event->requisitos }}</textarea>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Editar Evento">
    </form>
</div>

@endsection