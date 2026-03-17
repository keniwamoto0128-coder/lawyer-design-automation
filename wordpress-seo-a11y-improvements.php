<?php
/**
 * WordPress improvements for https://uno-law-teisouken.com/
 *
 * Usage:
 * 1) Copy the functions into your active theme's functions.php, OR
 * 2) Save this file as a must-use plugin: wp-content/mu-plugins/uno-law-improvements.php
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Site constants
 */
const UNO_LAW_CANONICAL = 'https://uno-law-teisouken.com/';
const UNO_LAW_TITLE = '貞操権侵害の慰謝料請求｜大阪の弁護士・宇野大輔法律事務所';
const UNO_LAW_DESC = '貞操権侵害の慰謝料請求に注力。大阪の弁護士・宇野大輔法律事務所が証拠整理から示談交渉・訴訟対応まで丁寧にサポートします。初回相談をご希望の方はお気軽にお問い合わせください。';
const UNO_LAW_OG_IMAGE = 'https://uno-law-teisouken.com/wp-content/uploads/ogp.jpg';

/**
 * P0-1,2,3: Force title/meta/OGP/Twitter on front page
 */
add_filter('pre_get_document_title', function ($title) {
    if (is_front_page() || is_home()) {
        return UNO_LAW_TITLE;
    }
    return $title;
}, 999);

add_action('wp_head', function () {
    if (!(is_front_page() || is_home())) {
        return;
    }

    $title = esc_attr(UNO_LAW_TITLE);
    $desc = esc_attr(UNO_LAW_DESC);
    $url  = esc_url(UNO_LAW_CANONICAL);
    $img  = esc_url(UNO_LAW_OG_IMAGE);
    ?>
    <meta name="description" content="<?php echo $desc; ?>" />
    <link rel="canonical" href="<?php echo $url; ?>" />

    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:description" content="<?php echo $desc; ?>" />
    <meta property="og:image" content="<?php echo $img; ?>" />
    <meta property="og:url" content="<?php echo $url; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="ja_JP" />
    <meta property="og:site_name" content="宇野大輔法律事務所" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $title; ?>" />
    <meta name="twitter:description" content="<?php echo $desc; ?>" />
    <meta name="twitter:image" content="<?php echo $img; ?>" />
    <?php
}, 1);

/**
 * P0-4,5 / P2-10: JSON-LD schema output
 */
add_action('wp_head', function () {
    if (!(is_front_page() || is_home())) {
        return;
    }

    $schema = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'LegalService',
                '@id' => UNO_LAW_CANONICAL . '#legalservice',
                'name' => '宇野大輔法律事務所',
                'url' => UNO_LAW_CANONICAL,
                'telephone' => '+81-120-619-030',
                'address' => [
                    '@type' => 'PostalAddress',
                    'postalCode' => '530-0047',
                    'addressRegion' => '大阪府',
                    'addressLocality' => '大阪市北区',
                    'streetAddress' => '西天満2丁目6-8',
                    'addressCountry' => 'JP',
                ],
                'openingHoursSpecification' => [
                    [
                        '@type' => 'OpeningHoursSpecification',
                        'dayOfWeek' => [
                            'Monday',
                            'Tuesday',
                            'Wednesday',
                            'Thursday',
                            'Friday',
                        ],
                        'opens' => '09:00',
                        'closes' => '18:30',
                    ],
                ],
                'areaServed' => '大阪府',
                'priceRange' => '$$',
            ],
            [
                '@type' => 'Attorney',
                '@id' => UNO_LAW_CANONICAL . '#attorney',
                'name' => '宇野大輔',
                'worksFor' => [
                    '@id' => UNO_LAW_CANONICAL . '#legalservice',
                ],
                'url' => UNO_LAW_CANONICAL,
            ],
            [
                '@type' => 'LocalBusiness',
                '@id' => UNO_LAW_CANONICAL . '#localbusiness',
                'name' => '宇野大輔法律事務所',
                'url' => UNO_LAW_CANONICAL,
                'telephone' => '+81-120-619-030',
                'address' => [
                    '@type' => 'PostalAddress',
                    'postalCode' => '530-0047',
                    'addressRegion' => '大阪府',
                    'addressLocality' => '大阪市北区',
                    'streetAddress' => '西天満2丁目6-8',
                    'addressCountry' => 'JP',
                ],
                'openingHours' => 'Mo-Fr 09:00-18:30',
            ],
            [
                '@type' => 'FAQPage',
                '@id' => UNO_LAW_CANONICAL . '#faq',
                'mainEntity' => [
                    [
                        '@type' => 'Question',
                        'name' => '貞操権侵害とはどのような場合に認められますか？',
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => '交際・婚姻を前提とする欺罔行為や不貞行為などにより、精神的苦痛が生じた場合に慰謝料請求が認められる可能性があります。具体的な事情により判断が分かれるため、事実関係の整理が重要です。',
                        ],
                    ],
                    [
                        '@type' => 'Question',
                        'name' => '慰謝料の相場はいくらですか？',
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => '事案の悪質性、交際期間、婚約の有無、被害の程度などで金額は変動します。判例・交渉実務を踏まえ、適切な請求額を個別に検討する必要があります。',
                        ],
                    ],
                    [
                        '@type' => 'Question',
                        'name' => '証拠はどのようなものが必要ですか？',
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => 'メッセージ履歴、写真、録音、金銭授受の記録、第三者証言などが有効です。違法収集を避けつつ、時系列で整理することが重要です。',
                        ],
                    ],
                    [
                        '@type' => 'Question',
                        'name' => '相手方と直接やり取りせずに進められますか？',
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => '弁護士が代理人として交渉・通知を行うことで、本人同士の直接交渉を避けながら手続きを進められます。',
                        ],
                    ],
                    [
                        '@type' => 'Question',
                        'name' => '相談から解決までの流れを教えてください。',
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => '初回相談で事情確認・証拠整理方針を決定し、内容証明送付、示談交渉、必要に応じて訴訟対応へ進みます。状況に応じて見通しと費用を丁寧にご説明します。',
                        ],
                    ],
                ],
            ],
            [
                '@type' => 'BreadcrumbList',
                '@id' => UNO_LAW_CANONICAL . '#breadcrumb',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'ホーム',
                        'item' => UNO_LAW_CANONICAL,
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => '貞操権侵害の慰謝料請求',
                        'item' => UNO_LAW_CANONICAL,
                    ],
                ],
            ],
        ],
    ];

    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</script>\n";
}, 2);

/**
 * P1-9: Add loading="lazy" to all content images.
 * (Skip first content image as eager candidate for LCP)
 */
add_filter('the_content', function ($content) {
    if (stripos($content, '<img') === false) {
        return $content;
    }

    $count = 0;
    return preg_replace_callback('/<img\b[^>]*>/i', function ($m) use (&$count) {
        $img = $m[0];

        if (stripos($img, ' loading=') !== false) {
            $count++;
            return $img;
        }

        $count++;
        if ($count === 1) {
            return preg_replace('/<img\b/i', '<img loading="eager" fetchpriority="high"', $img, 1);
        }

        return preg_replace('/<img\b/i', '<img loading="lazy"', $img, 1);
    }, $content);
}, 20);

/**
 * P2-11: H1 fallback for front page when theme outputs empty title.
 * Recommended: fix template directly (front-page.php/page.php).
 */
add_action('wp_head', function () {
    if (!(is_front_page() || is_home())) {
        return;
    }
    ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        var h1 = document.querySelector('h1');
        if (h1 && !h1.textContent.trim()) {
          h1.textContent = '貞操権侵害の慰謝料請求｜大阪の弁護士・宇野大輔法律事務所';
        }
      });
    </script>
    <?php
}, 99);

/**
 * P1-6,7,8: CSS patch (deduplicated + syntax fixed)
 * Note: move inline body styles to theme stylesheet when possible.
 */
add_action('wp_enqueue_scripts', function () {
    $css = <<<CSS
/* unified: .teiso-worry-box (deduplicated) */
.teiso-worry-box {
  border: 2px solid #157071;
  border-radius: 8px;
  padding: 20px;
  background: #f7fcfc;
}

/* unified: .feature-box (deduplicated) */
.feature-box {
  border: 2px solid #157071;
  border-radius: 8px;
  padding: 20px;
  background: #fff;
}

.white-list li {
  position: relative;
  padding-left: 1em;
}

.white-list li::before {
  content: "・";
  position: absolute;
  left: 0;
  top: 0;
}

.benefit-box {
  border: 2px solid #157071; /* fixed valid comment style */
  border-radius: 4px;
}
CSS;

    wp_register_style('uno-law-inline-fix', false);
    wp_enqueue_style('uno-law-inline-fix');
    wp_add_inline_style('uno-law-inline-fix', $css);
}, 99);
