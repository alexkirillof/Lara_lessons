@extends('layouts.app')


@section('title')
    Новости
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Новости</h1>
            <p>
                <a class="btn btn-success" href="{{route('admin::news::create')}}">
                    Создать
                </a>
            </p>

            <div class="list-group">
                @forelse ($news as $item)

                    <div href="#" class="list-group-item">
                        <h2>{{$item->title}}</h2>
                        <p>
                            <a class="btn btn-primary" href="{{route('admin::news::update', ['id' => $item->id])}}">
                                Изменить
                            </a>
                            <a class="btn btn-danger" href="{{route('admin::news::delete', ['id' => $item->id])}}">
                                Удалить
                            </a>
                        </p>

                    </div>

                @empty
                    Новостей нет!
                @endforelse
            </div>
            <hr>
            <div class="row justify-content-center">
                {{$news->links()}}
            </div>
        </div>
    </div>
@endsection