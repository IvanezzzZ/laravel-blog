<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            if(isset($data['tag_ids']))
            {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);
            $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);

            $post = Post::firstOrCreate($data);

            if(isset($tagIds))
            {
                $post->tags()->attach($tagIds);
            }

            DB::commit();
        } catch (\Exception $exeption) {
            DB::rollBack();
            abort(500);
        }
    }
    public function update($data, $post)
    {
        try {
            DB::beginTransaction();

            if(isset($data['tags_ids']))
            {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if(isset($data['preview_img']))
            {
                $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);
            }
            if(isset($data['main_img']))
            {
                $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);
            }

            $post->update($data);

            if(isset($tagIds))
            {
                $post->tags()->sync($tagIds);
            }

            DB::commit();
        } catch (\Exception $exeption) {
            DB::rollBack();
            abort(500);
        }
    }
}