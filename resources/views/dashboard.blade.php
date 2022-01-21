@extends('layouts.main')

@section('content')

    <div class="dashboard-container">
        <!-- DADOS PESSOAIS -->
        <div class="col-md-8 offset-md-2 personal-info-container">
                <h1>Informações Pessoais<!-- <a href="#" class="btn btn-primary profile-edit-btn">Editar</a> --></h1>

                <div class="personal-info-data-container">
                    <div class="row">
                        <div class="col-md-4">
                            <p><i class="fas fa-angle-right" style="margin-right: 8px; color: #311B92;"></i>Nome: {{ $user->name }}</p>
                            <p><i class="fas fa-angle-right" style="margin-right: 8px; color: #311B92;"></i>Email: {{ $user->email }}</p>
                            <p><i class="fas fa-angle-right" style="margin-right: 8px; color: #311B92;"></i>WhatsApp: {{ $user->whatsapp }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><i class="fas fa-angle-right" style="margin-right: 8px; color: #311B92;"></i>UF: {{ $user->uf }}</p>
                            <p><i class="fas fa-angle-right" style="margin-right: 8px; color: #311B92;"></i>Cidade: {{ $user->city }}</p>
                        </div>
                    </div>
                </div> 
            </div>  

        <!-- MEUS EVENTOS -->
        <div class="col-md-8 offset-md-2 dashboard-table-container">
            <div class="dashboard-title-container">
                <h1>Minhas Ações Comunitárias</h1>
            </div>
                @if(count($events) > 0)
                <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Participantes</th>
                                <th scope="col">Status</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td scope="row">{{ $loop->index + 1 }}</td>
                                    <td scope="row"><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                                    <td scope="row">{{ count($event->users) }}<a href="/events/participants/{{ $event->id }}" style="color: green; text-decoration: none; border-bottom: 1px solid green; margin-left: 5px;">Detalhes!</a></td>
                                        @if($event->status == 1)
                                            <td scope="row">Ativo</td>
                                        @elseif($event->status == 0)
                                            <td scope="row">Desativado</td>
                                        @endif
                                    
                                    <td scope="row">
                                        <a href="/events/edit/{{ $event->id }}" class="btn btn-info edit-btn">Editar</a>
                                        <form action="/events/{{ $event->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete-btn">Excluir</button>
                                        </form>
                                        @if($event->status == 1)
                                            <form action="/events/toogleStatus/{{ $event->id }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn toogleStatus">Desativar</button>
                                            </form>
                                        @elseif($event->status == 0)
                                            <form action="/events/toogleStatus/{{ $event->id }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn toogleStatus">Ativar</button>
                                            </form>
                                        @endif
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                @else
                <h5>Você não possui Ações Comunitárias cadastradas! <a href="/events/create">Crie sua Ação Comunitária agora mesmo!</a></h5>
                @endif
        </div>

        <!-- EVENTOS QUE ESTOU PARTICIPANDO -->
        <div class="col-md-8 offset-md-2 dashboard-table-container">
            <div class="dashboard-title-container">
                <h1>Ações Comunitárias em que estou participando:</h1>
            </div>
            @if(count($eventAsParticipant) > 0)
                <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Participantes</th>
                                <th scope="col">Status</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eventAsParticipant as $event)
                                <tr>
                                    <td scope="row">{{ $loop->index + 1 }}</td>
                                    <td scope="row"><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                                    <td scope="row">{{ count($event->users) }}</td>
                                        @if($event->status == 1)
                                            <td scope="row">Ativo</td>
                                        @elseif($event->status == 0)
                                            <td scope="row">Desativado</td>
                                        @endif
                                    <td scope="row">
                                        <form action="/events/leave/{{ $event->id }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger delete-btn">Sair do Evento</button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                @else
                <h5>Vocênão está participando de nenhuma ação! <a href="/#all">Ver Ações disponíveis!</a></h5>
                @endif
        </div>
    </div>
    

@endsection
