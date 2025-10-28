<?php
// src/Controller/Admin/ProductCrudController.php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Información Básica'),
            TextField::new('name', 'Nombre del Producto'),
            TextareaField::new('description', 'Descripción')->hideOnIndex(),
            ChoiceField::new('category', 'Categoría')
                ->setChoices([
                    'Rolls' => 'rolls',
                    'Combos' => 'combos',
                    'Especialidades' => 'especialidades'
                ])
                ->renderAsBadges(),
            
            FormField::addPanel('Precios por Cantidad'),
            MoneyField::new('price1', 'Precio x1 pieza')
                ->setCurrency('USD')
                ->hideOnIndex(),
            MoneyField::new('price4', 'Precio x4 piezas')
                ->setCurrency('USD')
                ->hideOnIndex(),
            MoneyField::new('price6', 'Precio x6 piezas')
                ->setCurrency('USD')
                ->hideOnIndex(),
            MoneyField::new('price8', 'Precio x8 piezas')
                ->setCurrency('USD')
                ->hideOnIndex(),
            MoneyField::new('price16', 'Precio x16 piezas')
                ->setCurrency('USD')
                ->hideOnIndex(),
            MoneyField::new('price20', 'Precio x20 piezas')
                ->setCurrency('USD')
                ->hideOnIndex(),
            MoneyField::new('price32', 'Precio x32 piezas')
                ->setCurrency('USD')
                ->hideOnIndex(),
            MoneyField::new('price36', 'Precio x36 piezas')
                ->setCurrency('USD')
                ->hideOnIndex(),
            MoneyField::new('price40', 'Precio x40 piezas')
                ->setCurrency('USD')
                ->hideOnIndex(),
            MoneyField::new('price48', 'Precio x48 piezas')
                ->setCurrency('USD')
                ->hideOnIndex(),
            MoneyField::new('price50', 'Precio x50 piezas')
                ->setCurrency('USD')
                ->hideOnIndex(),
            
            FormField::addPanel('Disponibilidad e Imagen'),
            BooleanField::new('stock', 'En Stock'),
            ImageField::new('image', 'Imagen')
                ->setBasePath('images/products/')
                ->setUploadDir('public/images/products/')
                ->setRequired(false),
        ];
    }
}