<?php

namespace {

    use SilverStripe\Admin\ModelAdmin;

    class TwittAdmin extends ModelAdmin
    {
        private static $menu_title = "Twitts";

        private static $url_segment = "twitts";

        private static $managed_models = [
            Twitt::class,
        ];

        private static $summary_field = [
            'Time' => 'Time',
        ];
    }
}
