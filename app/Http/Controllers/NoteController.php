<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all notes, ordered by creation date descending
        $notes = Note::latest()->get();
        // Return the index view with the notes data
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the create view
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255', // Title is required, string, max 255 chars
            'content' => 'required|string', // Content is required, string
        ]);

        // Create a new note with the validated data
        Note::create($request->all());

        // Redirect to the notes index page with a success message
        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        // Return the show view with the specific note data
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        // Return the edit view with the specific note data
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255', // Title is required, string, max 255 chars
            'content' => 'required|string', // Content is required, string
        ]);

        // Update the note with the validated data
        $note->update($request->all());

        // Redirect to the notes index page with a success message
        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        // Delete the specified note
        $note->delete();

        // Redirect to the notes index page with a success message
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}
