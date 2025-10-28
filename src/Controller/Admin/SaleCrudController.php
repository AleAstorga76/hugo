<?php
// src/Controller/Admin/SaleCrudController.php

namespace App\Controller\Admin;

use App\Entity\Sale;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;  // ← Cambiar esto también
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

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
            ChoiceField::new('quantity', 'Cantidad de Piezas')
                ->setChoices([
                    '1 pieza' => 1,
                    '4 piezas' => 4,
                    '6 piezas' => 6,
                    '8 piezas' => 8,
                    '16 piezas' => 16,
                    '20 piezas' => 20,
                    '32 piezas' => 32,
                    '36 piezas' => 36,
                    '40 piezas' => 40,
                    '48 piezas' => 48,
                    '50 piezas' => 50,
                ])
                ->setRequired(true),
            NumberField::new('unitPrice', 'Precio Unitario ($)')  // ← NumberField aquí también
                ->setNumDecimals(2)
                ->setRequired(true)
                ->hideOnIndex(),
            NumberField::new('totalAmount', 'Total ($)')  // ← Y aquí
                ->setNumDecimals(2)
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