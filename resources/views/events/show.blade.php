@extends('layouts.main')

@section('content')
<div class="show-container" style="min-height: 97vh;">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/images/events/{{ $event->image }}" class="img-fluid" alt="foto do evento" style="max-height: 600px; max-width: 600px; min-width: 400px;">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $event->title }}</h1>
                <h5>Voluntários:</h5>
                <p id="currentVoluntarios">&emsp;&emsp;Participando: {{ count($event->users) }} volunários</p>
                <p id="minVoluntarios">&emsp;&emsp;Vagas restantes: {{ $event->minVoluntarios - count($event->users) }}</p>
                <p id="requisitos">Requisitos: {{ $event->requisitos }}</p>
                <p id="creator">Criador por: {{ $eventOwner['name'] }}</p>
                    @if($hasUserJoined)
                    <p>Você já está participando desse evento! <a href="/dashboard">Meus Eventos!<a></p>
                    @elseif(count($event->users) >= $event->minVoluntarios)
                    <p style="color: red; font-weight: bold;">Este evento está lotado!</p>
                    @else
                    <form action="/events/join/{{ $event->id }}" method="post">
                        @csrf
                        <a href="#" class="btn btn-primary" id="inscrever-evento"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">Participar!</a>
                    </form>
                    @endif
                <p id="description">Descrição: {{ $event->description }}</p>
            </div>
        </div>
    </div>
</div>

@endsection

