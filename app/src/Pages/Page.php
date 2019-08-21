<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig;
    use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class Page extends SiteTree
    {
        private static $many_many = [
            'Hashtags' => Hashtag::class,
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->addFieldsToTab('Root.Hashtags',GridField::create(
                'Hashtags',
                'Twitts Hashtags',
                $this->Hashtags(),
                GridFieldConfig_RecordEditor::create()
            ));

            return $fields;
        }
    }

}
