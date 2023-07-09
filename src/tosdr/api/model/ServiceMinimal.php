<?php

namespace tosdr\api\model;

use Carbon\Carbon;

class ServiceMinimal {
    
    public function __construct(
        private int $id,
        private bool $is_comprehensively_reviewed,
        private string $name,
        private array $urls,
        private Carbon $created_at,
        private ?Carbon $updated_at,
        private ?string $slug,
        private ?string $rating
    ){}

    public function getId(): int {
        return $this->id;
    }

    public function isComprehensivelyReviewed(): bool {
        return $this->is_comprehensively_reviewed;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getUrls(): array {
        return $this->urls;
    }

    public function getCreatedAt(): Carbon {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?Carbon {
        return $this->updated_at;
    }

    public function getSlug(): ?string {
        return $this->slug;
    }

    public function getRating(): ?string {
        return $this->rating;
    }
}