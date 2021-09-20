<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HelloController extends AbstractController {

    /**
     * @Route("hello/{param<\d+>}", methods={"GET"})
     */
    function helloNumber(int $param) {
        return new Response('Hello number ' . $param);
    }

    /**
     * @Route("hello/{param}")
     */
    function helloString(string $param) {
        return new Response('Hello ' . $param);
        // var_dump($request->query); die;
    }
    
    /**
     * @Route("hello")
     */
    function helloArray() {
        $title = "utilisateurs";
        $users = ["Christophe", "Christelle", "Yoann", "Mickaël", "Clément"];
        return $this->render('hello.html.twig', [
            'title' => $title,
            'array' => $users
        ]);
    }

    /**
     * @Route("hello")
     */
    function helloRequest(Request $request) {
        $params = $request->query->all();
        $string = "Les paramètres sont : " . "</br>";
        foreach ($params as $key => $value) {
            $string = $string . '-' . $key . ':' . $value . '</br>';
        }
        return new Response($string);
    }
}
