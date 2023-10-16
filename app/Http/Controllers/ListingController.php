<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    //Show All Listings
    public function index()
    {

        return view('listings.index', [
            'listings' => Listing::latest()->filterTags(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //Show Single Listing

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //Show Create Form

    public function create()
    {
        return view('listings.create');
    }


    //Store Listing Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', 'unique:listings'],
            'location' => 'required',
            'website' => ['required', 'url'],
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'

        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully');
    }


    //Show Edit Form
    public function edit(Listing $listing)
    {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    //Update Form
    public function update(Request $request, Listing $listing)
    {

        //Make sure logged in user is owner

        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorised action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => ['required', 'url'],
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing created successfully');
    }

    //Delete Listing
    public function destroy(Listing $listing)
    {
        //Make sure logged in user is owner

        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorised action');
        }

        $listing->delete();

        return redirect('/')->with('message', "Listing deleted successfully!");
    }

    //Manage Listings
    public function manage()
    {
        return view('listings.manage', [
            'listings' => auth()->user()->listings()->get()
        ]);
    }

}

//Commmon Resource Routes:
//index - Show all listings
//show - Show single listing
//create - Show form to create new listing
//store - Store new listing
//edit - Show form to edit listing
//update - Update listing
//destroy - Delete listing
