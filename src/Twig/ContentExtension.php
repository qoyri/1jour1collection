<?php

namespace App\Twig;

use App\Service\StaticContentService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Twig extension for accessing content in templates
 */
class ContentExtension extends AbstractExtension
{
    private StaticContentService $contentService;
    
    public function __construct(StaticContentService $contentService)
    {
        $this->contentService = $contentService;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('content', [$this, 'getContent']),
        ];
    }
    
    /**
     * Get content by section and key
     */
    public function getContent(string $section, string $key, string $default = ''): string
    {
        return $this->contentService->get($section, $key, $default);
    }
}
