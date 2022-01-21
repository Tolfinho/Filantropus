@extends('layouts.main')

@section('content')

<!-- BANNER PRINCIPAL -->
<div id="banner-container" class="col-md-12">
    <h1>Participe ou Crie Ações Voluntários!</h1>
    <h2>Comece agora a mudar a vida de milhares de pessoas</h2>
    <a href="/events/create" class="btn btn-primary create-event-btn">Criar Ação</a>
    <a href="/#all" class="btn btn-primary all-events-btn">Todos as Ações</a>

    <div class="col-md-2 offset-md-5">
        <a href="#all"><lottie-player id="scrolldown-icon" src="https://assets10.lottiefiles.com/packages/lf20_6xqewjvz.json" background="transparent"  speed="1"  style="width: 100px; height: 100px;" loop autoplay></lottie-player></a>
    </div>
</div>
<div id="all"></div>
<div id="events-container" class="col-md-12">
    <h1>Todos as Ações Voluntárias:</h1>
    <form action="/" method="GET">
    <i class="fas fa-search" style="font-size: 22px; margin-right: 20px;"></i><input type="text" id="search" name="search" class="form-control" style="display: inline-block; width: 30%; padding: 10px 15px; margin-bottom: 20px;" placeholder="Pesquisar! (Cidade ou Nome de Evento)">
    </form>
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
                            <p class="card-local" style="margin-top: -10px;">{{ $event->local }}</p>
                            <a href="/events/{{ $event->id }}" class="btn btn-primary">Saiba mais!</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @elseif($cont >= 0 && !$search)
        <h5>Nenhum evento cadastrado! <a href="/events/create" style="color: #311B92;">Clique aqui para criar um evento!</a></h5>
    @else
    <h1 style="font-size: 20px; margin-top: 20px;">Não encontramos nenhum resultado para: <b>{{ $search }}</b></h1><a href="/" style="padding: 10px 15px; background: #311B92; border: 1px solid #311B92; color: white; text-decoration: none; border-radius: 5px;">Ver Toas Publicações</a>
    @endif
</div>

@endsection

