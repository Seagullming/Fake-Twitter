<?php

namespace {

    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\Dev\Debug;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\Form;
    use SilverStripe\Forms\FormAction;
    use SilverStripe\Forms\RequiredFields;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\Forms\TextField;
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

        private static $allowed_actions = [
            'TwittForm'
        ];

        //* Structure of posting new form
        public function TwittForm()
        {
            $form = Form::create(
                $this,
                'TwittForm',
                FieldList::create(
                    TextareaField::create('TwittContent', '')
                        ->setAttribute('placeholder', 'TwittContent'),
                    TextField::create('HashtagTitle', '')
                        ->setAttribute('placeholder', 'Hashtag'),
                    UploadField::create('TwittImage', '')
                ),


                FieldList::create(
                    FormAction::create('HandleTwittsPost', 'Post')
                        ->setUseButtonTag(true)
                ),

                RequiredFields::create('TwittContent', 'Hashtag')
            );

            return $form;
        }

        public function HandleTwittsPost($data, $form)
        {

            $twitt = Twitt::create();
            $hashtag = Hashtag::create();
            $twitt->TwittContent = $data['TwittContent'];
            $hashtag->Title = $data['HashtagTitle'];
            $twitt->write();
            $hashtag->write();
            $twitt->ID = $this->ID;
            $hashtag->ID = $this->ID;
            $form->sessionMessage('Thanks for posting', 'good');
            $this->redirectBack();
        }

       

        public function CommentForm()
        {
            $form = Form::create(
                $this,
                'CommentForm',
                FieldList::create(
                    TextareaField::create('CommentContent', '')
                        ->setAttribute('placeholder', 'CommentContent')
                ),

                FieldList::create(
                    FormAction::create('HandleCommentsPost', 'Post')
                        ->setUseButtonTag(true)
                ),
                RequiredFields::create('CommentContent')
            );

            return $form;
        }

        public function HandleCommentsPost($data, $form)
        {
            Debug::show($data);
            Debug::show($_FILES);
            $comment = Comment::create();
            $form->saveInto($comment);
            $comment->write();
            $comment->CommentID = $this->ID;
            $form->sessionMessage('Thanks for posting', 'good');

            $this->redirectBack();
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
