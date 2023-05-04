<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * Pole vlastností, které nejsou chráněné před mass assignment útokem.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'url', 'description', 'content',
    ];

    /**
     * Vrať název atributu, podle kterého se získává článek z parametru routy.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'url';
    }
}
