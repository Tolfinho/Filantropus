@extends('layouts.main')

@section('content')

<section id="participants-container">
    <div id="participants" class="col-md-10 offset-md-1">
        <h1>Voluntários de: {{ $event->title }}</h1>
        @if(count($participants) > 0)
          <div class="row">
            @foreach($participants as $participant)
                
                <div class="col-md-3">
                    <p><b>Nome: </b>{{ $participant->name }}</p>
                    <p><b>Email: </b>{{ $participant->email }}</p>
                    <p><b>WhatsApp: </b>{{ $participant->whatsapp }}</p>
                    <p><b>UF: </b>{{ $participant->uf }}</p>
                    <p><b>Cidade: </b>{{ $participant->city }}</p>
                    <form action="/events/participants/{{ $participant->id }}/{{ $event->id }}" method="post">
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="btn btn-primary">Remover Participante</button>
                    </form>
                    
                </div>

            @endforeach
          </div>
           

        @else 
        <h1>O seu evento não possui nenhum participante ainda! Clique aqui para convidar!</h1>
        @endif
    </div>
</section>
   


@endsection