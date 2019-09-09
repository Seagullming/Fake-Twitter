<?php

namespace {

    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\Form;
    use SilverStripe\Forms\FormAction;
    use SilverStripe\Forms\RequiredFields;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\Forms\TextField;
    

    class Homepage_Controller extends PageController{
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
            $hashtag->Twitts()->add($twitt);
            $hashtag->write();
            $form->sessionMessage('Thanks for posting', 'good');
            $this->redirectBack();
        }

       

     


        
    }
}