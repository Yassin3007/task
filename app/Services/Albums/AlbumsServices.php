<?php

namespace App\Services\Albums;

use App\Models\Album;

class AlbumsServices
{

    function getAlbum($id)  {
        $album = Album::findOrFail($id);
        return $album;
    }
}
