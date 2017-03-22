<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Book controller.
 *
 * @Route("admin/book")
 */
class BookController extends Controller {

    /**
     * Lists all book entities.
     *
     * @Route("/", name="admin_book_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $books = $em->getRepository('AppBundle:Book')->findAll();

        return $this->render('admin/book/index.html.twig', array(
                    'books' => $books,
        ));
    }

    /**
     * Creates a new book entity.
     *
     * @Route("/new", name="admin_book_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $book = new Book();
        $form = $this->createForm('AppBundle\Form\BookType', $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /* @var $file \Symfony\Component\HttpFoundation\File\UploadedFile */
            $file = $book->getImage();

            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            $file->move($this->getParameter('upload_dir'), $fileName);

            $book->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush($book);

            return $this->redirectToRoute('admin_book_show', array('id' => $book->getId()));
        }

        return $this->render('admin/book/new.html.twig', array(
                    'book' => $book,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a book entity.
     *
     * @Route("/{id}", name="admin_book_show")
     * @Method("GET")
     */
    public function showAction(Book $book) {
        $deleteForm = $this->createDeleteForm($book);

        return $this->render('admin/book/show.html.twig', array(
                    'book' => $book,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing book entity.
     *
     * @Route("/{id}/edit", name="admin_book_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Book $book) {
        $deleteForm = $this->createDeleteForm($book);

        $image = new File($this->getParameter('upload_dir') . '/' . $book->getImage());
        $book->setImage($image);
        
        $editForm = $this->createForm('AppBundle\Form\BookType', $book);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_book_edit', array('id' => $book->getId()));
        }

        return $this->render('admin/book/edit.html.twig', array(
                    'book' => $book,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView()
        ));
    }

    /**
     * Deletes a book entity.
     *
     * @Route("/{id}", name="admin_book_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Book $book) {
        $form = $this->createDeleteForm($book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($book);
            $em->flush($book);
        }

        return $this->redirectToRoute('admin_book_index');
    }

    /**
     * Creates a form to delete a book entity.
     *
     * @param Book $book The book entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Book $book) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_book_delete', array('id' => $book->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
