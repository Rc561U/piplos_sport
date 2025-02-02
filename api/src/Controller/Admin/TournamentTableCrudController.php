<?php

namespace App\Controller\Admin;

use App\Entity\Place;
use App\Entity\TournamentTable;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

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
                ->setEntryIsComplex()
                ->useEntryCrudForm(PlaceCrudController::class) // Ensure this points to the correct controller
                ->setRequired(true) // Set required if you want at least one place
                ->setFormTypeOptions([
                    'by_reference' => false, // Important for managing collections
                ]),
        ];
    }
}

