<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'excerpt', 'body'];

    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    // cek di table posts apakah ada foreign key category_id

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? true : false) {
        //     $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('post', 'like', '%' . $filters['search'] . '%');
        // }
        // $query->when($filters['search'] ?? false, function ($query, $search) {
        //     return $query->where('title', 'like', '%' . $search . '%')
        //         ->orWhere('post', 'like', '%' . $search . '%');
        // });
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                 $query->where('title', 'like', '%' . $search . '%')
                             ->orWhere('post', 'like', '%' . $search . '%');
             });
         });

        // $datas = [];
        // foreach ($query->get() as $data) {
        //     array_push($datas, $data->category->name);
        // }

        // dd($datas);

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
        // dd($query->get());
        // $datas = [];
        // foreach ($query->get() as $data) {
        //     array_push($datas, $data->category->name);
        // }

        // dd($datas);

        // $query->when($filters['author'] ?? false, fn($query, $category) => $query->whereHas('author', fn($query)) => 
        // $query->where('username', $author));

        
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)
            )
        );

        // dd($query->first()->author->username);

        
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
