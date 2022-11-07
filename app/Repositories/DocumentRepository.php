<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface DocumentRepository
{
    public function search(int $size, int $page, string $query = '');
}
