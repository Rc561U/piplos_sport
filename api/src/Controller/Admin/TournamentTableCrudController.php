<?php

namespace App\Controller\Admin;

use App\Entity\TournamentTable;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

class TournamentTableCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TournamentTable::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('competition')->setRequired(false),
            CollectionField::new('places')
                ->useEntryCrudForm(PlaceCrudController::class)
                ->setEntryIsComplex()
                ->setFormTypeOptions([
                    'by_reference' => false, // Важно для корректной работы коллекций
                ]),
        ];
    }
}
