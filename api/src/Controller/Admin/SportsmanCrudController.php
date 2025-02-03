<?php

namespace App\Controller\Admin;

use App\Entity\Sportsman;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SportsmanCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Sportsman::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('fullName'),
            DateTimeField::new('birthday'),
            ChoiceField::new('sex')
                ->setChoices([
                    'Male' => 'male',
                    'Female' => 'female',
                ])
                ->renderExpanded()
                ->renderAsBadges([
                    'male' => 'success',
                    'female' => 'warning',
                ]),
            TextField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),

            ImageField::new('imageName')
                ->setBasePath('/images/athletes')
                ->onlyOnIndex(),
            CollectionField::new('socialLinks')
                ->useEntryCrudForm(SocialNetworkCrudController::class)
                ->setEntryIsComplex()
        ];
    }
}
