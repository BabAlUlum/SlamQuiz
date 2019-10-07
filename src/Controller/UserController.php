<?php

namespace App\Controller;
    
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    
    /**
    * @Route("/user")
    */
    
     class UserController extends AbstractController {

        /**
        * @Route("/index", name="default_index")
        */
         public function index () {
             
            $usersList = array();
             
            $userList[0]['first_name'] = 'Michel' ;
            $userList[0]['last_name'] = 'DUPOND'  ;
             
            $userList[1]['first_name'] = 'Sophie' ;
            $userList[1]['last_name'] = 'BOULAZ'  ;
             
            return $this->render('user/user.html.twig', [ 
                               'users_list' => $userList, ]);
        }
    }
?>