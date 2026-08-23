<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Seed all career openings with full translations across EN, AR, and FR.
     */
    public function run(): void
    {
        $jobs = [
            [
                'slug' => 'sales-representative',
                'department' => 'Sales',
                'location' => 'Algiers',
                'type' => 'Full-time',
                'experience' => '2-4 years',
                'salary' => 'Competitive',
                'status' => 'Published',
                'translations' => [
                    'en' => [
                        'title' => 'Sales Representative',
                        'description' => 'Drive sales growth by building relationships with retailers and business partners across your assigned territory.',
                    ],
                    'ar' => [
                        'title' => 'ممثل مبيعات',
                        'description' => 'دفع عجلة نمو المبيعات من خلال بناء علاقات مع تجار التجزئة وشركاء الأعمال في المنطقة المحددة.',
                    ],
                    'fr' => [
                        'title' => 'Représentant Commercial',
                        'description' => 'Stimuler la croissance des ventes en établissant des relations avec les détaillants et les partenaires commerciaux.',
                    ],
                ]
            ],
            [
                'slug' => 'distribution-coordinator',
                'department' => 'Distribution',
                'location' => 'Oran',
                'type' => 'Full-time',
                'experience' => '3-5 years',
                'salary' => 'Competitive',
                'status' => 'Published',
                'translations' => [
                    'en' => [
                        'title' => 'Distribution Coordinator',
                        'description' => 'Coordinate product distribution operations ensuring timely delivery to partners across multiple provinces.',
                    ],
                    'ar' => [
                        'title' => 'منسق التوزيع',
                        'description' => 'تنسيق عمليات توزيع المنتجات لضمان التسليم في الوقت المناسب للشركاء عبر مختلف الولايات.',
                    ],
                    'fr' => [
                        'title' => 'Coordinateur de Distribution',
                        'description' => 'Coordonner les opérations de distribution des produits en garantissant une livraison rapide aux partenaires.',
                    ],
                ]
            ],
            [
                'slug' => 'warehouse-assistant',
                'department' => 'Warehouse',
                'location' => 'Algiers',
                'type' => 'Full-time',
                'experience' => '1-2 years',
                'salary' => 'Competitive',
                'status' => 'Published',
                'translations' => [
                    'en' => [
                        'title' => 'Warehouse Assistant',
                        'description' => 'Support warehouse operations including inventory management, order processing, and product organization.',
                    ],
                    'ar' => [
                        'title' => 'مساعد مستودع',
                        'description' => 'دعم عمليات المستودع بما في ذلك إدارة المخزون، ومعالجة الطلبات، وتنسيق المنتجات.',
                    ],
                    'fr' => [
                        'title' => 'Assistant d\'Entrepôt',
                        'description' => 'Soutenir les opérations d\'entrepôt, y compris la gestion des stocks et le traitement des commandes.',
                    ],
                ]
            ],
            [
                'slug' => 'customer-support-agent',
                'department' => 'Customer Support',
                'location' => 'Constantine',
                'type' => 'Full-time',
                'experience' => '1-3 years',
                'salary' => 'Competitive',
                'status' => 'Published',
                'translations' => [
                    'en' => [
                        'title' => 'Customer Support Agent',
                        'description' => 'Provide excellent support to retail partners, handling inquiries and resolving issues professionally.',
                    ],
                    'ar' => [
                        'title' => 'وكيل دعم العملاء',
                        'description' => 'تقديم دعم ممتاز لشركاء التجزئة، والتعامل مع الاستفسارات وحل المشكلات باحترافية.',
                    ],
                    'fr' => [
                        'title' => 'Agent de Support Client',
                        'description' => 'Fournir un excellent support aux partenaires de vente au détail, en gérant les demandes et en résolvant les problèmes.',
                    ],
                ]
            ],
            [
                'slug' => 'marketing-executive',
                'department' => 'Marketing',
                'location' => 'Algiers',
                'type' => 'Full-time',
                'experience' => '2-4 years',
                'salary' => 'Competitive',
                'status' => 'Published',
                'translations' => [
                    'en' => [
                        'title' => 'Marketing Executive',
                        'description' => 'Develop and execute marketing strategies to promote Ooredoo products and strengthen brand presence.',
                    ],
                    'ar' => [
                        'title' => 'مسؤول تسويق',
                        'description' => 'تطوير وتنفيذ استراتيجيات التسويق للترويج لمنتجات أوريدو وتعزيز حضور العلامة التجارية.',
                    ],
                    'fr' => [
                        'title' => 'Responsable Marketing',
                        'description' => 'Développer et exécuter des stratégies marketing pour promouvoir les produits Ooredoo.',
                    ],
                ]
            ],
            [
                'slug' => 'administrative-assistant',
                'department' => 'Administration',
                'location' => 'Blida',
                'type' => 'Full-time',
                'experience' => '1-2 years',
                'salary' => 'Competitive',
                'status' => 'Published',
                'translations' => [
                    'en' => [
                        'title' => 'Administrative Assistant',
                        'description' => 'Provide administrative support including document management, scheduling, and office coordination.',
                    ],
                    'ar' => [
                        'title' => 'مساعد إداري',
                        'description' => 'تقديم الدعم الإداري بما في ذلك إدارة المستندات وجدولة المواعيد وتنسيق المكتب.',
                    ],
                    'fr' => [
                        'title' => 'Assistant Administratif',
                        'description' => 'Fournir un soutien administratif, y compris la gestion des documents et la coordination du bureau.',
                    ],
                ]
            ]
        ];

        foreach ($jobs as $jobData) {
            Career::firstOrCreate(
                ['slug' => $jobData['slug']],
                $jobData
            );
        }
    }
}
