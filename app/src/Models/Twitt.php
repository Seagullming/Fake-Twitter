<?php

namespace {

    use SilverStripe\Assets\Image;
    use SilverStripe\ORM\DataObject;


    class Twitt extends DataObject
    {
        private static $db = [
            'Time' => 'Time',
            'TwittContent' => 'Text',
        ];

        private static $has_one = [
            'TwittPage' => TwittPage::class,
        ];

        private static $has_many = array(
            'TwittImage' => TwittImage::class
        );
    }



    class TwittImage extends Image
    {
        private static $has_one = [
            "Twitt" => "Twitt"
        ];
    }
}
