<?php

namespace {

    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\TextField;
    use SilverStripe\ORM\DataExtension;

    class UserExtension extends DataExtension
    { 
        private static $db =  array(
            'UserName' => 'Varchar',
        );

        public function updateUserExtension (FieldList $fields){
            $fields->push(new TextField('UserName','UserName'));
        }
    }
}
