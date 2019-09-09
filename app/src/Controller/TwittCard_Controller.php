<?php

namespace {
    class TwittCard_Controller extends PageController{
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
            $comment = Comment::create();
            $form->saveInto($comment);
            $comment->write();
            $comment->CommentID = $this->ID;
            $form->sessionMessage('Thanks for posting', 'good');

            $this->redirectBack();
        }
    }
}