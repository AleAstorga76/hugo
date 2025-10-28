<?php
// src/Controller/Admin/CostCrudController.php

namespace App\Controller\Admin;

use App\Entity\Cost;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;  // ← Cambiar esto
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cost::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('description', 'Descripción')
                ->setRequired(true),
            NumberField::new('amount', 'Monto ($)')  // ← Usar NumberField en lugar de MoneyField
                ->setNumDecimals(2)
                ->setRequired(true),
            DateTimeField::new('costDate', 'Fecha del Costo')
                ->setFormat('dd/MM/yyyy HH:mm')
                ->setRequired(true),
            ChoiceField::new('category', 'Categoría')
                ->setChoices([
                    'Ingredientes' => 'ingredientes',
                    'Personal' => 'personal',
                    'Alquiler' => 'alquiler',
                    'Servicios' => 'servicios',
                    'Marketing' => 'marketing',
                    'Otros' => 'otros',
                ])
                ->setRequired(true),
            TextareaField::new('notes', 'Notas')
                ->hideOnIndex(),
        ];
    }
}