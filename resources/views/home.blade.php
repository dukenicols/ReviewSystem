@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            @foreach ($reviews as $review)
            <div class="resena row">
                <div class="col-md-8">
                    <a href="{{ $review->titleToUrl() }}"><h2 class="title">{{ $review->title }}</h2></a>
                    <div>
                        <h3 class="website">{{ $review->client }}</h3>
                        <div class="puntuacion">
                            @for ($i = 1; $i < $review->score; $i++)
                                X
                            @endfor
                        </div>
                    </div>
                    <p class="comentario">{{ $review->description }}</p>
                    <div class="user" style="display: inline">
                        <img src="@if (empty($review->created_by()->first()->img)) {{ asset('img/default_avatar.png') }} @else $user->img @endif" />
                        {{ $review->created_by()->first()->name }}
                    </div>
                    <div class="date" style="display: inline">Publicado el {{ Carbon\Carbon::setLocale('es') }} {{ Carbon\Carbon::parse($review->created_at)->format('j \\d\\e\\ F Y') }}</div>
                </div>
                <div class="col-md-4 circles">
                    <div class="visitas">33<span>Visitas</span></div>
                    <div class="coments">2<span>Comentarios</span></div>
                    <div class="votos">0<span>Votos</span></div>
                </div>
            </div>
            @endforeach
            {!! $reviews->links() !!}
        </div>
        <div class="col-md-3" id="sidebar">
            <div class="grey nueva-resena">
                <button type="button" id="add-resena" class="btn btn-primary @if (Auth::guest())not-logged @else logged @endif">+ Agregar una rese&ntilde;a</button>
            </div>
            <div class="grey populares">
                <h4>Rese&ntilde;as Populares</h4>
            </div>
        </div>
    </div>
</div>

@include('modals.login')
@endsection
