<?php

namespace AppBundle\Helpers;


use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormError;

class SignUpHelper extends Controller {
    public function __construct() {}

    public function isValid(User $user) {
        if(strlen(str_replace(" ", "", $user->getName())) < 3) return false;
        if(strlen(str_replace(" ", "", $user->getLastname())) < 3) return false;
        if(strlen(str_replace(" ", "", $user->getEmail())) < 3 && !strpos($user->getEmail(),"@") && !strpos($user->getEmail(),'.')) return false;
        if(strlen(str_replace(" ", "", $user->getNickname())) < 3) return false;
        if(strlen($user->getPassword()) < 6) return false;
        if(strpos($user->getName()," ")) return false;
        return true;
    }

    public function setErrorMessages(Form $form, User $user) {
        if(strlen(str_replace(" ", "", $user->getName())) < 3) $form->get('name')->addError(new FormError("Insert a valid name."));
        if(strlen(str_replace(" ", "", $user->getLastname())) < 3) $form->get('lastname')->addError(new FormError("Insert a valid lastname."));
        if(strlen(str_replace(" ", "", $user->getEmail())) < 3 && !strpos($user->getEmail(),"@") && !strpos($user->getEmail(),'.')) $form->get('email')->addError(new FormError("Insert a valid email."));
        if(strlen(str_replace(" ", "", $user->getNickname())) < 3) $form->get('nickname')->addError(new FormError("Insert a valid nickname."));
        if(strlen($user->getPassword()) < 6) $form->get('password')->addError(new FormError("Your password has to be at least 6 characters."));
        if(strpos($user->getPassword()," ")) $form->get('password')->addError(new FormError("Insert a valid name."));
        return $form;
    }
}