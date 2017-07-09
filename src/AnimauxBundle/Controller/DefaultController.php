<?php

namespace AnimauxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use AnimauxBundle\Entity\Animal;
use AnimauxBundle\Form\AnimalType;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {
 /* -------------------------
  * Méthode Lister()
  * ------------------------- */

 public function indexAction() {
  $em = $this->getDoctrine()->getEntityManager();
  $animaux = $em->getRepository("AnimauxBundle:Animal")->findAll();

  return $this->render('AnimauxBundle:Default:index.html.twig', array(
              'animaux' => $animaux,
  ));
 }

 /* -------------------------
  * Méthode Ajouter()
  * ------------------------- */

 public function ajouterAction() {

  $em = $this->getDoctrine()->getEntityManager();

  $a = new Animal();
  $form = $this->createForm(new AnimalType(), $a);

  $request = $this->getRequest();
  if ($request->isMethod('post')) {
   $form->bind($request);

   if ($form->isValid()) {
    $a = $form->getData();
    $em->persist($a);
    $em->flush();

    return $this->redirect($this->generateUrl("tuto_animaux_homepage"));

    /* var_dump($form);exit(); */
   }
  }

  return $this->render("AnimauxBundle:Default:ajouter.html.twig", array(
              'form' => $form->createView(),
  ));
 }

 /* -------------------------
  * Méthode Editer()
  * ------------------------- */

 public function editerAction(Animal $animal) {

  $em = $this->getDoctrine()->getEntityManager();
  $form = $this->createForm(new AnimalType(), $animal);
  $request = $this->getRequest();

  if ($request->isMethod('post')) {
   $form->bind($request);

   if ($form->isValid()) {
    $a = $form->getData();
    $em->persist($animal);
    $em->flush();

    return $this->redirect($this->generateUrl("tuto_animaux_voir", array(
                        'id' => $animal->getId(),
    )));
   }
  }

  return $this->render("AnimauxBundle:Default:editer.html.twig", array(
              'id' => $animal->getId(),
              'form' => $form->createView(),
  ));
 }

 /* -------------------------
  * Méthode Supprimer()
  * ------------------------- */

 public function supprimerAction(Animal $animal) {
  $em = $this->getDoctrine()->getEntityManager();
  $em->remove($animal);
  $em->flush();

  return $this->redirect($this->generateUrl('tuto_animaux_homepage'));
 }

 /* -------------------------
  * Méthode Voir()
  * ------------------------- */

 public function voirAction(Animal $animal) { /* $id */

  /* $em = $this->getDoctrine()->getEntityManager();

    try {
    $animal = $em->getRepository("AnimauxBundle:Animal")->findOneById($id);
    } catch(\Exception $e) {
    return new Response("L'animal n'existe pas!",404);
    } */

  return $this->render('AnimauxBundle:Default:voir.html.twig', array(
              'id' => $animal->getId(),
              'animal' => $animal,
  ));
 }

}
