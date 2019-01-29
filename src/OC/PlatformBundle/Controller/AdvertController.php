<?php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse; 
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{
    public function indexAction($page)
    {
        //return $this->render('OCPlatformBundle:Default:index.html.twig');
        //return new Response("Notre propre Hello World !");
        //$content = $this->get('templating')->render('OCPlatformBundle:Advert:index.html.twig');
        
        /*
        $content = $this
            ->get('templating')
            ->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => 'coco'))
        ;    
        return new Response($content);
        */        

        /*
        // On veut avoir l'URL de l'annonce d'id 5.
        $url = $this->get('router')->generate(
            'oc_platform_view', // 1er argument : le nom de la route
            array('id' => 10)    // 2e argument : les valeurs des paramètres
        );
        // $url vaut « /platform/advert/5 »        
        return new Response("L'URL de l'annonce d'id 10 est : ".$url);
        */
        
        /*
        $url = $this->get('router')->generate(
            'oc_platform_home', 
            array(), 
            UrlGeneratorInterface::ABSOLUTE_URL
        );
        return new Response("L'URL de l'annonce est : ".$url);
        */
        
        /*
        // Méthode longue
        $url = $this->get('router')->generate('oc_platform_home');
        // Méthode courte
        //$url = $this->generateUrl('oc_platform_home');
        return new Response("L'URL de l'annonce est : ".$url);  
        */

        // On ne sait pas combien de pages il y a
        // Mais on sait qu'une page doit être supérieure ou égale à 1
        if ($page < 1) {
            // On déclenche une exception NotFoundHttpException, cela va afficher    
            // une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs)    
            throw new NotFoundHttpException('Page "'.$page.'" inexistante.');    
        }  
        // Ici, on récupérera la liste des annonces, puis on la passera au template 
        // Mais pour l'instant, on ne fait qu'appeler le template    
        return $this->render('OCPlatformBundle:Advert:index.html.twig');

    }

    // La route fait appel à OCPlatformBundle:Advert:view,
    // on doit donc définir la méthode viewAction.
    // On donne à cette méthode l'argument $id, pour
    // correspondre au paramètre {id} de la route
    // On injecte la requête dans les arguments de la méthode
    public function viewAction($id, Request $request)
    {
        // $id vaut 5 si l'on a appelé l'URL /platform/advert/5

        // Ici, on récupèrera depuis la base de données
        // l'annonce correspondant à l'id $id.
        // Puis on passera l'annonce à la vue pour
        // qu'elle puisse l'afficher
        //return new Response("Affichage de l'annonce d'id : ".$id);

        /*
        $content = $this
            ->get('templating')
            ->render('OCPlatformBundle:Advert:index.html.twig', array('advert_id' => $id, 'redirect_id' => $id + 5))
        ;
        return new Response($content);
        */

        //return new Response("Affichage de l'annonce d'id : ".$id."<br/>Affichage de la requete : ".$request);

        /*
        // On récupère notre paramètre tag
        $tag = $request->query->get('tag');
        return new Response( 
            "Affichage de l'annonce d'id : ".$id.", avec le tag : ".$tag 
        );
        */

        /*
        if ($request->isMethod('POST'))
        {
            // Un formulaire a été envoyé, on peut le traiter ici
        }

        if ($request->isXmlHttpRequest())
        {
            // C'est une requête AJAX, retournons du JSON, par exemple
        }
        */

        /*
        // On crée la réponse sans lui donner de contenu pour le moment
        $response = new Response();
        // On définit le contenu
        $response->setContent("Ceci est une page d'erreur 404");
        // On définit le code HTTP à « Not Found » (erreur 404)
        $response->setStatusCode(Response::HTTP_NOT_FOUND);
        // On retourne la réponse
        return $response;
        */

        /*
        // On récupère notre paramètre tag
        $tag = $request->query->get('tag');   
        // On utilise le raccourci : il crée un objet Response
        // Et lui donne comme contenu le contenu du template
        return $this->get('templating')->renderResponse(
            'OCPlatformBundle:Advert:view.html.twig',
            array('id'  => $id, 'tag' => $tag)
        );
        */

        /*
        // On récupère notre paramètre tag
        $tag = $request->query->get('tag');
        return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
            'id'  => $id,
            'tag' => $tag,
        ));
        */

        /*
        $url = $this->get('router')->generate('oc_platform_home');
        return new RedirectResponse($url);
        
        $url = $this->get('router')->generate('oc_platform_home');
        return $this->redirect($url);
        
        return $this->redirectToRoute('oc_platform_home');
        */

        /*
        // Créons nous-mêmes la réponse en JSON, grâce à la fonction json_encode()
        $response = new Response(json_encode(array('id' => $id)));
        // Ici, nous définissons le Content-type pour dire au navigateur
        // que l'on renvoie du JSON et non du HTML
        $response->headers->set('Content-Type', 'application/json');
        return $response;
        */

        //return new JsonResponse(array('id' => $id));

        /*
        // Récupération de la session
        $session = $request->getSession();
        // On récupère le contenu de la variable user_id
        $userId = $session->get('user_id');
        // On définit une nouvelle valeur pour cette variable user_id
        $session->set('user_id', 91);
        // On n'oublie pas de renvoyer une réponse
        return new Response("<body>Je suis une page de test, je n'ai rien à dire</body>");
        */

        // Ici, on récupérera l'annonce correspondante à l'id $id
        return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
            'id' => $id, 
            'tag'=> $request->query->get('tag')   
        ));

    }

    public function addAction(Request $request)
    {
        /*
        $session = $request->getSession();
        // Bien sûr, cette méthode devra réellement ajouter l'annonce
        // Mais faisons comme si c'était le cas
        $session->getFlashBag()->add('info', 'Annonce bien enregistrée');
        // Le « flashBag » est ce qui contient les messages flash dans la session
        // Il peut bien sûr contenir plusieurs messages :
        $session->getFlashBag()->add('info', 'Oui oui, elle est bien enregistrée !');
        // Puis on redirige vers la page de visualisation de cette annonce
        return $this->redirectToRoute('oc_platform_view', array('id' => 5, 'tag'=> $request->query->get('tag')));
        */

        // La gestion d'un formulaire est particulière, mais l'idée est la suivante :
        // Si la requête est en POST, c'est que le visiteur a soumis le formulaire
        if ($request->isMethod('POST')) {
            // Ici, on s'occupera de la création et de la gestion du formulaire
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.'); 
            // Puis on redirige vers la page de visualisation de cettte annonce    
            return $this->redirectToRoute('oc_platform_view', array('id' => 5));    
        }
        // Si on n'est pas en POST, alors on affiche le formulaire    
        return $this->render('OCPlatformBundle:Advert:add.html.twig');
        
    }

    public function editAction($id, Request $request)
    {
        // Ici, on récupérera l'annonce correspondante à $id
        // Même mécanisme que pour l'ajout
        if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');
            return $this->redirectToRoute('oc_platform_view', array('id' => 5));
        }
        return $this->render('OCPlatformBundle:Advert:edit.html.twig');

    }


    public function deleteAction($id)
    {
        // Ici, on récupérera l'annonce correspondant à $id
        // Ici, on gérera la suppression de l'annonce en question
        return $this->render('OCPlatformBundle:Advert:delete.html.twig');

    }

    // On récupère tous les paramètres en arguments de la méthode
    public function viewSlugAction($slug, $year, $_format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au slug '".$slug."'
            , créée en ".$year." et au format ".$_format."."
        );
    }
}