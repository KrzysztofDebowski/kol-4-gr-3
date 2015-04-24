<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Pulawy;
use AppBundle\Form\PulawyType;

/**
 * Pulawy controller.
 *
 * @Route("/admin/pulawy")
 */
class PulawyController extends Controller
{

    /**
     * Lists all Pulawy entities.
     *
     * @Route("/", name="admin_pulawy")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Pulawy')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Pulawy entity.
     *
     * @Route("/", name="admin_pulawy_create")
     * @Method("POST")
     * @Template("AppBundle:Pulawy:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Pulawy();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_pulawy_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Pulawy entity.
     *
     * @param Pulawy $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Pulawy $entity)
    {
        $form = $this->createForm(new PulawyType(), $entity, array(
            'action' => $this->generateUrl('admin_pulawy_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Pulawy entity.
     *
     * @Route("/new", name="admin_pulawy_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Pulawy();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Pulawy entity.
     *
     * @Route("/{id}", name="admin_pulawy_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Pulawy')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pulawy entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Pulawy entity.
     *
     * @Route("/{id}/edit", name="admin_pulawy_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Pulawy')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pulawy entity.');
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
    * Creates a form to edit a Pulawy entity.
    *
    * @param Pulawy $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pulawy $entity)
    {
        $form = $this->createForm(new PulawyType(), $entity, array(
            'action' => $this->generateUrl('admin_pulawy_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Pulawy entity.
     *
     * @Route("/{id}", name="admin_pulawy_update")
     * @Method("PUT")
     * @Template("AppBundle:Pulawy:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Pulawy')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pulawy entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_pulawy_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Pulawy entity.
     *
     * @Route("/{id}", name="admin_pulawy_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Pulawy')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pulawy entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_pulawy'));
    }

    /**
     * Creates a form to delete a Pulawy entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_pulawy_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
