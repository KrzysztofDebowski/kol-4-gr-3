<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\olsztyn;
use AppBundle\Form\olsztynType;

/**
 * olsztyn controller.
 *
 * @Route("/admin/olsztyn")
 */
class olsztynController extends Controller
{

    /**
     * Lists all olsztyn entities.
     *
     * @Route("/", name="admin_olsztyn")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:olsztyn')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new olsztyn entity.
     *
     * @Route("/", name="admin_olsztyn_create")
     * @Method("POST")
     * @Template("AppBundle:olsztyn:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new olsztyn();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_olsztyn_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a olsztyn entity.
     *
     * @param olsztyn $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(olsztyn $entity)
    {
        $form = $this->createForm(new olsztynType(), $entity, array(
            'action' => $this->generateUrl('admin_olsztyn_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new olsztyn entity.
     *
     * @Route("/new", name="admin_olsztyn_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new olsztyn();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a olsztyn entity.
     *
     * @Route("/{id}", name="admin_olsztyn_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:olsztyn')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find olsztyn entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing olsztyn entity.
     *
     * @Route("/{id}/edit", name="admin_olsztyn_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:olsztyn')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find olsztyn entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a olsztyn entity.
    *
    * @param olsztyn $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(olsztyn $entity)
    {
        $form = $this->createForm(new olsztynType(), $entity, array(
            'action' => $this->generateUrl('admin_olsztyn_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing olsztyn entity.
     *
     * @Route("/{id}", name="admin_olsztyn_update")
     * @Method("PUT")
     * @Template("AppBundle:olsztyn:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:olsztyn')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find olsztyn entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_olsztyn_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a olsztyn entity.
     *
     * @Route("/{id}", name="admin_olsztyn_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:olsztyn')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find olsztyn entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_olsztyn'));
    }

    /**
     * Creates a form to delete a olsztyn entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_olsztyn_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
