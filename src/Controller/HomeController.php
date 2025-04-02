<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home.html.twig', [
            'hero' => [
                'title' => 'ENVIE D\'UNE EXPO ?',
                'subtitle' => 'Un jour, une collection',
                'description' => 'Découvrez nos expositions d\'œuvres d\'art pour votre entreprise. Accueillez l\'art dans vos locaux et valorisez vos espaces de travail.',
                'cta' => 'Demander un devis'
            ],
            'benefits' => [
                'title' => 'Enrichissez votre contenu de communication avec l\'art',
                'items' => [
                    [
                        'icon' => 'fa-users',
                        'title' => 'Pour vos collaborateurs',
                        'description' => 'Offrez à vos salariés des sources d\'inspirations au quotidien pour stimuler leur créativité et éveiller leur curiosité'
                    ],
                    [
                        'icon' => 'fa-handshake',
                        'title' => 'Pour vos clients',
                        'description' => 'Communiquez auprès de vos clients au sujet des nouvelles expositions que vous recevez vous gardez du contact'
                    ],
                    [
                        'icon' => 'fa-people-group',
                        'title' => 'Pour votre cohésion',
                        'description' => 'Fédérez autour de la thématique artistique en favorisant les échanges grâce à notre service de location d\'art'
                    ]
                ]
            ],
            'about' => [
                'title' => 'LDE - 17/03/2025',
                'subtitle' => 'Un jour, une collection',
                'description' => 'Un événement artistique unique autour d\'une exposition éphémère d\'œuvres originales, sérigraphies et photos.',
                'image' => 'art-exhibition.jpg',
                'features' => [
                    'Créer un moment d\'échange & de découverte',
                    'Offrir une expérience artistique immersive',
                    'Accueillir des entreprises dans un cadre inspirant',
                    'Mettre en avant l\'univers d\'un collectionneur',
                    'Une exposition d\'œuvres originales, sérigraphies, photos',
                    'Spectre artistique : Pop Art, Street Art, Art Moderne'
                ]
            ],
            'services' => [
                'title' => 'QUE PROPOSONS-NOUS ?',
                'subtitle' => 'Une solution parfaite pour votre entreprise',
                'description' => 'Un événement artistique unique autour d\'une exposition éphémère',
                'items' => [
                    [
                        'icon' => 'fa-palette',
                        'title' => 'Exposition Éphémère',
                        'description' => 'Une exposition temporaire adaptée à votre espace et à votre image de marque.'
                    ],
                    [
                        'icon' => 'fa-comments',
                        'title' => 'Échanges Artistiques',
                        'description' => 'Rencontres et discussions avec des collectionneurs et des artistes.'
                    ],
                    [
                        'icon' => 'fa-lightbulb',
                        'title' => 'Ateliers Créatifs',
                        'description' => 'Ateliers participatifs pour stimuler la créativité de vos équipes.'
                    ],
                    [
                        'icon' => 'fa-handshake',
                        'title' => 'Événements Clients',
                        'description' => 'Impressionnez vos clients avec un cadre artistique unique pour vos rencontres.'
                    ],
                    [
                        'icon' => 'fa-heart',
                        'title' => 'Engagement RSE',
                        'description' => 'Contribuez à rendre l\'art accessible dans des lieux où il est peu présent.'
                    ],
                    [
                        'icon' => 'fa-calendar-check',
                        'title' => 'Installation Simple',
                        'description' => 'Une mise en place rapide et sans contrainte, quelques heures suffisent.'
                    ]
                ]
            ],
            'engagement' => [
                'title' => 'S\'engager ?',
                'description' => 'Offrir une capsule artistique dans le cadre de votre démarche RSE',
                'image' => 'art-engagement.jpg',
                'items' => [
                    'Téléportez l\'art et la création artistique dans les écoles, hôpitaux et maisons de retraite',
                    'Offrez une capsule artistique dans un lieu où l\'art est peu présent',
                    'Bénéficiez d\'un tarif préférentiel pour cet engagement sociétal'
                ],
                'formats' => [
                    'Exposition temporaire dans un établissement sélectionné',
                    'Ateliers pédagogiques et moments d\'échange adaptés aux bénéficiaires',
                    'Conférence et moment de partage avec un collectionneur et des artistes'
                ]
            ],
            'programme' => [
                'title' => 'Au Programme',
                'items' => [
                    'Accueil des invités',
                    'Introduction à l\'univers des collectionneurs',
                    'Présentation du parcours du jour',
                    'Découverte et exploration libre',
                    'Pause conviviale & gourmande',
                    'Cabinet de curiosité, Photo Booth et Photo call artistique, atelier «Tags»',
                    'Conclusion & clôture'
                ]
            ],
            'cta' => [
                'title' => 'Prêt à transformer vos espaces ?',
                'description' => 'Contactez-nous dès maintenant pour organiser votre exposition éphémère',
                'button' => 'Demander un devis'
            ]
        ]);
    }
}

