<?php

namespace App\Helpers;

use App\Models\Website;
use Artesaos\SEOTools\Facades\SEOMeta;

class Seo
{

    public static function seO()
    {
        $data = Website::all()->first();
        return SEOMeta::setTitle($data->web_name)
            ->setDescription($data->web_description)
            ->setKeywords($data->web_name)
            ->addKeyword($data->web_description)
            ->addMeta('$meta', '$value');
    }
}
