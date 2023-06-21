@extends('layouts.app')
@section('title', trans('lang.ListOfDocs'))
@section('titleHeader', trans('lang.ListOfDocs'))
@section('content')
<div class="row">

    <div class="col-12">
        <p><a href="{{route('site.createDoc')}}" class="btn btn-success btn" value="@lang('lang.addDocs')">@lang('lang.addDocs')</a></p>

    </div>
</div>

<table class="table table-striped">
   
    @php $lang = session('locale') @endphp
    <thead>
        <tr>
            <th scope="col">@lang('lang.title')</th>
            <th scope="col">@lang('lang.journalist')</th>
            <th scope="col">@lang('lang.link')</th>
            <th scope="col">@lang('lang.see')</th>
            <th scope="col">@lang('lang.edit')</th>
           
        </tr>
    </thead>
    <tbody>
        @forelse($docs as $doc)
        <tr>
         @if($lang == 'fr' AND $doc->titre !="")
            <th scope="row">{{$doc->titre}} </th>
            <td>{{$doc->documentHasUser->name}}</td>
            <th scope="row">{{$doc->lien}}</th>
            <td><a href="{{ route('site.voirdoc', $doc->id)}}">@lang('lang.see')</a></td>
                @if ($doc->user_id == Auth::user()->id)
            <td><a href="{{ route('site.edit', $doc->id)}}">@lang('lang.edit')</a></td>
                @elseif ($doc->user_id != Auth::user()->id)
            <td>-</td>
                @endif
        @elseif($lang == 'en'AND $doc->title !="")
            <th scope="row">{{$doc->title}}</th>
            <td>{{$doc->documentHasUser->name}}</td>
            <td><a href="{{ route('site.voirdoc', $doc->id)}}">@lang('lang.see')</a></td>
                @if ($doc->user_id == Auth::user()->id)
            <td><a href="{{ route('site.edit', $doc->id)}}">@lang('lang.edit')</a></td>
                @elseif ($doc->user_id != Auth::user()->id)
            <td>-</td>
                @endif
        @endif
        </tr>
        @empty
        <tr>
            <td class="text-danger">@lang('lang.NoDocFound')</td>
        </tr>
        @endforelse
    </tbody>
    
</table>
<br>

<br>

@endsection