<?php

namespace App\Http\Controllers;

use App\Models\Donator;
use App\Models\Offre;
use App\Models\ReviewRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $offres = Offre::paginate(1);
        return view('offres.index', compact('offres')); // Assuming you have a view 'offres/index.blade.php'
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new offer
        $donators=Donator::all();
        return view('offres.create',compact('donators')); // Assuming you have a view 'offres/create.blade.php'
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'donator_id' => 'required|exists:donators,id',
           
            'available_from' => 'required|date',
            'available_until' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imagePath = $this->uploadImage($request);
    if ($imagePath) {
        $validatedData['image'] = $imagePath; 
    }
        // Create and store the new offer
        Offre::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('offres.index')->with('success', 'Offer created successfully!');
    }

 
    public function show(string $id)
    {
        // Retrieve the offer by its ID and display it
        $offer = Offre::findOrFail($id); // Find the offer or fail with 404
        return view('offres.show', compact('offer')); // Assuming you have a view 'offres/show.blade.php'
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Retrieve the offer by its ID and pass it to the edit view
        $offre = Offre::findOrFail($id);
        $donators=Donator::all();
        return view('offres.edit', compact(['offre','donators'])); // Assuming you have a view 'offres/edit.blade.php'
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            
            'available_from' => 'required|date',
            'available_until' => 'nullable|date',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

       
        $offre = Offre::findOrFail($id);
        if ($request->hasFile('image')) {
            
            if ($offre->image) {
                Storage::delete('public/' . $offre->image);
            }
    
            
            $validatedData['image'] = $this->uploadImage($request);
        }
        $offre->update($validatedData);

        
        return redirect()->route('offres.index', $id)->with('success', 'Offer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $offre = Offre::findOrFail($id);
        $offre->delete();

        
        return redirect()->route('offres.index')->with('success', 'Offer deleted successfully!');
    }
    private function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
           return $request->file('image')->store('offres', 'public');
        }
        return null;
    }
    public function reviewstore(Request $request){
        $review = new ReviewRating();
        $review->offre_id = $request->offre_id;
        $review->comments= $request->comment;
        $review->star_rating = $request->rating;
        $review->user_id = Auth::user()->id;
        
        $review->save();
        return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
    }

}
