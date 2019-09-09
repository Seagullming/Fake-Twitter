<?php

namespace {

    
    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\View\Requirements;

    class PageController extends ContentController
    {
        /**
         * An array of actions that can be accessed via a request. Each array element should be an action name, and the
         * permissions or conditions required to allow the user to access it.
         *
         * <code>
         * [
         *     'action', // anyone can access this action
         *     'action' => true, // same as above
         *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
         *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
         * ];
         * </code>
         *
         * @var array
         */


        protected function init()
        {
            parent::init();
            Requirements::javascript('https://code.jquery.com/jquery-3.3.1.slim.min.js');
            Requirements::javascript('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
            Requirements::javascript('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
            Requirements::css('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
        }

        public function getTwitts()
        {
            return Twitt::get();
        }

        public function getHashtags()
        {
            return Hashtag::get();
        }

        public function getUser()
        {
            return Member::get();
        }
    }
}
