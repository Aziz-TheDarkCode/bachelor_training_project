<?php

namespace App\Controllers;

use App\Models\Animal;
use Doctrine\ORM\EntityManager;

class AnimalController
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function index()
    {
        $animals = $this->entityManager->getRepository(Animal::class)->findAll();
        return view('animal.index', ['animals' => $animals]);
    }

    public function create()
    {
        return view('animal.create');
    }

    public function store()
    {
        $animal = new Animal();
        $animal->setType($_POST['type']);
        $animal->setAge($_POST['age']);
        $animal->setHealth($_POST['health']);

        if (isset($_POST['equipment_id'])) {
            $equipment = $this->entityManager->getReference('App\Models\Equipment', $_POST['equipment_id']);
            $animal->setEquipment($equipment);
        }

        $this->entityManager->persist($animal);
        $this->entityManager->flush();

        return redirect('/animals');
    }

    public function edit($id)
    {
        $animal = $this->entityManager->find(Animal::class, $id);
        return view('animal.edit', ['animal' => $animal]);
    }

    public function update($id)
    {
        $animal = $this->entityManager->find(Animal::class, $id);
        $animal->setType($_POST['type']);
        $animal->setAge($_POST['age']);
        $animal->setHealth($_POST['health']);

        if (isset($_POST['equipment_id'])) {
            $equipment = $this->entityManager->getReference('App\Models\Equipment', $_POST['equipment_id']);
            $animal->setEquipment($equipment);
        }

        $this->entityManager->flush();

        return redirect('/animals');
    }

    public function destroy($id)
    {
        $animal = $this->entityManager->find(Animal::class, $id);
        $this->entityManager->remove($animal);
        $this->entityManager->flush();

        return redirect('/animals');
    }
}
