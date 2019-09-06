<?php

namespace {

    use SilverStripe\Assets\Image;
    use SilverStripe\ORM\DataObject;


    class Twitt extends DataObject
    {

        //*Data structure for each Twitt

        private static $db = [
            'TwittContent' => 'Text',
        ];

        private static $has_many = array(
            'TwittImage' => TwittImage::class
        );

        private static $many_many = [
            'Hashtags' => Hashtag::class,
        ];
      
    }

    //* Add TwittID property to Image datatable

    class TwittImage extends Image
    {
        private static $has_one = [
            "Twitt" => "Twitt"
        ];
    }
}
