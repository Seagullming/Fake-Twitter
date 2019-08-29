<?php

namespace {

use SilverStripe\Admin\ModelAdmin;

class HashtagsAdmin extends ModelAdmin{
        private static $menu_title = "Hashtags";

        private static $url_segment = "hashtags";

        private static $managed_models = [
            Hashtag::class,
        ];
    }

}