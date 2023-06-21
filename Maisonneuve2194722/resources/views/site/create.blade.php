@extends('layouts.app')
@section('title', trans('lang.addArticle'))
@section('titleHeader', trans('lang.addArticle'))
@section('content')
    <div class="row mt-4 justify-content-center">
        <div class="col-6">
            <div class="card">
                <form method="post" action="{{route('site.store')}}">
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
                        
                        <textarea name="body" id="body" class="form-control" value="{{ old('body') }}" placeholder="@lang('lang.addText')"></textarea>@if($errors->has('body'))
                        <p>{{ $errors->first('body') }}</p>
                        @endif<br>

                         <textarea name="texte" id="texte" value="{{ old('texte') }}"  class="form-control" placeholder="@lang('lang.addTextFrench')"></textarea>
                         @if($errors->has('texte'))
                        <p>{{ $errors->first('texte') }}</p>
                        @endif<br>
                        
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-success" value="@lang('lang.sign_up')">
                    </div>
                </form> 
            </div>
        </div>
    </div>
@endsection