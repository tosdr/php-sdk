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

    /**
     * Get the service ID
     * @return int
     * 
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Get the service's comprehensively reviewed status
     *
     * @return boolean
     */
    public function isComprehensivelyReviewed(): bool {
        return $this->is_comprehensively_reviewed;
    }

    /**
     * Get the service's name
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Get the service's URLs
     *
     * @return array
     */
    public function getUrls(): array {
        return $this->urls;
    }

    /**
     * Get the service's creation date
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon {
        return $this->created_at;
    }
    
    /**
     * Get the service's update date
     *
     * @return Carbon|null
     */
    public function getUpdatedAt(): ?Carbon {
        return $this->updated_at;
    }

    /**
     * Get the service's slug
     *
     * @return string|null
     */
    public function getSlug(): ?string {
        return $this->slug;
    }

    /**
     * Get the service's grade
     *
     * @return string|null
     */
    public function getRating(): ?string {
        return $this->rating;
    }

    /**
     * Get the service's image
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * Get the service's documents
     *
     * @return DocumentMinimal[]
     */
    public function getDocuments(): array {
        return $this->documents;
    }


    /**
     * Get the service's points
     *
     * @return Point[]
     */
    public function getPoints(): array {
        return $this->points;
    }

    /**
     * Get the service's shield URL
     *
     * @param string $locale
     * @param string $extension svg or png
     * @return string
     */
    public function getShieldUrl(string $locale = "en", string $extension = "svg"): string {
        return \tosdr\LinkFactory::shields($this->id, $locale, $extension);
    }

    /**
     * Get the service's phoenix URL
     *
     * @return string
     */
    public function getPhoenixUrl(): string {
        return \tosdr\LinkFactory::phoenix($this->id, PhoenixTypes::SERVICES);
    }

    /**
     * Get the service's crisp URL
     *
     * @param string $locale
     * @return string
     */
    public function getCrispUrl(string $locale = "en"): string {
        return \tosdr\LinkFactory::crisp($this->id, $locale);
    }

}