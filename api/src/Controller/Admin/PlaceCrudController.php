<?php

namespace App\Controller\Admin;

use App\Entity\Place;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class PlaceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Place::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('sportsman')->setRequired(true),
            // Поле tournamentTable убрано, так как оно устанавливается автоматически
        ];
    }
}