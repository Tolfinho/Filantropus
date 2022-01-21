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
                <div style="height: 2px; width: 250px; background-color: #311B92; margin-bottom: 30px;"></div>
                <h5><i class="fas fa-users" style="margin-right: 5px;"></i>Voluntários:</h5>
                <p id="currentVoluntarios">&emsp;&emsp;<i class="fas fa-user"></i>Participando: {{ count($event->users) }} volunários</p>
                <p id="minVoluntarios">&emsp;&emsp;<i class="far fa-user"></i>Vagas restantes: {{ $event->minVoluntarios - count($event->users) }}</p>
                <p id="local"><i class="fas fa-map-marker-alt" style="margin-right: 5px;"></i>Local: {{ $event->local }}</p>
                <p id="requisitos"><i class="fas fa-list-ul" style="margin-right: 5px;"></i>Requisitos: {{ $event->requisitos }}</p>
                <p id="creator"><i class="fas fa-user-tie" style="margin-right: 5px;"></i>Criado por: {{ $eventOwner['name'] }}</p>
                <p id="creator"><i class="fas fa-phone-alt" style="margin-right: 5px;"></i>Fale Conosco pelo WhatsApp: <a href="https://api.whatsapp.com/send?phone=55{{$eventOwner['whatsapp']}}" target="_blank" class="whatsapp-btn"><i class="fab fa-whatsapp" style="margin-right: 10px;"></i>{{ $eventOwner['whatsapp'] }}</a></p>
                <p id="description"><i class="fas fa-hand-point-right" style="margin-right: 5px;"></i>Descrição: {{ $event->description }}</p>
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
            </div>
        </div>
    </div>
</div>

@endsection

