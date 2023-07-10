<?php

namespace tosdr;

use tosdr\api\model\PhoenixTypes;

class LinkFactory {

    public static function shields(int $id, string $locale = "en", string $extension = 'svg'): string {

        if(!in_array($extension, ['svg', 'png'])){
            throw new \InvalidArgumentException("Invalid extension");
        }

        return sprintf("%s/%s_%s.%s", Client::SHIELDS_BASE_URL, $locale, $id, $extension);
    }


    public static function phoenix(int $id, PhoenixTypes $type): string {
        return sprintf("%s/%s/%s", Client::PHOENIX_BASE_URL, $type->value, $id);
    }

    public static function crisp(int $id, string $locale = "en"): string {
        return sprintf("%s/%s/service/%s", Client::CRISP_BASE_URL, $locale, $id);
    }

}