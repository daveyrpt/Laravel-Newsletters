<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\TrashNewsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    /**
     * Display a listing of the newsletters.
     *
     * @return \Illuminate\Http\Response
     */
    public function userindex()
    {
        $newsletters = Newsletter::all();
        return view('newsletters.user.index', compact('newsletters'));
    }

    public function adminindex()
    {
        $newsletters = Newsletter::all();
        return view('newsletters.admin.index', compact('newsletters'));
    }

    /**
     * Show the form for creating a new newsletter.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newsletters.admin.create');
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

        $model = TrashNewsletter::where('title', $request->title)->first();
        echo($model);
        if($model) {
            $model->delete();
            return redirect()->route('newsletters.adminindex');

        } else {
            return redirect()->route('newsletters.adminindex');
        }
    }
    
    /**
     * Display the specified newsletter.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function adminshow(Newsletter $newsletter)
    {
        return view('newsletters.admin.show', compact('newsletter'));
    }

    public function usershow(Newsletter $newsletter)
    {
        return view('newsletters.user.show', compact('newsletter'));
    }

    public function destroy(Newsletter $newsletter)
    {
        $trashNewsletter = new TrashNewsletter;
        $trashNewsletter->title = $newsletter->title;
        $trashNewsletter->content = $newsletter->content;
        $trashNewsletter->published = $newsletter->published;
        $trashNewsletter->save();

        $newsletter->delete();
        return redirect()->route('newsletters.adminindex')->with('success', 'Newsletter delete successfully!');
    }

        /**
     * Display a listing of the newsletters.
     *
     * @return \Illuminate\Http\Response
     */
    public function restoreView()
    {
        $trashNewsletters = TrashNewsletter::all();
        return view('newsletters.admin.restore', compact('trashNewsletters'));
    }

    public function edit(Newsletter $newsletter)
    {
        return view('newsletters.admin.edit', compact('newsletter'));
    }

    public function update(Request $request, Newsletter $newsletter)
    {
            // Update the newsletter
            $newsletter->title = $request->title;
            $newsletter->content = $request->content;
            $newsletter->published = $request->published;
            $newsletter->save();

            // Redirect the user back to the list of newsletters with a success message
            return redirect()->route('newsletters.adminindex')->with('success', 'Newsletter updated successfully!');
    }

}
    
