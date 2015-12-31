<?php

namespace DeteccionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DeteccionBundle\Entity\Conf_sistema;
use DeteccionBundle\Form\Conf_sistemaType;

/**
 * Conf_sistema controller.
 *
 */
class Conf_sistemaController extends Controller
{

    /**
     * Lists all Conf_sistema entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DeteccionBundle:Conf_sistema')->findAll();

        return $this->render('DeteccionBundle:Conf_sistema:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Conf_sistema entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Conf_sistema();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('conf_sistema_show', array('id' => $entity->getId())));
        }

        return $this->render('DeteccionBundle:Conf_sistema:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Conf_sistema entity.
     *
     * @param Conf_sistema $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Conf_sistema $entity)
    {
        $form = $this->createForm(new Conf_sistemaType(), $entity, array(
            'action' => $this->generateUrl('conf_sistema_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Conf_sistema entity.
     *
     */
    public function newAction()
    {
        $entity = new Conf_sistema();
        $form   = $this->createCreateForm($entity);

        return $this->render('DeteccionBundle:Conf_sistema:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Conf_sistema entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Conf_sistema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Conf_sistema entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DeteccionBundle:Conf_sistema:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Conf_sistema entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Conf_sistema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Conf_sistema entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DeteccionBundle:Conf_sistema:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Conf_sistema entity.
    *
    * @param Conf_sistema $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Conf_sistema $entity)
    {
        $form = $this->createForm(new Conf_sistemaType(), $entity, array(
            'action' => $this->generateUrl('conf_sistema_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Conf_sistema entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Conf_sistema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Conf_sistema entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('conf_sistema_edit', array('id' => $id)));
        }

        return $this->render('DeteccionBundle:Conf_sistema:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Conf_sistema entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DeteccionBundle:Conf_sistema')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Conf_sistema entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('conf_sistema'));
    }

    /**
     * Creates a form to delete a Conf_sistema entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('conf_sistema_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
