<?php
// src/Controller/Admin/ProductCrudController.php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Producto')
            ->setEntityLabelInPlural('Productos')
            ->setPageTitle('index', 'Gestión de Productos');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name', 'Nombre'),
            TextareaField::new('description', 'Descripción'),
            ChoiceField::new('category', 'Categoría')
                ->setChoices([
                    'Roll' => 'roll',
                    'Combo' => 'combo',
                ]),
            
            // SOLO campos que existen en tu Entity
            NumberField::new('price4', 'Precio x4')->setNumDecimals(2),
            NumberField::new('price8', 'Precio x8')->setNumDecimals(2),
            NumberField::new('price16', 'Precio 16p')->setNumDecimals(2),
            NumberField::new('price20', 'Precio 20p')->setNumDecimals(2),
            NumberField::new('price32', 'Precio 32p')->setNumDecimals(2),
            NumberField::new('price36', 'Precio 36p')->setNumDecimals(2),
            NumberField::new('price40', 'Precio 40p')->setNumDecimals(2),
            NumberField::new('price48', 'Precio 48p')->setNumDecimals(2),
            NumberField::new('price50', 'Precio 50p')->setNumDecimals(2),
            
            ImageField::new('image', 'Imagen')
                ->setBasePath('/images/products')
                ->setUploadDir('public/images/products'),
        ];
    }
}