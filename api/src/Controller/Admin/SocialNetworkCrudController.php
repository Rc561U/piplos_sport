<?php

namespace App\Controller\Admin;

use App\Entity\SocialNetwork;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class SocialNetworkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SocialNetwork::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('linkName', 'Social Network Name'),
            TextField::new('linkUrl', 'URL'),
            TextField::new('worldAthleticLink', 'World Athletics Link')->hideOnIndex(),
        ];
    }
}
