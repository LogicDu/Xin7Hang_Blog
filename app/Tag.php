<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }


    public static function namesToIds($names)
    {
        $ids = array();
        for($i = 0; $i < count($names); $i++)
        {
            $tmp_tag = Tag::where('name',$names[$i])->get();
            if ($tmp_tag->isEmpty()){
                $ids[$i] = Tag::create(['name'=>$names[$i]])->id;
            } else {
                $ids[$i] = $tmp_tag[0]->id;
            }
        }
        return $ids;
    }
}
