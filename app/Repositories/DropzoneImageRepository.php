<?php

namespace App\Repositories;

use App\Repositories\Contracts\CachedImageRepository;
use Illuminate\Http\Request;
use Storage;

class DropzoneImageRepository implements CachedImageRepository
{
    public function __construct()
    {
        $this->path = 'images';
        $this->uploadKey  = 'image';
        $this->removeKey  = 'id';
    }

    public function get()
    {
        return session('imagecache.path');
    }

    public function save(Request $request)
    {
        $name = $request->{ $this->uploadKey }->getClientOriginalName();
        $path = $request->{ $this->uploadKey }->storeAs($this->path, str_random(6) . '_' . $name);
        session(['imagecache' => [
            'token' => session('_token'),
            'name' => $name,
            'path' => $path,
        ]]);
        return $path;
    }

    public function remove(Request $request)
    {
        if (session('imagecache.token') === session('_token') && session('imagecache.name') === $request->get($this->removeKey)) {
            $this->clear();
            return $request->get($this->removeKey);
        }
    }

    public function clear()
    {
        Storage::delete(session('imagecache.path'));
        session(['imagecache' => []]);
    }
}
