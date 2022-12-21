<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    /**
     * Display a listing of the newsletters.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::all();
        return view('newsletters.index', compact('newsletters'));
    }

    /**
     * Show the form for creating a new newsletter.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newsletters.create');
    }

    /**
     * Store a newly created newsletter in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newsletter = new Newsletter;
        $newsletter->title = $request->title;
        $newsletter->content = $request->content;
        $newsletter->published = $request->published;
        $newsletter->save();

        return redirect()->route('newsletters.index');
    }

    /**
     * Display the specified newsletter.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        return view('newsletters.show', compact('newsletter'));
    }

    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();

        return redirect()->route('newsletters.index');
    }

    public function edit(Newsletter $newsletter)
    {
        return view('newsletters.edit', compact('newsletter'));
    }

    public function update(Request $request, Newsletter $newsletter)
    {
            // Update the newsletter
    $newsletter->title = $request->title;
    $newsletter->content = $request->content;
    $newsletter->published = $request->published;
    $newsletter->save();

    // Redirect the user back to the list of newsletters with a success message
    return redirect()->route('newsletters.index')->with('success', 'Newsletter updated successfully!');
    }

}
    
