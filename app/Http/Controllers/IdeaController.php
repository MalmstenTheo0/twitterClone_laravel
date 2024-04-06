<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class IdeaController extends Controller
{
    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|min:5|max:240'
        ]);
        $validated['user_id'] = auth()->id();
        Idea::create($validated);
        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function destroy(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea
        ]);
    }

    public function edit(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }
        $editing = true;
        return view('ideas.show', [
            'idea' => $idea,
            'editing' => $editing
        ]);
    }

    public function update(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }
        $validated = request()->validate([
            'content' => 'required|min:5|max:240'
        ]);
        $idea->update($validated);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfully!');
    }
}
