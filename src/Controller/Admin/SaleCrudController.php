<?php
// src/Controller/Admin/SaleCrudController.php

namespace App\Controller\Admin;

use App\Entity\Sale;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SaleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Sale::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('product', 'Producto')
                ->setRequired(true),
            IntegerField::new('quantity', 'Cantidad')
                ->setRequired(true),
            MoneyField::new('unitPrice', 'Precio Unitario')
                ->setCurrency('USD')
                ->setRequired(true),
            MoneyField::new('totalAmount', 'Total')
                ->setCurrency('USD')
                ->setRequired(true)
                ->onlyOnIndex(),
            DateTimeField::new('saleDate', 'Fecha de Venta')
                ->setFormat('dd/MM/yyyy HH:mm')
                ->setRequired(true),
            TextareaField::new('notes', 'Notas')
                ->hideOnIndex(),
        ];
    }
}