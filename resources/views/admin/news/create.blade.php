


@php
/** @var \App\Models\News $model */
/** @var \App\Models\Category[] $categories */
@endphp
@extends('layouts.app')

@section('title')
    Админка новости
@endsection

@section('content')
    <div class="row justify-content-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-6">
            <h1>Create news</h1>
            {!! Form::open(['route' => 'admin::news::save']) !!}
                @if($model->id)
                <input type="hidden" name="id" value="{{$model->id}}">
                @endif
                <div class="form-group">
                    <label>name</label>
                    {!! Form::text("title",$model->title ?? old('title'), ['class' => "form-control"]) !!}
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Description</label>
                    {!! Form::textarea("description",$model->description ?? old('content') ??"", ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Category</label>
                    {!! Form::select('category_id', $categories, $model->category_id, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <input type="hidden" name="active" value="0">
                    <label>
                        {!! Form::checkbox("active",1, $model->active) !!}
                        Active
                    </label>
                </div>
                <div class="form-group">
                    <label>Publish date</label>
                    {!! Form::date(
                            'publish_date',
                            $model->publish_date ?? old('publish_date'),
                            ['dataformatas' =>'Y-m-d', 'class' => 'form-control'] )
                    !!}
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Save">
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
