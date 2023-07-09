<?php

namespace tosdr\api\model;

use Carbon\Carbon;

class DocumentMinimal {
    
    public function __construct(
        private int $id,
        private string $name,
        private string $url,
        private Carbon $created_at,
        private ?Carbon $updated_at,
    ){}

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getUrl(): string {
        return $this->url;
    }

    public function getCreatedAt(): Carbon {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?Carbon {
        return $this->updated_at;
    }

}