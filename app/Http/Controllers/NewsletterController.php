<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\TrashNewsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    // User newsletter interface
    public function userindex()
    {
        $newsletters = Newsletter::all();
        return view('newsletters.user.index', compact('newsletters'));
    }

    // Admin newsletter interface
    public function adminindex()
    {
        $newsletters = Newsletter::all();
        return view('newsletters.admin.index', compact('newsletters'));
    }

    // Admin create newslatter interface
    public function create()
    {
        return view('newsletters.admin.create');
    }

    // Admin create newslatter functionality
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
    
    // Admin single newsletter interface
    public function adminshow(Newsletter $newsletter)
    {
        return view('newsletters.admin.show', compact('newsletter'));
    }

    // User single newsletter interface
    public function usershow(Newsletter $newsletter)
    {
        return view('newsletters.user.show', compact('newsletter'));
    }

    // Admin delete newslatter functionality
    public function destroy(Newsletter $newsletter)
    {
        $trashNewsletter = new TrashNewsletter;
        $trashNewsletter->title = $newsletter->title;
        $trashNewsletter->content = $newsletter->content;
        $trashNewsletter->published = $newsletter->published;
        $trashNewsletter->save();
        //echo($newsletter);
        $newsletter->delete();
        return redirect()->route('newsletters.adminindex')->with('success', 'Newsletter delete successfully!');
    }

    // Admin restore newslatter interface
    public function restoreView()
    {
        $trashNewsletters = TrashNewsletter::all();
        return view('newsletters.admin.restore', compact('trashNewsletters'));
    }

    // Admin edit newslatter interface
    public function edit(Newsletter $newsletter)
    {
        return view('newsletters.admin.edit', compact('newsletter'));
    }

    // Admin edit newslatter functionality
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
    
