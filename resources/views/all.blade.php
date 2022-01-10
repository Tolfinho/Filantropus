@extends('layouts.main')

@section('content')

    <div id="banner-all-events">
        <div class="col-md-6 offset-md-3">
            <h1>Procure o <span style="color: #311B92; font-weight: 600;">Evento</span> que mais <br>se encaixa com <span style="color: #311B92; font-weight: 600;">Você</span>!</h1>
            <form action="" method="post" class="form-group">
                <input type="text" name="search" id="search" placeholder="Pesquisar por Eventos...">
            </form>
        </div>
    </div>

    <div id="events-container" class="col-md-12">
    <h1>Todos os eventos:</h1>
    @php
        $cont=0;
    @endphp
    @foreach($events as $event)
        @if($event->status == 1)
        <p style="display: none;">{{ ++$cont }}</p>
        @endif
    @endforeach
    @if($cont > 0)
        <div id="cards-container" class="row">
            @foreach($events as $event)
                @if($event->status == 1)
                    <div class="card col-md-4">
                        <img src="/images/events/{{ $event->image }}" alt="{{ $event->title }}" style="height: 250px;">
                        <div class="card-body"> 
                            <p class="card-date">02/09/2021</p>
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-participantes">{{ count($event->users) }} Participantes</p>
                            <a href="/events/{{ $event->id }}" class="btn btn-primary">Saiba mais!</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @else
        <h5>Nenhum evento cadastrado! <a href="/events/create" style="color: #311B92;">Clique aqui para criar um evento!</a></h5>
    @endif
    </div>

@endsection