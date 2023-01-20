<?php

namespace App\Controller;

use App\Form\EventsType;
use App\Entity\Events;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class EventController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function event(ManagerRegistry $doctrine): Response
    {
        $events = $doctrine -> getRepository(Events::class)->findAll();

        return $this->render('event/index.html.twig', [
           "events" => $events,
        ]);
    }


    #[Route('/create', name: 'createEvent')]
    public function createEvent(Request $request,ManagerRegistry $doctrine,SluggerInterface $slugger): Response
    {
        $event = new Events();
        $form = $this->createForm(EventsType ::class, $event);

        $event -> setDate(new \DateTime('now'));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $event = $form->getData();

            $image = $form->get('image')->getData();

            if ($image) {
                $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$image->guessExtension();
                try {
                    $image->move(
                        $this->getParameter('image_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $event->setImage($newFilename);
            }
            $data = $doctrine->getManager();
            $data -> persist($event);
            $data ->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('event/create.html.twig', [
           "form" => $form -> createView()
        ]);
    }


    #[Route('/edit/{id}', name: 'editEvent')]
    public function editAction($id,Request $request,ManagerRegistry $doctrine): Response
    {
        $event =  $doctrine -> getRepository(Events::class)->find($id);
        $form = $this->createForm(EventsType ::class, $event);
        $event -> setDate(new \DateTime('now'));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $image = $form->get('image')->getData();

            if ($image) {
                unlink( $this->getParameter('image_directory'). "/".$event->getImage());
                
                $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$image->guessExtension();
                try {
                    $image->move(
                        $this->getParameter('image_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $event->setImage($newFilename);
            }
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $event = $form->getData();
            $event->setCreateDate(new \DateTime('now'));

            $em = $doctrine->getManager();

            $data->persist($event);
            $data->flush();

            return $this->redirectToRoute('index');
        }
        return $this->render('event/edit.html.twig', [
            "form" => $form -> createView()
        ]);
    }


    #[Route('/details/{id}', name: 'detailsEvent')]
    public function deleteEvent($id ,ManagerRegistry $doctrine): Response
    {
        $event = $doctrine ->getRepository(Events::class)->find($id);
        return $this->render('event/details.html.twig', [
           "event" => $event
        ]);
    }


    #[Route('/delete/{id}', name: 'deleteEvent')]
    public function detailsEvent($id, ManagerRegistry $doctrine): Response
    {
        $data = $doctrine ->getManager();
        $events = $doctrine -> getRepository(Events::class)->find($id);
        $data -> remove($events);
        $data -> flush();
        return $this -> redirectToRoute("index");
        
    }


}
