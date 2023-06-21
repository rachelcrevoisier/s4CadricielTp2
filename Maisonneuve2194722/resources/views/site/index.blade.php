@extends('layouts.app')
@section('title', trans('lang.ListOfItems'))
@section('titleHeader', trans('lang.ListOfItems'))
@section('content')
<div class="row">

    <div class="col-12">
        <p><a href="{{route('site.createArticle')}}" class="btn btn-success btn" value="@lang('lang.addArticle')">@lang('lang.addArticle')</a></p>

    </div>
</div>

<table class="table table-striped">
   
    @php $lang = session('locale') @endphp
    <thead>
        <tr>
            <th scope="col">@lang('lang.title')</th>
            <th scope="col">@lang('lang.journalist')</th>
            <th scope="col">@lang('lang.see')</th>
            <th scope="col">@lang('lang.edit')</th>
           
        </tr>
    </thead>
    <tbody>
        @forelse($posts as $post)
        <tr>
         @if($lang == 'fr' AND $post->titre !="")
            <th scope="row">{{$post->titre}}</th>
            <td>{{$post->blogHasUser->name}}</td>
            <td><a href="{{ route('site.show', $post->id)}}">@lang('lang.see')</a></td>
                @if ($post->user_id == Auth::user()->id)
            <td><a href="{{ route('site.edit', $post->id)}}">@lang('lang.edit')</a></td>
                @elseif ($post->user_id != Auth::user()->id)
            <td>-</td>
                @endif
        @elseif($lang == 'en'AND $post->title !="")
            <th scope="row">{{$post->title}}</th>
            <td>{{$post->blogHasUser->name}}</td>
            <td><a href="{{ route('site.show', $post->id)}}">@lang('lang.see')</a></td>
                @if ($post->user_id == Auth::user()->id)
            <td><a href="{{ route('site.edit', $post->id)}}">@lang('lang.edit')</a></td>
                @elseif ($post->user_id != Auth::user()->id)
            <td>-</td>
                @endif
        @endif
        </tr>
        @empty
        <tr>
            <td class="text-danger">Aucun article trouvé</td>
        </tr>
        @endforelse
    </tbody>
    
</table>
<br>

<br>

@endsection