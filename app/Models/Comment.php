<?php

namespace App\Models;

use App\Models\Parent\BaseModel;
use App\Models\Traits\HaveComments;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    protected $table = 'comments';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = null;

    public static function deleteByModel(Model $model)
    {
        self::where('model_id', $model->id)->where('model_type', get_class($model))->delete();
    }

    public function model()
    {
        return $this->morphTo();
    }
}
