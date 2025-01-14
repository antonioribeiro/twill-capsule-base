<?php

namespace App\Twill\Base;

use A17\Twill\Models\Model as TwillModel;
use A17\Twill\Models\Behaviors\HasMedias;
use App\Twill\Base\Scopes\MustBePublished;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

abstract class Model extends TwillModel
{
    use HasTranslation, HasMedias, HasRevisions, HasFactory;

    public string $titleColumnKey = 'title';

    public $translatedAttributes = [];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new MustBePublished());
    }
}
