<?php

namespace {

    class TwittPage extends Page
    {
        private static $has_many = [
            'Twitts' => Twitt::class,
        ];
    }
}
