<?php

namespace Detit\Polipublications\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
* @property string $title
* @property string $authors
* @property \Modules\PoliPublications\App\Models\PolipublicationsType $type
* @property string $source
* @property string $publisher
* @property string $volume
* @property string $pages
* @property string $year
* @property string $doi
* @property string $issn
* @property string $isbn
* @property string $is_published
 */
class Publication extends Model
{
    protected $table = 'polipublications_publications';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'authors',
        'type',
        'source',
        'publisher',
        'volume',
        'pages',
        'year',
        'doi',
        'issn',
        'isbn',
        'is_published',
        'order'
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];



    // public function type()
    // {
    //     return $this->belongsTo(PolipublicationsType::class);
    // }
}
