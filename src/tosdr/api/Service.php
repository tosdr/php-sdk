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

        $documents = [];

        foreach($Result["parameters"]["documents"] as $document){
            $documents[] = new model\DocumentMinimal(
                $document["id"],
                $document["name"],
                $document["url"],
                Carbon::parse($document["created_at"]),
                empty($document["updated_at"]) ? Carbon::parse($document["updated_at"]) : null
            );
        }

        $points = [];

        foreach($Result["parameters"]["points"] as $point){
            $points[] = new model\Point(
                $point["id"],
                $point["title"],
                $point["source"],
                $point["status"],
                isset($point["analysis"]) ? $point["analysis"] : null,
                Carbon::parse($point["created_at"]),
                isset($point["updated_at"]) ? Carbon::parse($point["updated_at"]) : null,
                new model\CaseMinimal(
                    $point["case"]["id"],
                    $point["case"]["classification"],
                    $point["case"]["weight"],
                    $point["case"]["title"],
                    empty($point["case"]["description"]) ? $point["case"]["description"] : null,
                    $point["case"]["topic_id"]
                ),
                isset($point["document_id"]) ? $point["document_id"] : null
            );
        }

        return new tosdr\api\model\Service(
            $Result["parameters"]["id"],
            $Result["parameters"]["is_comprehensively_reviewed"],
            $Result["parameters"]["name"],
            $Result["parameters"]["urls"],
            Carbon::parse($Result["parameters"]["created_at"]),
            empty($Result["parameters"]["updated_at"]) ? Carbon::parse($Result["parameters"]["updated_at"]) : null,
            empty($Result["parameters"]["slug"]) ? $Result["parameters"]["slug"] : null,
            empty($Result["parameters"]["rating"]) ? $Result["parameters"]["rating"] : null,
            $Result["parameters"]["image"],
            $documents,
            $points
        );
    }

}