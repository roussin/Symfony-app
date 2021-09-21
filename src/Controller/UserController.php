<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Type\UserType;




class UserController extends AbstractController 
{
    /**
     * @Route("/user")
     */
    function createUserForm(Request $request) 
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            // getData() récupère les valeurs qui se trouvent dans le formulaire
            $userInfo = $form->getData();
            // Récupérer l'entityManager de doctrine via AbstractController
            $entityManager = $this->getDoctrine()->getManager();
            // préparartion de la transaction
            // persister un objet en répurérant les données du formulaire soumis et validé
            $entityManager->persist($userInfo);
            // exécution de la transaction
            $entityManager->flush();
            return new Response("Formulaire validé");
        }

        return $this->render('form/form.html.twig', [
            'userForm' => $form->createView()
        ]);
    }
}