<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\Vehicle;
use App\Form\VehicleType;
use App\Repository\CustomerRepository;
use App\Repository\VehicleRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/vehicule')]
class VehicleController extends AbstractController
{
    #[Route('/', name: 'app_vehicle_index', methods: ['GET'])]
    public function index(VehicleRepository $vehicleRepository): Response
    {
        return $this->render('vehicle/index.html.twig', [
            'vehicles' => $vehicleRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_vehicle_show', methods: ['GET'])]
    public function show(Vehicle $vehicle): Response
    {
        return $this->render('vehicle/show.html.twig', [
            'vehicle' => $vehicle,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/creer-un-vehicule', name: 'app_vehicle_new', methods: ['GET', 'POST'])]
    public function new(Request $request, VehicleRepository $vehicleRepository): Response
    {
        $vehicle = new Vehicle();
        $form = $this->createForm(VehicleType::class, $vehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vehicleRepository->save($vehicle, true);

            return $this->redirectToRoute('app_vehicle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vehicle/new.html.twig', [
            'vehicle' => $vehicle,
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/edition/{id}', name: 'app_vehicle_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Vehicle $vehicle, VehicleRepository $vehicleRepository): Response
    {
        $form = $this->createForm(VehicleType::class, $vehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vehicleRepository->save($vehicle, true);

            return $this->redirectToRoute('app_vehicle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vehicle/edit.html.twig', [
            'vehicle' => $vehicle,
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/supprimer/{id}', name: 'app_vehicle_delete', methods: ['POST'])]
    public function delete(Request $request, Vehicle $vehicle, VehicleRepository $vehicleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $vehicle->getId(), $request->request->get('_token'))) {
            $vehicleRepository->remove($vehicle, true);
        }

        return $this->redirectToRoute('app_vehicle_index', [], Response::HTTP_SEE_OTHER);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/dispo/{id}', name: 'app_vehicle_dispo', requirements: ['id' => '\d+'])]
    public function modify(Vehicle $vehicle = null, EntityManagerInterface $bdd): Response
    {
        if (!$vehicle) {
            return $this->redirectToRoute('app_vehicle_index');
        }

        if ($vehicle->isIsAvailable() == true) {
            $vehicle->setIsAvailable(false);
        } else {
            $vehicle->setIsAvailable(true);
        }
        $bdd->persist($vehicle, true);
        $bdd->flush();

        return $this->redirectToRoute('app_vehicle_index');
    }

    #[Route('/location/{id}', name: 'app_vehicle_booking', requirements: ['id' => '\d+'])]
    public function booking(VehicleRepository $vehicleRepository, CustomerRepository $customerRepository, EntityManagerInterface $bdd): Response
    {
        $vehicle = new Vehicle();
        $customer = new Customer();

        if ($vehicle->isIsAvailable() == true) {
            $vehicle->setIsAvailable(false);
            $vehicle->setCustomer($customerRepository->getId());
            $vehicleRepository->save($vehicle, true);
            $customer->setVehicle($vehicle->getId());
            $customerRepository->save($customer, true);
            return $this->redirectToRoute('app_vehicle_index');
        } else {
            if ($vehicle->getId() == $customer->getVehicle()) {
                $vehicle->setIsAvailable(true);
                $vehicle->setCustomer(null);
                $vehicleRepository->save($vehicle, true);
                $customer->setVehicle(null);
                $customerRepository->save($customer, true);
                return $this->redirectToRoute('app_vehicle_index');
            } else {
                return $this->redirectToRoute('app_vehicle_index');
            }
        }

        return $this->redirectToRoute('app_vehicle_index');
    }
}
