<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    private static $cloudinary_link = 'https://res.cloudinary.com/vernom/image/upload/c_scale,h_400,w_400/';
    protected $guarded = ['id'];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'product_group', 'product_id', 'group_id');
    }

    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getFormatPriceAttribute(): string
    {
        return format_money($this->price);
    }

    public function getThumbnailArrayAttribute(): array
    {
        if ($this->thumbnail == null || strlen($this->thumbnail) == 0)
        {
            return array('https://res.cloudinary.com/vernom/image/upload/v1596461891/perfume_project/noimages_aaqvrt.png');
        }
        $list_photos = array();
        $single_thumb = explode(',', $this->thumbnail);
        foreach ($single_thumb as $single)
        {
            if (strlen($single) > 0)
            {
                array_push($list_photos, self::$cloudinary_link . $single);
            }
        }
        return $list_photos;
    }

    public function getfirstThumbnailAttribute()
    {
        $thumbnail[] = explode(',', $this->thumbnail);
        foreach ($thumbnail as $thumbnailValue)
        {
            return self::$cloudinary_link . $thumbnailValue[0];
        }
    }

    public function getfirstThumbnail150Attribute()
    {
        $thumbnail[] = explode(',', $this->thumbnail);
        foreach ($thumbnail as $thumbnailValue)
        {
            return 'https://res.cloudinary.com/vernom/image/upload/c_scale,h_150,w_150/' . $thumbnailValue[0];
        }
    }

    public function getPhotoIdsAttribute()
    {
        if ($this->thumbnail == null || strlen($this->thumbnail) == 0)
        {
            return array();
        }
        $list_ids = array();
        $photos = explode(',', $this->thumbnail);
        foreach ($photos as $p)
        {
            if (strlen($p) > 0)
            {
                array_push($list_ids, $p);
            }
        }
        return $list_ids;
    }

    public function getImageSize600x600Attribute()
    {
        return 'https://res.cloudinary.com/dwarrion/image/upload/c_scale,h_600,w_600/' . $this->brand_thumbnail;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function getCalculatedRateAttribute()
    {
        return $this->comments->pluck('rate')->avg();
    }
}
