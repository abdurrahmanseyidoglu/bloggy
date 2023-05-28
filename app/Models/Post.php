<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'title', 'thumbnail', 'body', 'active', 'published_at', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }


    /**
     * Format date to a readable form
     *
     * @return string|null
     */
    public function getFormattedDate()
    {
        $date = $this->published_at;
        if ($date) {
            $formattedDate = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F jS Y');
            return $formattedDate;
        }
        return null;
    }

    /**
     * set the correct thumbnail path based of weather the thumbnail are coming from dashboard or from a seeder
     *
     * @return string
     */
    public function getThumbnail(): string
    {
        $thumbnailPath = $this->thumbnail;
        if (str_starts_with($thumbnailPath, 'http')) {
            return $thumbnailPath;
        } else return 'storage/' . $thumbnailPath;
    }

}
