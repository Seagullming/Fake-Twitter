<?php

namespace {

use SilverStripe\ORM\DataObject;

class Comment extends DataObject
    {
        private static $db = [
            'CommentContent' => 'Text',
        ];

        private static $has_one = [
            "Comment" => "Comment",
        ];
    }
}
