<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listeDocs()
    {
        $docs = Document::all(); //select * from documents
        return view('site.listeDocs', ['docs' => $docs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.createDoc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       
       $filename = time(). '.' . $request->fichierDoc->extension();
       $request->file('fichierDoc')->storeAs(
        'docsCharges',
        $filename,
        'public'
       );
       
       /*  $nameDoc = Storage::disk('local')->put('docsChargestest', $request->file('fichierDoc'));
       $url = Storage::url($nameDoc);
       dd($url); */
       
        $newPost = Document::create([
            'title' => $request->title,
            'titre' => $request->titre,
            'lien' => $filename,
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('site.listeDocs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
         return view ('site.voirDoc', ['document' => $document]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
         $document->delete();

        return redirect(route('site.listeDocs'));
    }
}
