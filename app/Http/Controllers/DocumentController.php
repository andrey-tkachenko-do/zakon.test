<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DocumentRepository;
use App\Models\Document;
use Inertia\Inertia;

class DocumentController
{
    public function show(Request $request, Document $document)
    {
        return Inertia::render('Document/Index',  compact('document'));
    }

    public function create()
    {
        return Inertia::render('Document/Create');
    }

    public function store(Request $request)
    {
        $title = $request->title;
        $body = $request->body;

        $doc = Document::create(['title' => $title, 'body' => $body]);

        return redirect(route('document.show', ['document' => $doc->id]));
    }
}
