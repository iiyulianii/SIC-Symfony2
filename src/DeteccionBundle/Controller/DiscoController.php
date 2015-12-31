<?php

namespace DeteccionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DeteccionBundle\Entity\Disco;
use DeteccionBundle\Form\DiscoType;

/**
 * Disco controller.
 *
 */
class DiscoController extends Controller
{

    /**
     * Lists all Disco entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DeteccionBundle:Disco')->findAll();

        return $this->render('DeteccionBundle:Disco:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Disco entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Disco();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('disco_show', array('id' => $entity->getId())));
        }

        return $this->render('DeteccionBundle:Disco:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Disco entity.
     *
     * @param Disco $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Disco $entity)
    {
        $form = $this->createForm(new DiscoType(), $entity, array(
            'action' => $this->generateUrl('disco_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Disco entity.
     *
     */
    public function newAction()
    {
        $entity = new Disco();
        $form   = $this->createCreateForm($entity);

        return $this->render('DeteccionBundle:Disco:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Disco entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Disco')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Disco entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DeteccionBundle:Disco:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Disco entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Disco')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Disco entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DeteccionBundle:Disco:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Disco entity.
    *
    * @param Disco $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Disco $entity)
    {
        $form = $this->createForm(new DiscoType(), $entity, array(
            'action' => $this->generateUrl('disco_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Disco entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Disco')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Disco entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('disco_edit', array('id' => $id)));
        }

        return $this->render('DeteccionBundle:Disco:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Disco entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DeteccionBundle:Disco')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Disco entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('disco'));
    }

    /**
     * Creates a form to delete a Disco entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('disco_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
