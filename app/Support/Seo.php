<?php

namespace App\Support;

use CoffeeCode\Optimizer\Optimizer;

class Seo
{
    private $optimizer;

    public function __construct()
    {
        $this->optimizer = new Optimizer();
    }

    public function render(string $title, string $description, string $url, string $image, bool $follow = true)
    {
        return $this->optimizer
            ->optimize($title, $description, $url, $image, $follow)
            ->openGraph(
                env('APP_NAME'),
                'pt_BR',
                'article'
            )
            ->twitterCard(
                env('CLIENT_SOCIAL_TWITTER_CREATOR'),
                env('CLIENT_SOCIAL_TWITTER_PUBLISHER'),
                env('APP_URL')
            )->render();
    }
}
