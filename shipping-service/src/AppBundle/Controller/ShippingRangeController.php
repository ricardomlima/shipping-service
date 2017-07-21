<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ShippingRange;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Shippingrange controller.
 *
 * @Route("shippingrange")
 */
class ShippingRangeController extends Controller
{
    /**
     * Lists all shippingRange entities.
     *
     * @Route("/", name="shippingrange_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $shippingRanges = $em->getRepository('AppBundle:ShippingRange')->findAll();

        return $this->render('shippingrange/index.html.twig', array(
            'shippingRanges' => $shippingRanges,
        ));
    }

    /**
     * Creates a new shippingRange entity.
     *
     * @Route("/new", name="shippingrange_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $shippingRange = new Shippingrange();
        $form = $this->createForm('AppBundle\Form\ShippingRangeType', $shippingRange);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($shippingRange);
            $em->flush();

            return $this->redirectToRoute('shippingrange_show', array('id' => $shippingRange->getId()));
        }

        return $this->render('shippingrange/new.html.twig', array(
            'shippingRange' => $shippingRange,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a shippingRange entity.
     *
     * @Route("/{id}", name="shippingrange_show")
     * @Method("GET")
     */
    public function showAction(ShippingRange $shippingRange)
    {
        $deleteForm = $this->createDeleteForm($shippingRange);

        return $this->render('shippingrange/show.html.twig', array(
            'shippingRange' => $shippingRange,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing shippingRange entity.
     *
     * @Route("/{id}/edit", name="shippingrange_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ShippingRange $shippingRange)
    {
        $deleteForm = $this->createDeleteForm($shippingRange);
        $editForm = $this->createForm('AppBundle\Form\ShippingRangeType', $shippingRange);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('shippingrange_edit', array('id' => $shippingRange->getId()));
        }

        return $this->render('shippingrange/edit.html.twig', array(
            'shippingRange' => $shippingRange,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a shippingRange entity.
     *
     * @Route("/{id}", name="shippingrange_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ShippingRange $shippingRange)
    {
        $form = $this->createDeleteForm($shippingRange);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($shippingRange);
            $em->flush();
        }

        return $this->redirectToRoute('shippingrange_index');
    }

    /**
     * Creates a form to delete a shippingRange entity.
     *
     * @param ShippingRange $shippingRange The shippingRange entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ShippingRange $shippingRange)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('shippingrange_delete', array('id' => $shippingRange->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
