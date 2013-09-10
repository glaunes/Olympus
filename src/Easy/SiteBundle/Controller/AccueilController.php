<?php

namespace Easy\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
    public function indexAction()
    {
        // Chargement des News
        $articles = $this->getDoctrine()->getManager()->getRepository('EasyArticleBundle:Article')->findBy(array(), array('date' => 'DESC'), 5, 0);
        
        return $this->render('EasySiteBundle:Default:index.html.twig', array('articles' => $articles));
    }
}
