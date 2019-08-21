<?php

namespace {

    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\TextField;
    use SilverStripe\ORM\DataObject;

    class Hashtag extends DataObject
    {
        private static $db = [
            'Title' => 'Varchar',
        ];

        private static $belong_many_many = [
            'Twitts' => Twitt::class,
        ];

        public function getCMSFields()
        {
            return FieldList::Create(
                TextField::create('Title')
            );
        }
    }
}
