<?php

namespace DeteccionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DeteccionBundle\Entity\Tred;
use DeteccionBundle\Form\TredType;

/**
 * Tred controller.
 *
 */
class TredController extends Controller
{

    /**
     * Lists all Tred entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DeteccionBundle:Tred')->findAll();

        return $this->render('DeteccionBundle:Tred:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tred entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tred();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tred_show', array('id' => $entity->getId())));
        }

        return $this->render('DeteccionBundle:Tred:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Tred entity.
     *
     * @param Tred $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tred $entity)
    {
        $form = $this->createForm(new TredType(), $entity, array(
            'action' => $this->generateUrl('tred_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tred entity.
     *
     */
    public function newAction()
    {
        $entity = new Tred();
        $form   = $this->createCreateForm($entity);

        return $this->render('DeteccionBundle:Tred:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tred entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Tred')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tred entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DeteccionBundle:Tred:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tred entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Tred')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tred entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DeteccionBundle:Tred:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tred entity.
    *
    * @param Tred $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tred $entity)
    {
        $form = $this->createForm(new TredType(), $entity, array(
            'action' => $this->generateUrl('tred_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tred entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Tred')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tred entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tred_edit', array('id' => $id)));
        }

        return $this->render('DeteccionBundle:Tred:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tred entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DeteccionBundle:Tred')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tred entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tred'));
    }

    /**
     * Creates a form to delete a Tred entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tred_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
