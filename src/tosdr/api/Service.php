<?php

namespace tosdr\api;

use Carbon\Carbon;

use tosdr;

class Service {

    public const INTERFACE = "service";
    public const VERSION = "v2";



    public static function get(int $serviceID){

        $Result = tosdr\Client::GET(sprintf("%s/%s/%s", tosdr\Client::BASE_URL, self::INTERFACE, self::VERSION), [
            'id' => $serviceID
        ], $httpCode);

        if($httpCode === 404 || ($Result["error"] & 0x10000)){
            throw new exceptions\NotFoundException(sprintf("Service with ID %d not found", $serviceID));
        }

        return new tosdr\api\model\Service(
            $Result["parameters"]["id"],
            $Result["parameters"]["is_comprehensively_reviewed"],
            $Result["parameters"]["name"],
            $Result["parameters"]["urls"],
            Carbon::parse($Result["parameters"]["created_at"]),
            isset($Result["parameters"]["updated_at"]) ? Carbon::parse($Result["parameters"]["updated_at"]) : null,
            isset($Result["parameters"]["slug"]) ? $Result["parameters"]["slug"] : null,
            isset($Result["parameters"]["rating"]) ? $Result["parameters"]["rating"] : null,
            $Result["parameters"]["image"],
            $Result["parameters"]["documents"],
            $Result["parameters"]["points"]
        );
    }

}