<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Biblioteka;
use Session;

class BibliotekaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ksiazki = Biblioteka::orderBy('id', 'desc')->paginate(5);
        return view('bib.index')->with('ksiazki', $ksiazki);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bib.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'autor' => 'required',
            'tytul' => 'required|unique:biblioteka',
            'rok_wyd' => 'required|integer'
        ]);

        $ksiazka = new Biblioteka;
        $ksiazka->autor = $request->autor;
        $ksiazka->tytul = $request->tytul;
        $ksiazka->opis = $request->opis;
        $ksiazka->rok_wyd = $request->rok_wyd;

        $ksiazka->save();

        Session::flash('alert', 'Książka została dodana do bazy danych');
        return redirect()->route('biblioteka.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ksiazka = Biblioteka::find($id);
        return view('bib.show')->with('ksiazka', $ksiazka);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ksiazka = Biblioteka::find($id);
        return view('bib.edit')->with('ksiazka', $ksiazka);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ksiazka = Biblioteka::find($id);

        if ($request->input('tytul') == $ksiazka->tytul) 
        {
            $this->validate($request, [
                'autor' => 'required',
                'rok_wyd' => 'required|integer'
            ]);
        }
        else 
        {
            $this->validate($request, [
                'autor' => 'required',
                'tytul' => 'required|unique:biblioteka',
                'rok_wyd' => 'required|integer'
            ]);    
        }

        $ksiazka->autor = $request->autor;
        $ksiazka->tytul = $request->tytul;
        $ksiazka->opis = $request->opis;
        $ksiazka->rok_wyd = $request->rok_wyd;

        $ksiazka->save();

        Session::flash('alert', 'Książka została zedytowana');
        return redirect()->route('biblioteka.show', $ksiazka->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ksiazka = Biblioteka::find($id);
        $ksiazka->delete();

        Session::flash('alert', "Książka o tytule: $ksiazka->tytul została usunięta");
        return redirect()->route('biblioteka.index');
    }
}
