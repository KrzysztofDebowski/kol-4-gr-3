<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Berlin;
use AppBundle\Form\BerlinType;

/**
 * Berlin controller.
 *
 * @Route("/admin/berlin")
 */
class BerlinController extends Controller
{

    /**
     * Lists all Berlin entities.
     *
     * @Route("/", name="admin_berlin")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Berlin')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Berlin entity.
     *
     * @Route("/", name="admin_berlin_create")
     * @Method("POST")
     * @Template("AppBundle:Berlin:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Berlin();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_berlin_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Berlin entity.
     *
     * @param Berlin $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Berlin $entity)
    {
        $form = $this->createForm(new BerlinType(), $entity, array(
            'action' => $this->generateUrl('admin_berlin_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Berlin entity.
     *
     * @Route("/new", name="admin_berlin_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Berlin();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Berlin entity.
     *
     * @Route("/{id}", name="admin_berlin_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Berlin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Berlin entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Berlin entity.
     *
     * @Route("/{id}/edit", name="admin_berlin_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Berlin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Berlin entity.');
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
    * Creates a form to edit a Berlin entity.
    *
    * @param Berlin $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Berlin $entity)
    {
        $form = $this->createForm(new BerlinType(), $entity, array(
            'action' => $this->generateUrl('admin_berlin_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Berlin entity.
     *
     * @Route("/{id}", name="admin_berlin_update")
     * @Method("PUT")
     * @Template("AppBundle:Berlin:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Berlin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Berlin entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_berlin_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Berlin entity.
     *
     * @Route("/{id}", name="admin_berlin_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Berlin')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Berlin entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_berlin'));
    }

    /**
     * Creates a form to delete a Berlin entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_berlin_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
