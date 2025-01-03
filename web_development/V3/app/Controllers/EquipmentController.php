<?php

namespace App\Controllers;

use App\Models\Equipment;
use Doctrine\ORM\EntityManager;

class EquipmentController
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function index()
    {
        $equipment = $this->entityManager->getRepository(Equipment::class)->findAll();
        return view('equipment.index', ['equipment' => $equipment]);
    }

    public function create()
    {
        return view('equipment.create');
    }

    public function store()
    {
        $equipment = new Equipment();
        $equipment->setName($_POST['name']);
        $equipment->setCondition($_POST['condition']);
        $equipment->setAvailable(isset($_POST['available']));

        $this->entityManager->persist($equipment);
        $this->entityManager->flush();

        return redirect('/equipment');
    }

    public function edit($id)
    {
        $equipment = $this->entityManager->find(Equipment::class, $id);
        return view('equipment.edit', ['equipment' => $equipment]);
    }

    public function update($id)
    {
        $equipment = $this->entityManager->find(Equipment::class, $id);
        $equipment->setName($_POST['name']);
        $equipment->setCondition($_POST['condition']);
        $equipment->setAvailable(isset($_POST['available']));

        $this->entityManager->flush();

        return redirect('/equipment');
    }

    public function destroy($id)
    {
        $equipment = $this->entityManager->find(Equipment::class, $id);
        $this->entityManager->remove($equipment);
        $this->entityManager->flush();

        return redirect('/equipment');
    }
}
