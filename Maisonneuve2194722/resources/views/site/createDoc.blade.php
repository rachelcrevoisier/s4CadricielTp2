@extends('layouts.app')
@section('title', trans('lang.addArticle'))
@section('titleHeader', trans('lang.addArticle'))
@section('content')
    <div class="row mt-4 justify-content-center">
        <div class="col-6">
            <div class="card">
                <form method="post" enctype="multipart/form-data" action="{{route('site.storeDoc')}}">
                    @csrf
                    <div class="card-header">
                        Formulaire
                    </div>
                    <div class="card-body">
                        <input type="text" id="title" value="{{ old('title') }}"  name="title" class="form-control" placeholder="@lang('lang.addTitle')">
                        @if($errors->has('title'))
                        <p>{{ $errors->first('title') }}</p>
                        @endif<br>
                        <input type="text" id="titre" name="titre" value="{{ old('titre') }}"  class="form-control" placeholder="@lang('lang.addTitleFrench')">@if($errors->has('titre'))
                        <p>{{ $errors->first('titre') }}</p>
                        @endif<br>
                        
                        <laber> Ajouter un document : </label><input name="fichierDoc" type="file">

                         
                        
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-success" value="@lang('lang.sign_up')">
                    </div>
                </form> 
            </div>
        </div>
    </div>
@endsection