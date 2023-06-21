@extends('layouts.app')
@section('title', trans('lang.editArticle'))
@section('titleHeader', trans('lang.editArticle'))
@section('content')
    <div class="row mt-4 justify-content-center">
        <div class="col-6">
            <div class="card">
                <form method="post">
                    @csrf
                    @method('put')
                    <div class="card-header">
                        Formulaire
                    </div>
                    <div class="card-body">
                        <label for="title">@lang('lang.titleEnglish')</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{$blogPost->title}}">
                        <label for="titre">@lang('lang.titleFrench')</label>
                        <input type="text" id="titre" name="titre" class="form-control" value="{{$blogPost->titre}}">
                        <label for="body">@lang('lang.articleEnglish')</label>
                        <textarea name="body" id="body" class="form-control">{{$blogPost->body}}</textarea>
                        <label for="texte">@lang('lang.articleFrench')</label>
                        <textarea name="texte" id="texte" class="form-control">{{$blogPost->texte}}</textarea>
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-success" value="@lang('lang.sign_up')">
                    </div>
                </form> 
            </div>
        </div>
    </div>
@endsection