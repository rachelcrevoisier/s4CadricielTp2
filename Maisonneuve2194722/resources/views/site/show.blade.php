@extends('layouts.app')
@section('title', 'Article')
@section('titleHeader', 'Article')
@section('content')
<div class="row mt-5">
  <div class="col-12">
    <a href="{{route('site.index')}}" class="btn btn-outline-primary btn-sm">@lang('lang.back')</a>
    <hr>
    @php $lang = session('locale') @endphp
     @if($lang == 'fr')
    <h2 class='display-6 mt-5'>
      {{$blogPost->titre}}
    </h2>
    <p>
      {!! $blogPost->texte !!}
    </p>
    <p>
      <strong>@lang('lang.author') :</strong> {{ $blogPost->blogHasUser->name }}
    </p>
    @elseif($lang == 'en')
    <h2 class='display-6 mt-5'>
      {{$blogPost->title}}
    </h2>
    <p>
      {!! $blogPost->body !!}
    </p>
    <p>
      <strong>@lang('lang.author') :</strong> {{ $blogPost->blogHasUser->name }}
    </p>
    @endif
  </div>
  <hr>
</div>
<div class="row">
  <div class="col-4">
   @if ($blogPost->user_id == Auth::user()->id)
    <a href="{{ route('site.edit', $blogPost->id)}}" class="btn btn-success">@lang('lang.edit')</a>
    @endif
  </div>
  <div class="col-4">
    @if ($blogPost->user_id == Auth::user()->id)
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete">
      @lang('lang.delete')
    </button>
    @endif
  </div>
  <!--  -->
</div>



<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.delete')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @lang('lang.deleteArticle') {{ $blogPost->id}} ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
        <form method="post">
          @csrf
          @method('delete')
          <input type="submit" value="Effacer" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>


@endsection