<?php

namespace App\Traits;

trait ModelTranalation
{
    public function translations()
    {
        return $this->hasMany(self::class.'Translation');
    }
    public function getTranslationAttribute()
    {
        $translation = $this->translations->where('locale', app()->getLocale())->first();

        if ($this->translations->count() && $translation) {
            return $translation;
        }
        return $this->translations->first();
    }
}
