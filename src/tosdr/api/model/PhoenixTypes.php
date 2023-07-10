<?php

namespace tosdr\api\model;

enum PhoenixTypes: string {
    
    case CASES = 'cases';
    case TOPICS = 'topics';
    case POINTS = 'points';
    case DOCUMENTS = 'documents';
    case SERVICES = 'services';
}