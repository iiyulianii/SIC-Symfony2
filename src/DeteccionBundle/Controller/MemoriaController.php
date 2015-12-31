<?php

namespace DeteccionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DeteccionBundle\Entity\Memoria;
use DeteccionBundle\Form\MemoriaType;

/**
 * Memoria controller.
 *
 */
class MemoriaController extends Controller
{

    /**
     * Lists all Memoria entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DeteccionBundle:Memoria')->findAll();

        return $this->render('DeteccionBundle:Memoria:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Memoria entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Memoria();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('memoria_show', array('id' => $entity->getId())));
        }

        return $this->render('DeteccionBundle:Memoria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Memoria entity.
     *
     * @param Memoria $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Memoria $entity)
    {
        $form = $this->createForm(new MemoriaType(), $entity, array(
            'action' => $this->generateUrl('memoria_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Memoria entity.
     *
     */
    public function newAction()
    {
        $entity = new Memoria();
        $form   = $this->createCreateForm($entity);

        return $this->render('DeteccionBundle:Memoria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Memoria entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Memoria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Memoria entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DeteccionBundle:Memoria:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Memoria entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Memoria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Memoria entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DeteccionBundle:Memoria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Memoria entity.
    *
    * @param Memoria $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Memoria $entity)
    {
        $form = $this->createForm(new MemoriaType(), $entity, array(
            'action' => $this->generateUrl('memoria_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Memoria entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Memoria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Memoria entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('memoria_edit', array('id' => $id)));
        }

        return $this->render('DeteccionBundle:Memoria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Memoria entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DeteccionBundle:Memoria')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Memoria entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('memoria'));
    }

    /**
     * Creates a form to delete a Memoria entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('memoria_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
