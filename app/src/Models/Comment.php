<?php

namespace {

use SilverStripe\ORM\DataObject;

class Comment extends DataObject
    {
        private static $db = [
            'CommentContent' => 'Text',
        ];
    }
}
