<?php

namespace App\Controller\Admin;

use App\Entity\MyBooks;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MyBooksCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MyBooks::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Name_INV'),
            AssociationField::new('books', 'Books')->OnlyOnIndex(), //Affichage du nombre d'objets dans inventaire dans une colonne
        ];
    }
}