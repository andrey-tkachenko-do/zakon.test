<?php

namespace App\Repositories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Collection;

class EloquentRepository implements DocumentRepository
{
    public function search(int $size, int $page, string $query = '')
    {
        return Document::query()
            ->where('body', 'like', "%{$query}%")
            ->orWhere('title', 'like', "%{$query}%")
            ->get();
    }
}
