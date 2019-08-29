<?php

namespace {

    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\TextField;
    use SilverStripe\ORM\DataObject;

    class Hashtag extends DataObject
    {
        //* Only need title for the Hashtag at the moment
        private static $db = [
            'Title' => 'Varchar',
        ];

        //* Each Category has several Twitts
        private static $belongs_many_many = [
            'Twitts' => Twitt::class,
        ];

        //*Create Interface to manage the categories
        public function getCMSFields()
        {
            return FieldList::Create(
                TextField::create('Title')
            );
        }
    }
}
