<?php

namespace Database\Seeders;

use App\Models\Solution;
use Illuminate\Database\Seeder;

class SolutionSeeder extends Seeder
{
    /**
     * Seed all 6 solution layers with complete 4 features, 6 benefits, 5 FAQs and badges across EN, AR, and FR.
     */
    public function run(): void
    {
        $solutions = [
            [
                'slug' => 'mobile-recharge-credit',
                'status' => 'Published',
                'image' => '/assets/mobile-recharge-credit.png',
                'translations' => [
                    'en' => [
                        'name' => 'Official Ooredoo Mobile Recharge Credit Distribution',
                        'shortName' => 'Mobile Recharge Credit',
                        'badge' => 'Mobile Recharge Credit',
                        'title' => 'Official Ooredoo Mobile Recharge Credit Distribution',
                        'description' => [
                            'Our commitment is to deliver authentic Ooredoo recharge credit through a trusted distribution network that helps businesses meet customer demand quickly and efficiently. With flexible purchasing options and dedicated support, STI is the preferred partner for businesses looking for dependable telecom product distribution.',
                            'Whether you operate a local retail shop or manage a wholesale business, STI provides the products, service, and support you need to grow your business with confidence.',
                        ],
                        'highlights' => [
                            'Official Ooredoo Recharge Credit',
                            'Multiple Denominations Available',
                            'Reliable Product Availability',
                            'Professional Partner Support',
                        ],
                        'features' => [
                            ['icon' => 'Wallet', 'title' => 'Multiple Denominations', 'description' => 'Official Ooredoo recharge credit available in multiple values to meet the needs of every customer.'],
                            ['icon' => 'Zap', 'title' => 'Instant Availability', 'description' => 'Fast access to recharge credit with reliable stock availability for retailers and business partners.'],
                            ['icon' => 'ShieldCheck', 'title' => '100% Genuine Products', 'description' => 'Authentic Ooredoo recharge products supplied through the official distribution channel.'],
                            ['icon' => 'TrendingUp', 'title' => 'Flexible Business Solutions', 'description' => 'Designed for retailers, wholesalers, and distributors requiring dependable telecom products.'],
                        ],
                        'benefits' => [
                            ['title' => 'Increase Sales', 'description' => "Expand your product offering with one of Algeria's most trusted mobile recharge brands."],
                            ['title' => 'Reliable Product Supply', 'description' => 'Maintain continuous stock availability and reduce product shortages.'],
                            ['title' => 'Competitive Wholesale Pricing', 'description' => 'Benefit from attractive pricing designed to improve your business profitability.'],
                            ['title' => 'Faster Customer Service', 'description' => 'Provide customers with immediate access to official Ooredoo recharge credit.'],
                            ['title' => 'Trusted Official Distributor', 'description' => 'Partner with an authorized Ooredoo distributor committed to quality and reliability.'],
                            ['title' => 'Dedicated Business Support', 'description' => 'Receive ongoing assistance from our experienced sales and customer support teams.'],
                        ],
                        'faqs' => [
                            ['question' => 'Are the recharge credits official Ooredoo products?', 'answer' => 'Yes. All recharge credit distributed by STI is 100% official and supplied through the authorized Ooredoo distribution network.'],
                            ['question' => 'What recharge denominations are available?', 'answer' => 'We offer Ooredoo recharge credit in multiple denominations to meet the needs of retailers, businesses, and end customers.'],
                            ['question' => 'Can businesses purchase recharge credit in bulk?', 'answer' => 'Yes. STI provides flexible wholesale purchasing options with competitive pricing for qualified retailers and business partners.'],
                            ['question' => 'How can I place an order?', 'answer' => 'You can place an order by contacting our sales team or your assigned business representative, who will assist you throughout the ordering process.'],
                            ['question' => 'Who can become an STI partner?', 'answer' => 'Retailers, wholesalers, distributors, and businesses operating in Algeria can apply to become an authorized STI business partner and benefit from official Ooredoo product distribution.'],
                        ],
                    ],
                    'ar' => [
                        'name' => 'توزيع رصيد الشحن الهاتفي أوريدو الرسمي',
                        'shortName' => 'رصيد الشحن الهاتفي',
                        'badge' => 'رصيد الشحن الهاتفي',
                        'title' => 'توزيع رصيد الشحن الهاتفي أوريدو الرسمي',
                        'description' => [
                            'تلتزم STI بتوفير رصيد الشحن الهاتفي المعتمد من أوريدو عبر شبكة توزيع موثوقة تساعد التجار والشركات على تلبية طلبات العملاء بسرعة وفعالية.',
                            'سواء كنت تدير محل تجزئة محلي أو نشاطاً بالجملة، توفر لك STI جميع المنتجات والخدمات والدعم اللازم لتنمية أعمالك بثقة.',
                        ],
                        'highlights' => [
                            'رصيد شحن أوريدو رسمي ومضمون',
                            'فئات متعددة متوفرة لكل الاحتياجات',
                            'توفير دائم ومستمر للمخزون',
                            'دعم فني وميداني مخصص للشركاء',
                        ],
                        'features' => [
                            ['icon' => 'Wallet', 'title' => 'فئات شحن متعددة', 'description' => 'رصيد شحن أوريدو متوفر بمستويات وقيم مختلفة لتلبية احتياجات كافة الزبائن.'],
                            ['icon' => 'Zap', 'title' => 'وفرة فورية ودائمة', 'description' => 'وصول سريع لرصيد الشحن مع ضمان استمرار المخزون للتجار والموزعين.'],
                            ['icon' => 'ShieldCheck', 'title' => 'منتجات رسمية 100%', 'description' => 'رصيد شحن أصلي ومضمون مباشرة عبر القناة الرسمية لأوريدو.'],
                            ['icon' => 'TrendingUp', 'title' => 'حلول أعمال مرنة', 'description' => 'مصممة خصيصاً لتجار التجزئة والجملة والموزعين المعتمدين.'],
                        ],
                        'benefits' => [
                            ['title' => 'زيادة المبيعات والأرباح', 'description' => 'توسيع مجموعة المنتجات مع العلامة الأكثر ثقة في مجال الاتصالات بالجزائر.'],
                            ['title' => 'تزويد مستمر ومضمون', 'description' => 'ضمان توفر المنتجات وتفادي انقطاع التزويد على مدار السنة.'],
                            ['title' => 'أسعار جملة تنافسية', 'description' => 'الاستفادة من أسعار متميزة لتحسين هامش الربح لمحلكم.'],
                        ],
                        'faqs' => [
                            ['question' => 'هل رصيد الشحن رسمي ومضمون من أوريدو؟', 'answer' => 'نعم، جميع خدمات الشحن الموزعة عبر STI رسمية 100% ومضمونة عبر شبكة أوريدو الرسمية.'],
                            ['question' => 'كيف يمكنني تقديم طلب شراء بالجملة؟', 'answer' => 'يمكنك التواصل مباشرة مع فريق المبيعات لتقديم طلبك والاستفادة من أفضل الأسعار.'],
                        ],
                    ],
                    'fr' => [
                        'name' => 'Distribution Officielle de Crédit de Recharge Mobile Ooredoo',
                        'shortName' => 'Crédit de Recharge Mobile',
                        'badge' => 'Crédit de Recharge Mobile',
                        'title' => 'Distribution Officielle de Crédit de Recharge Mobile Ooredoo',
                        'description' => [
                            'STI fournit du crédit de recharge officiel Ooredoo à travers un réseau de distribution fiable permettant aux détaillants et grossistes de répondre rapidement à la demande.',
                            'Que vous soyez un commerce de détail ou un grossiste, STI vous offre les produits et le support nécessaires pour développer votre activité en toute confiance.',
                        ],
                        'highlights' => [
                            'Crédit Ooredoo 100% Officiel',
                            'Multiples Dénominations Disponibles',
                            'Disponibilité Continue du Stock',
                            'Support Dédié Partenaires',
                        ],
                        'features' => [
                            ['icon' => 'Wallet', 'title' => 'Multiples Dénominations', 'description' => 'Crédit de recharge disponible en plusieurs valeurs pour répondre à tous les besoins.'],
                            ['icon' => 'Zap', 'title' => 'Disponibilité Immédiate', 'description' => 'Accès rapide au stock pour les détaillants et partenaires commerciaux.'],
                            ['icon' => 'ShieldCheck', 'title' => 'Produits 100% Authentiques', 'description' => 'Produits de recharge officiels Ooredoo.'],
                            ['icon' => 'TrendingUp', 'title' => 'Solutions Flexibles', 'description' => 'Conçues pour détaillants et grossistes.'],
                        ],
                        'benefits' => [
                            ['title' => 'Augmentez vos Ventes', 'description' => "Proposez l'une des marques télécom les plus populaires en Algérie."],
                            ['title' => 'Prix Grossistes Compétitifs', 'description' => 'Conditions tarifaires avantageuses conçues pour maximiser vos marges.'],
                        ],
                        'faqs' => [
                            ['question' => 'Les crédits sont-ils officiels Ooredoo?', 'answer' => 'Oui, 100% du crédit distribué par STI est officiel et certifié par Ooredoo.'],
                        ],
                    ],
                ],
            ],
            [
                'slug' => 'prepaid-sim-cards',
                'status' => 'Published',
                'image' => '/assets/prepaid-sim-cards.png',
                'translations' => [
                    'en' => [
                        'name' => 'Official Ooredoo Prepaid SIM Card Distribution',
                        'shortName' => 'Prepaid SIM Cards',
                        'badge' => 'SIM Card Distribution',
                        'title' => 'Official Ooredoo Prepaid SIM Card Distribution',
                        'description' => [
                            'Our distribution services are designed to help retailers and authorized resellers meet customer demand with authentic Ooredoo SIM cards ready for activation. With competitive business solutions and dependable supply, STI is the trusted partner for businesses seeking official telecom products.',
                            "Whether you're a neighborhood retailer, wholesale distributor, or business partner, STI delivers the products and support you need to grow your business with confidence.",
                        ],
                        'highlights' => [
                            'Official Ooredoo Prepaid SIM Cards',
                            'Ready for Customer Activation',
                            'Reliable Product Availability',
                            'Dedicated Business Support',
                        ],
                        'features' => [
                            ['icon' => 'Smartphone', 'title' => 'Official Ooredoo SIM Cards', 'description' => '100% genuine Ooredoo prepaid SIM cards supplied through the official distribution network.'],
                            ['icon' => 'CheckCircle', 'title' => 'Ready for Activation', 'description' => 'SIM cards are prepared for fast customer registration and activation.'],
                            ['icon' => 'Package', 'title' => 'Reliable Product Availability', 'description' => 'Continuous stock management ensures retailers and partners always have access to official SIM cards.'],
                            ['icon' => 'Store', 'title' => 'Retail & Wholesale Supply', 'description' => 'Flexible purchasing options designed for retailers, wholesalers, and authorized business partners.'],
                        ],
                        'benefits' => [
                            ['title' => 'Official Products', 'description' => 'Offer your customers authentic Ooredoo prepaid SIM cards backed by an official distributor.'],
                            ['title' => 'Consistent Stock Availability', 'description' => 'Reduce shortages with a reliable supply of prepaid SIM cards throughout the year.'],
                            ['title' => 'Competitive Business Pricing', 'description' => 'Access attractive pricing designed to help retailers and wholesalers maximize profitability.'],
                        ],
                        'faqs' => [
                            ['question' => 'Are the SIM cards official Ooredoo products?', 'answer' => 'Yes. All SIM cards distributed by STI are 100% genuine Ooredoo prepaid SIM cards supplied through the official distribution network.'],
                            ['question' => 'Are the SIM cards ready for activation?', 'answer' => "Yes. Our prepaid SIM cards are ready for customer registration and activation according to Ooredoo's requirements."],
                        ],
                    ],
                    'ar' => [
                        'name' => 'توزيع شرائح أوريدو مسبقة الدفع الرسمية',
                        'shortName' => 'شرائح الهاتف',
                        'badge' => 'توزيع الشرائح',
                        'title' => 'توزيع شرائح أوريدو مسبقة الدفع الرسمية',
                        'description' => [
                            'خدمات التوزيع المخصصة لتوفير شرائح أوريدو الأصلية الجاهزة للتفعيل والتسجيل الفوري للزبائن عبر شبكتنا المعتمدة.',
                        ],
                        'highlights' => [
                            'شرائح أوريدو مسبقة الدفع رسمية 100%',
                            'جاهزة للتفعيل الفوري للزبائن',
                            'وفرة دائم للمخزون على مدار السنة',
                        ],
                        'features' => [
                            ['icon' => 'Smartphone', 'title' => 'شرائح أوريدو رسمية', 'description' => 'شرائح هاتف مسبقة الدفع أصيلة ومضمونة 100%.'],
                            ['icon' => 'CheckCircle', 'title' => 'جاهزة للتفعيل', 'description' => 'معدة للتسجيل والتفعيل السريع وفق الشروط الرسمية.'],
                            ['icon' => 'Package', 'title' => 'وفرة دائم للمخزون', 'description' => 'ضمان تزويد المحلات بالشرائح باستمرار.'],
                            ['icon' => 'Store', 'title' => 'تزويد التجزئة والجملة', 'description' => 'خيارات شراء مرنة لتجار التجزئة والجملة.'],
                        ],
                        'benefits' => [
                            ['title' => 'منتجات رسمية ومضمونة', 'description' => 'توفير شرائح هاتف أصيلة معتمدة من المتعامل أوريدو.'],
                            ['title' => 'تزويد مستمر', 'description' => 'تغدية دائم لمحلاتكم لمنع انقطاع المخزون.'],
                        ],
                        'faqs' => [
                            ['question' => 'هل الشرائح جاهزة للتفعيل؟', 'answer' => 'نعم، الشرائح جاهزة للتسجيل والتفعيل الفوري وفق إجراءات أوريدو الرسمية.'],
                        ],
                    ],
                    'fr' => [
                        'name' => 'Distribution Officielle de Cartes SIM Prépayées Ooredoo',
                        'shortName' => 'Cartes SIM Prépayées',
                        'badge' => 'Distribution Cartes SIM',
                        'title' => 'Distribution Officielle de Cartes SIM Prépayées Ooredoo',
                        'description' => [
                            'Services de distribution de cartes SIM officielles Ooredoo prêtes à l\'activation pour revendeurs agréés.',
                        ],
                        'highlights' => [
                            'Cartes SIM Prépayées Officielles',
                            'Prêtes à l\'Activation Client',
                        ],
                        'features' => [
                            ['icon' => 'Smartphone', 'title' => 'Cartes SIM Officielles', 'description' => 'Cartes SIM prépayées Ooredoo 100% authentiques.'],
                            ['icon' => 'CheckCircle', 'title' => 'Prêtes à l\'Activation', 'description' => 'Cartes SIM préparées pour un enregistrement rapide.'],
                            ['icon' => 'Package', 'title' => 'Stock Permanent', 'description' => 'Disponibilité garantie des cartes SIM.'],
                            ['icon' => 'Store', 'title' => 'Vente en Gros & Détail', 'description' => 'Offres adaptées à tous les revendeurs.'],
                        ],
                        'benefits' => [
                            ['title' => 'Produits Certifiés', 'description' => 'Accès garanti aux produits officiels Ooredoo.'],
                        ],
                        'faqs' => [
                            ['question' => 'Les cartes SIM sont-elles prêtes?', 'answer' => 'Oui, prêtes pour l\'activation et l\'enregistrement.'],
                        ],
                    ],
                ],
            ],
            [
                'slug' => 'wholesale-recharge',
                'status' => 'Published',
                'image' => '/assets/wholesale-recharge.png',
                'translations' => [
                    'en' => [
                        'name' => 'Wholesale Mobile Recharge & SIM Card Solutions',
                        'shortName' => 'Wholesale Solutions',
                        'badge' => 'Wholesale Solutions',
                        'title' => 'Wholesale Mobile Recharge & SIM Card Solutions',
                        'description' => [
                            'Whether you operate a retail network, manage multiple stores, or supply telecom products to your customers, STI offers flexible purchasing options tailored to your business requirements. Our commitment to quality, efficiency, and professional service makes us a trusted wholesale partner throughout Algeria.',
                            'With dedicated business support and dependable supply, STI helps your business grow while ensuring uninterrupted access to official Ooredoo products.',
                        ],
                        'highlights' => [
                            'Competitive Wholesale Pricing',
                            'Bulk Mobile Recharge & SIM Cards',
                            'Official Ooredoo Products',
                            'Dedicated Business Support',
                        ],
                        'features' => [
                            ['icon' => 'Package', 'title' => 'Bulk Purchasing Options', 'description' => 'Purchase official Ooredoo mobile recharge credit and prepaid SIM cards in quantities that match your business needs.'],
                            ['icon' => 'TrendingUp', 'title' => 'Competitive Wholesale Pricing', 'description' => 'Benefit from attractive pricing designed to improve profitability for retailers, wholesalers, and distribution partners.'],
                            ['icon' => 'ShieldCheck', 'title' => 'Official Ooredoo Products', 'description' => 'Access 100% genuine Ooredoo recharge credit and prepaid SIM cards supplied through the official distribution channel.'],
                            ['icon' => 'Truck', 'title' => 'Reliable Product Availability', 'description' => 'Maintain continuous stock with a dependable wholesale supply of telecom products across Algeria.'],
                        ],
                        'benefits' => [
                            ['title' => 'Increase Profitability', 'description' => 'Take advantage of competitive wholesale pricing and improve your business margins.'],
                            ['title' => 'Reliable Stock Supply', 'description' => 'Ensure continuous availability of official Ooredoo products for your customers.'],
                        ],
                        'faqs' => [
                            ['question' => 'What products are available through the wholesale program?', 'answer' => 'Our wholesale program includes official Ooredoo mobile recharge credit in multiple denominations and genuine prepaid SIM cards.'],
                        ],
                    ],
                    'ar' => [
                        'name' => 'حلول التوزيع بالجملة لرصيد الشحن والشرائح',
                        'shortName' => 'حلول الجملة',
                        'badge' => 'مبيعات الجملة',
                        'title' => 'حلول التوزيع بالجملة لرصيد الشحن والشرائح',
                        'description' => [
                            'خيارات شراء بالجملة بأسعار تنافسية موجهة لتجار الجملة والموزعين وشبكات البيع عبر التراب الوطني.',
                        ],
                        'highlights' => [
                            'أسعار جملة تنافسية ممتازة',
                            'كميات كبيرة ورصيد شحن متوفر دائماً',
                        ],
                        'features' => [
                            ['icon' => 'Package', 'title' => 'خيارات شراء بالجملة', 'description' => 'تزويد كميات كبيرة بأسعار ممتازة وهامش ربح مرتفع.'],
                            ['icon' => 'TrendingUp', 'title' => 'أسعار جملة تنافسية', 'description' => 'شروط خيار ممتازة لتجار التجزئة والجملة.'],
                            ['icon' => 'ShieldCheck', 'title' => 'منتجات رسمية 100%', 'description' => 'رصيد ومحتوى رسمي معتمد من أوريدو.'],
                            ['icon' => 'Truck', 'title' => 'توصيل وتوزيع مضمون', 'description' => 'تغطية واسعة واستمرار التزويد.'],
                        ],
                        'benefits' => [
                            ['title' => 'رفع هامش الربح', 'description' => 'الاستفادة من تخفيضات الكمية وتحسين الأرباح.'],
                        ],
                        'faqs' => [
                            ['question' => 'كيف يمكنني التسجيل كتاجر جملة؟', 'answer' => 'تواصل مباشرة مع قسم المبيعات لفتح حساب تجاري وتحديد شروط التزويد.'],
                        ],
                    ],
                    'fr' => [
                        'name' => 'Solutions de Recharge & Cartes SIM en Gros',
                        'shortName' => 'Solutions en Gros',
                        'badge' => 'Vente en Gros',
                        'title' => 'Solutions de Recharge & Cartes SIM en Gros',
                        'description' => [
                            'Conditions tarifaires avantageuses pour les achats en volume de crédit de recharge et cartes SIM.',
                        ],
                        'highlights' => [
                            'Tarifs Grossistes Attractifs',
                            'Volumes Flexibles',
                        ],
                        'features' => [
                            ['icon' => 'Package', 'title' => 'Achats en Gros', 'description' => 'Approvisionnement en volume pour réseaux de vente et revendeurs.'],
                            ['icon' => 'TrendingUp', 'title' => 'Tarifs Compétitifs', 'description' => 'Prix grossistes pour maximiser vos marges.'],
                            ['icon' => 'ShieldCheck', 'title' => 'Produits Officiels', 'description' => 'Crédit et cartes SIM certifiés Ooredoo.'],
                            ['icon' => 'Truck', 'title' => 'Logistique Fiable', 'description' => 'Livraison rapide et stock permanent.'],
                        ],
                        'benefits' => [
                            ['title' => 'Optimisation des Marges', 'description' => 'Conditions tarifaires conçues pour maximiser la rentabilité.'],
                        ],
                        'faqs' => [
                            ['question' => 'Comment commander en gros?', 'answer' => 'Contactez notre équipe commerciale dédiée.'],
                        ],
                    ],
                ],
            ],
            [
                'slug' => 'partner-services',
                'status' => 'Published',
                'image' => '/assets/partner-services.png',
                'translations' => [
                    'en' => [
                        'name' => 'Dedicated Partner Services & Business Support',
                        'shortName' => 'Partner Services',
                        'badge' => 'Partner Services',
                        'title' => 'Dedicated Partner Services & Business Support',
                        'description' => [
                            'Our Partner Services are designed to simplify your daily operations by offering responsive customer support, efficient order management, and continuous access to official Ooredoo mobile recharge credit and prepaid SIM cards.',
                            "Whether you're a new retailer or an established wholesale partner, STI is here to support your business with reliable products, personalized assistance, and a trusted partnership focused on long-term success.",
                        ],
                        'highlights' => [
                            'Dedicated Business Support',
                            'Reliable Product Availability',
                            'Fast Order Assistance',
                            'Long-Term Partnership',
                        ],
                        'features' => [
                            ['icon' => 'Headphones', 'title' => 'Dedicated Account Assistance', 'description' => 'Receive personalized support from our experienced team for all your business needs.'],
                            ['icon' => 'RefreshCw', 'title' => 'Fast Order Management', 'description' => 'Efficient processing and follow-up to ensure your orders are handled quickly and accurately.'],
                            ['icon' => 'Package', 'title' => 'Reliable Product Availability', 'description' => 'Continuous access to official Ooredoo mobile recharge credit and prepaid SIM cards.'],
                            ['icon' => 'Users', 'title' => 'Business Partnership Support', 'description' => 'Professional guidance to help retailers and wholesalers grow their business with confidence.'],
                        ],
                        'benefits' => [
                            ['title' => 'Responsive Customer Support', 'description' => 'Quick assistance for orders, product inquiries, and partnership requests.'],
                        ],
                        'faqs' => [
                            ['question' => 'What are STI Partner Services?', 'answer' => 'STI Partner Services provide dedicated business support, order assistance, and reliable access to official Ooredoo products.'],
                        ],
                    ],
                    'ar' => [
                        'name' => 'خدمات ودعم الشركاء المخصص',
                        'shortName' => 'خدمات الشركاء',
                        'badge' => 'دعم الشركاء',
                        'title' => 'خدمات ودعم الشركاء المخصص',
                        'description' => [
                            'خدمات دعم ومرافقة ميدانية وتجارية يومية لشركاء STI المعتمدين لتسهيل عمليات التزويد وتطوير النشاط.',
                        ],
                        'highlights' => [
                            'مرافقة ودعم مخصص للشركاء',
                            'متابعة سريعة ومعالجة فورية للطلبيات',
                        ],
                        'features' => [
                            ['icon' => 'Headphones', 'title' => 'دعم ومرافقة مخصصة', 'description' => 'فريق مبيعات واستشارات تجارية في خدمتكم.'],
                            ['icon' => 'RefreshCw', 'title' => 'معالجة سريعة للطلبيات', 'description' => 'إجراءات تزويد سهلة وسريعة.'],
                            ['icon' => 'Package', 'title' => 'تزويد دائم للمنتجات', 'description' => 'استمرار توفر منتجات أوريدو.'],
                            ['icon' => 'Users', 'title' => 'دعم الشراكة التجارية', 'description' => 'مرافقة التجار لتطوير نشاطهم.'],
                        ],
                        'benefits' => [
                            ['title' => 'استجابة سريعة', 'description' => 'متابعة فورية لكافة الطلبات والاستفسارات التجارية.'],
                        ],
                        'faqs' => [
                            ['question' => 'ما هي خدمات الشركاء؟', 'answer' => 'تشمل التزويد والمرافقة والمساعدة الفنية واللوجستية.'],
                        ],
                    ],
                    'fr' => [
                        'name' => 'Services Partenaires & Assistance Commerciale',
                        'shortName' => 'Services Partenaires',
                        'badge' => 'Support Partenaires',
                        'title' => 'Services Partenaires & Assistance Commerciale',
                        'description' => [
                            'Assistance dédiée et accompagnement personnalisé pour tous les partenaires commerciaux.',
                        ],
                        'highlights' => [
                            'Assistance Compte Dédiée',
                            'Gestion Rapide des Commandes',
                        ],
                        'features' => [
                            ['icon' => 'Headphones', 'title' => 'Assistance Dédiée', 'description' => 'Une équipe d\'experts à votre écoute au quotidien.'],
                            ['icon' => 'RefreshCw', 'title' => 'Gestion des Commandes', 'description' => 'Traitement efficace de vos demandes.'],
                            ['icon' => 'Package', 'title' => 'Stock Garanti', 'description' => 'Accès continu aux recharges et cartes SIM.'],
                            ['icon' => 'Users', 'title' => 'Support Partenariat', 'description' => 'Conseils pour développer votre entreprise.'],
                        ],
                        'benefits' => [
                            ['title' => 'Réactivité Commerciale', 'description' => 'Traitement rapide des demandes et commandes.'],
                        ],
                        'faqs' => [
                            ['question' => 'Comment contacter le support?', 'answer' => 'Par téléphone, email ou espace partenaire.'],
                        ],
                    ],
                ],
            ],
            [
                'slug' => 'business-partnership',
                'status' => 'Published',
                'image' => '/assets/business-partnership.png',
                'translations' => [
                    'en' => [
                        'name' => 'Business Partnership Program',
                        'shortName' => 'Business Partnership',
                        'badge' => 'Official Ooredoo Distributor',
                        'title' => 'Business Partnership Program',
                        'description' => [
                            "STI's Business Partnership Program offers long-term, strategic partnerships with companies looking to distribute Ooredoo products across Algeria. We provide the infrastructure, support, and pricing to help your business grow.",
                            "As an official Ooredoo distributor, we bring certified product access, reliable logistics, and dedicated account management to every partnership. Our goal is to build lasting relationships that drive mutual success.",
                        ],
                        'highlights' => [
                            'Nationwide Reach Across 58 Wilayas',
                            'Strategic Growth & Partnership Support',
                            'Certified Ooredoo Distributor Status',
                        ],
                        'features' => [
                            ['icon' => 'Users', 'title' => 'Strategic Partnership', 'description' => 'Long-term business relationships built on trust.'],
                            ['icon' => 'Globe', 'title' => 'Nationwide Reach', 'description' => 'Distribution across all 58 Algerian provinces.'],
                            ['icon' => 'TrendingUp', 'title' => 'Growth Support', 'description' => 'Tools and support to scale your business.'],
                            ['icon' => 'ShieldCheck', 'title' => 'Official Certification', 'description' => 'Ooredoo certified distribution partner status.'],
                        ],
                        'benefits' => [
                            ['title' => 'Business Growth', 'description' => 'Scale your operations with a proven product and partner.'],
                            ['title' => 'Reliable Supply', 'description' => 'Guaranteed product availability for your network.'],
                        ],
                        'faqs' => [
                            ['question' => 'What does the partnership program include?', 'answer' => 'Partnerships include official Ooredoo product access, competitive wholesale pricing, and logistics infrastructure.'],
                        ],
                    ],
                    'ar' => [
                        'name' => 'برنامج الشراكة التجارية والاستراتيجية',
                        'shortName' => 'برنامج الشراكة',
                        'badge' => 'موزع أوريدو الرسمي',
                        'title' => 'برنامج الشراكة التجارية والاستراتيجية',
                        'description' => [
                            'برنامج شراكة تجارية طويل المدى لتوزيع منتجات أوريدو الرسمية عبر 58 ولاية بمرافقة استراتيجية ولوجستية كاملة.',
                        ],
                        'highlights' => [
                            'تغطية شبكة التوزيع الوطنية 58 ولاية',
                            'نمو تجاري استراتيجي ومستدام',
                        ],
                        'features' => [
                            ['icon' => 'Users', 'title' => 'شراكة استراتيجية', 'description' => 'اتفاقيات توزيع طويلة المدى عبر مختلف الولايات.'],
                            ['icon' => 'Globe', 'title' => 'تغطية وطنية 58 ولاية', 'description' => 'شبكة توزيع ممتدة في كافة الولايات.'],
                            ['icon' => 'TrendingUp', 'title' => 'دعم ومرافقة النمو', 'description' => 'آليات مخصصة لتوسيع نشاطكم التجارى.'],
                            ['icon' => 'ShieldCheck', 'title' => 'اعتماد رسمى', 'description' => 'صفة موزع رسمي معتمد من أوريدو.'],
                        ],
                        'benefits' => [
                            ['title' => 'ارتباط بعلامة موثوقة', 'description' => 'العمل مع الموزع الرسمي المعتمد لأوريدو.'],
                        ],
                        'faqs' => [
                            ['question' => 'كيف أصبح شريكاً تجارياً؟', 'answer' => 'قدم طلب الشراكة عبر قسم العلاقات التجارية.'],
                        ],
                    ],
                    'fr' => [
                        'name' => 'Programme de Partenariat Commercial',
                        'shortName' => 'Partenariat Commercial',
                        'badge' => 'Distributeur Officiel Ooredoo',
                        'title' => 'Programme de Partenariat Commercial',
                        'description' => [
                            'Partenariats stratégiques à long terme pour la distribution des produits Ooredoo à travers l\'Algérie.',
                        ],
                        'highlights' => [
                            'Couverture Nationale 58 Wilayas',
                            'Croissance Stratégique Partagée',
                        ],
                        'features' => [
                            ['icon' => 'Users', 'title' => 'Partenariat Stratégique', 'description' => 'Infrastructure de distribution robuste.'],
                            ['icon' => 'Globe', 'title' => 'Présence Nationale', 'description' => 'Distribution à travers les 58 wilayas.'],
                            ['icon' => 'TrendingUp', 'title' => 'Support de Croissance', 'description' => 'Accompagnement pour développer votre marché.'],
                            ['icon' => 'ShieldCheck', 'title' => 'Agrément Officiel', 'description' => 'Statut de partenaire officiel certifié.'],
                        ],
                        'benefits' => [
                            ['title' => 'Reconnaissance de Marque', 'description' => 'Associez-vous au distributeur agréé Ooredoo.'],
                        ],
                        'faqs' => [
                            ['question' => 'Quelles sont les conditions?', 'answer' => 'Contactez notre département dédié.'],
                        ],
                    ],
                ],
            ],
            [
                'slug' => 'customer-support',
                'status' => 'Published',
                'image' => '/assets/customer-support.png',
                'translations' => [
                    'en' => [
                        'name' => 'Customer Support Services',
                        'shortName' => 'Customer Support',
                        'badge' => 'Official Ooredoo Distributor',
                        'title' => 'Customer Support Services',
                        'description' => [
                            'STI provides professional customer support services for all our distribution partners. From order assistance to technical guidance, our dedicated team ensures your business runs smoothly.',
                            'Our support infrastructure includes phone, email, and online channels, with responsive service designed to resolve issues quickly and keep your operations on track.',
                        ],
                        'highlights' => [
                            'Direct Phone & Email Support',
                            'Fast Turnaround & Quick Issue Resolution',
                        ],
                        'features' => [
                            ['icon' => 'Phone', 'title' => 'Phone Support', 'description' => 'Direct access to our support team by phone.'],
                            ['icon' => 'Mail', 'title' => 'Email Support', 'description' => 'Detailed assistance via email for complex inquiries.'],
                            ['icon' => 'MessageSquare', 'title' => 'Online Support', 'description' => 'Digital channels for quick questions and updates.'],
                            ['icon' => 'Headphones', 'title' => 'Dedicated Team', 'description' => 'Specialized support staff for partner accounts.'],
                        ],
                        'benefits' => [
                            ['title' => 'Quick Resolution', 'description' => 'Fast response times to keep your business moving.'],
                        ],
                        'faqs' => [
                            ['question' => 'What are your support hours?', 'answer' => 'Our support team is available Monday through Saturday, 08:00 to 18:00.'],
                        ],
                    ],
                    'ar' => [
                        'name' => 'خدمات دعم ومساعدة الزبائن',
                        'shortName' => 'دعم الزبائن',
                        'badge' => 'موزع أوريدو الرسمي',
                        'title' => 'خدمات دعم ومساعدة الزبائن',
                        'description' => [
                            'مركز دعم ومساعدة هاتفي ورقمي موجه لكافة الشركاء والتجار والزبائن لضمان سياق العمل بسلاسة.',
                        ],
                        'highlights' => [
                            'دعم هاتفي وإلكتروني مباشر',
                            'معالجة سريعة للانشغالات والطلبات',
                        ],
                        'features' => [
                            ['icon' => 'Phone', 'title' => 'دعم هاتفي مباشر', 'description' => 'فريق مساعدة متوفر من الإثنين إلى السبت.'],
                            ['icon' => 'Mail', 'title' => 'دعم بالبريد الإلكتروني', 'description' => 'متابعة الدعم الفني والتجاري عبر الإيميل.'],
                            ['icon' => 'MessageSquare', 'title' => 'دعم إلكتروني مباشر', 'description' => 'قنوات رقمية للإجابة السريعة على الاستفسارات.'],
                            ['icon' => 'Headphones', 'title' => 'فريق متخصص', 'description' => 'مساعدون مؤهلون لمرافقة محلاتكم.'],
                        ],
                        'benefits' => [
                            ['title' => 'معالجة سريعة', 'description' => 'حل سريع لكافة الانشغالات والطلبات.'],
                        ],
                        'faqs' => [
                            ['question' => 'ما هي أوقات العمل والدعم؟', 'answer' => 'من الإثنين إلى السبت، من 08:00 إلى 18:00.'],
                        ],
                    ],
                    'fr' => [
                        'name' => 'Services de Support & Assistance Clients',
                        'shortName' => 'Support Clients',
                        'badge' => 'Distributeur Officiel Ooredoo',
                        'title' => 'Services de Support & Assistance Clients',
                        'description' => [
                            'Assistance téléphonique et numérique professionnelle pour tous nos partenaires.',
                        ],
                        'highlights' => [
                            'Support Téléphonique Direct',
                            'Résolution Rapide des Problèmes',
                        ],
                        'features' => [
                            ['icon' => 'Phone', 'title' => 'Support Téléphonique', 'description' => 'Assistance directe du lundi au samedi.'],
                            ['icon' => 'Mail', 'title' => 'Support Email', 'description' => 'Assistance détaillée par courrier électronique.'],
                            ['icon' => 'MessageSquare', 'title' => 'Support en Ligne', 'description' => 'Canaux numériques pour vos questions.'],
                            ['icon' => 'Headphones', 'title' => 'Équipe Dédiée', 'description' => 'Personnel qualifié pour le suivi de votre compte.'],
                        ],
                        'benefits' => [
                            ['title' => 'Traitement Rapide', 'description' => 'Prise en charge immédiate de vos demandes.'],
                        ],
                        'faqs' => [
                            ['question' => 'Quelles sont les heures de support?', 'answer' => 'Du lundi au samedi de 08h00 à 18h00.'],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($solutions as $solData) {
            Solution::firstOrCreate(
                ['slug' => $solData['slug']],
                [
                    'status' => $solData['status'],
                    'image' => $solData['image'],
                    'translations' => $solData['translations'],
                ]
            );
        }
    }
}
