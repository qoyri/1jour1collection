<?php

namespace App\Service;

/**
 * Service for managing static content
 * This is a placeholder for future CMS functionality
 */
class StaticContentService
{
    private array $content = [];
    
    /**
     * Constructor with default content
     */
    public function __construct()
    {
        // Initialize with some default content
        $this->content = [
            'home' => [
                'hero_title' => 'Solutions digitales innovantes pour votre entreprise',
                'hero_description' => 'Nous créons des expériences numériques qui transforment votre vision en réalité.',
                'about_title' => 'À propos de nous',
                'about_description' => 'TezDev est une agence digitale spécialisée dans la création de solutions web et mobiles innovantes. Notre équipe d\'experts passionnés s\'engage à fournir des services de haute qualité qui répondent aux besoins spécifiques de chaque client.',
                'cta_title' => 'Prêt à transformer votre vision en réalité ?',
                'cta_description' => 'Contactez-nous dès aujourd\'hui pour discuter de votre projet',
            ],
            'about' => [
                'history_title' => 'Notre histoire',
                'history_description' => 'TezDev a été fondée en 2015 avec une vision claire : créer des solutions digitales innovantes qui aident les entreprises à se développer dans un monde de plus en plus connecté.',
                'mission_title' => 'Notre mission',
                'mission_description' => 'Notre mission est de fournir des solutions digitales de haute qualité qui aident nos clients à atteindre leurs objectifs commerciaux. Nous croyons que la technologie doit être accessible à tous et que chaque entreprise mérite une présence en ligne professionnelle et efficace.',
            ],
            'contact' => [
                'form_title' => 'Parlons de votre projet',
                'form_description' => 'Remplissez le formulaire ci-dessous et nous vous contacterons dans les plus brefs délais pour discuter de votre projet et de la façon dont nous pouvons vous aider.',
                'address' => '123 Rue de l\'Innovation, 75000 Paris',
                'phone' => '+33 1 23 45 67 89',
                'email' => 'contact@tezdev.com',
                'hours' => 'Lundi - Vendredi: 9h00 - 18h00',
            ],
        ];
    }
    
    /**
     * Get content by key
     */
    public function get(string $section, string $key, string $default = ''): string
    {
        if (isset($this->content[$section]) && isset($this->content[$section][$key])) {
            return $this->content[$section][$key];
        }
        
        return $default;
    }
    
    /**
     * Get all content for a section
     */
    public function getSection(string $section): array
    {
        return $this->content[$section] ?? [];
    }
    
    /**
     * Set content value
     */
    public function set(string $section, string $key, string $value): void
    {
        if (!isset($this->content[$section])) {
            $this->content[$section] = [];
        }
        
        $this->content[$section][$key] = $value;
    }
    
    /**
     * Get all content
     */
    public function getAll(): array
    {
        return $this->content;
    }
}
