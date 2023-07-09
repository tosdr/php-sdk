<?php

namespace tosdr\api\model;

use Carbon\Carbon;

class CaseMinimal {
    
    public function __construct(
        private int $id,
        private string $classification,
        private int $weight,
        private string $title,
        private ?string $description,
        private int $topic_id,
    ){}

    public function getId(): int {
        return $this->id;
    }

    public function getClassification(): string {
        return $this->classification;
    }

    public function getWeight(): int {
        return $this->weight;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function getTopicId(): int {
        return $this->topic_id;
    }

}