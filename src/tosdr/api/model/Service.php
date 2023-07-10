<?php

namespace tosdr\api\model;

use Carbon\Carbon;



class Service {
    
    public function __construct(
        private int $id,
        private bool $is_comprehensively_reviewed,
        private string $name,
        private array $urls,
        private Carbon $created_at,
        private ?Carbon $updated_at,
        private ?string $slug,
        private ?string $rating,
        private string $image,
        private array $documents,
        private array $points,
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

    public function getImage(): string {
        return $this->image;
    }

    public function getDocuments(): array {
        return $this->documents;
    }

    public function getPoints(): array {
        return $this->points;
    }

    public function getShieldUrl(string $locale = "en", string $extension = "svg"): string {
        return \tosdr\LinkFactory::shields($this->id, $locale, $extension);
    }

    public function getPhoenixUrl(): string {
        return \tosdr\LinkFactory::phoenix($this->id, PhoenixTypes::SERVICES);
    }

    public function getCrispUrl(string $locale = "en"): string {
        return \tosdr\LinkFactory::crisp($this->id, $locale);
    }

}