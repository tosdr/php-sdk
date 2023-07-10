<?php

namespace tosdr\api;

use Carbon\Carbon;



class ServiceList {
    
    public function __construct(
        private array $services,
        private array $pagination,
    ){}


    public function getPagination(): array {
        return $this->pagination;
    }

    /**
     * Get the current page
     *
     * @return integer
     */
    public function getPage(): int {
        return $this->pagination['current'];
    }

    /**
     * List of services
     *
     * @return ServiceMinimal[]
     */
    public function getServices(): array {
        return $this->services;
    }

    /**
     * Get the total amount of services
     *
     * @return string
     */
    public function getTotal(): int {
        return $this->pagination['total'];
    }

    /**
     * Get the total amount of pages
     *
     * @return string
     */
    public function getTotalPages(): int {
        return $this->pagination['end'];
    }

    /**
     * Go to the previous page
     *
     * @return ServiceList
     */
    public function previousPage(): ServiceList {
        if($this->pagination['current'] - 1 <= 1){
            throw new \OutOfBoundsException("Cannot go below page 1");
        }

        $class = Service::list($this->pagination['current'] - 1);
        
        $this->services = $class->getServices();
        $this->pagination = $class->getPagination();

        return $class;
    }

    /**
     * Go to the next page
     *
     * @return ServiceList
     */
    public function nextPage(): ServiceList {
        if($this->pagination['current'] + 1 > $this->getTotalPages()){
            throw new \OutOfBoundsException("Cannot go above page {$this->getTotalPages()}");
        }

        $class = Service::list($this->pagination['current'] + 1);
        
        $this->services = $class->getServices();
        $this->pagination = $class->getPagination();

        return $class;
    }

    /**
     * Go to a specific page
     *
     * @param integer $page
     * @return ServiceList
     */
    public function goToPage(int $page): ServiceList {
        if($page < 1 || $page > $this->getTotalPages()){
            throw new \OutOfBoundsException("Cannot go to page {$page}");
        }
        return Service::list($page);
        
        $class = Service::list($page);
        
        $this->services = $class->getServices();
        $this->pagination = $class->getPagination();

        return $class;
    }

}