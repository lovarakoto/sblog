<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\BlogBundle\Entity\Enquiry;
use Blogger\BlogBundle\Form\EnquiryType;
use Symfony\Component\HttpFoundation\Session\Session;

class PageController extends Controller
{
    public function indexAction()
    {
        // $em = $this->getDoctrine()
        //            ->getManager();

        // $blogs = $em->getRepository('BloggerBlogBundle:Blog')
        //             ->getLatestBlogs();

        // return $this->render('BloggerBlogBundle:Page:index.html.twig', array(
        //     'blogs' => $blogs
        // ));

        // partie 1
        return $this->render('BloggerBlogBundle:Page:index.html.twig');
    }
    
    public function aboutAction()
    {
        return $this->render('BloggerBlogBundle:Page:about.html.twig');
    }
    
    public function contactAction()
    {


        // //  // partie 2
        return $this->render('BloggerBlogBundle:Page:contact.html.twig');
    }
    
    // public function sidebarAction()
    // {
    //     $em = $this->getDoctrine()
    //                ->getManager();
    
    //     $tags = $em->getRepository('BloggerBlogBundle:Blog')
    //                ->getTags();
    
    //     $tagWeights = $em->getRepository('BloggerBlogBundle:Blog')
    //                      ->getTagWeights($tags);
    
    //     $commentLimit   = $this->container
    //                            ->getParameter('blogger_blog.comments.latest_comment_limit');
    //     $latestComments = $em->getRepository('BloggerBlogBundle:Comment')
    //                          ->getLatestComments($commentLimit);
    
    //     return $this->render('BloggerBlogBundle:Page:sidebar.html.twig', array(
    //         'latestComments'    => $latestComments,
    //         'tags'              => $tagWeights
    //     ));
    // }

}