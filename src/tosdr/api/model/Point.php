<?php

namespace tosdr\api\model;

use Carbon\Carbon;

class Point {
    
    public function __construct(
        private int $id,
        private string $title,
        private string $source,
        private string $status,
        private ?string $analysis,
        private Carbon $created_at,
        private ?Carbon $updated_at,
        private CaseMinimal $case,
        private ?int $document_id
    ){}

    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getSource(): string {
        return $this->source;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function getAnalysis(): ?string {
        return $this->analysis;
    }

    public function getCreatedAt(): Carbon {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?Carbon {
        return $this->updated_at;
    }

    public function getCase(): CaseMinimal {
        return $this->case;
    }

    public function getDocumentId(): ?int {
        return $this->document_id;
    }

}