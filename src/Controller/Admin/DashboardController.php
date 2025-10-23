<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hugo Admin')
            ->setFaviconPath('favicon.ico')
            ->setTextDirection('ltr')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-chart-line');
        
        // Sección del Menú del Restaurante
        yield MenuItem::section('🍣 Gestión del Menú');
        yield MenuItem::linkToCrud('Productos', 'fas fa-utensils', Product::class);
        
        // Sección de Usuarios
        yield MenuItem::section('👥 Gestión de Usuarios');
        yield MenuItem::linkToCrud('Usuarios', 'fas fa-users', User::class);
        
        // Otros enlaces
        yield MenuItem::linkToUrl('🌐 Ver Sitio Web', 'fas fa-external-link-alt', '/');
        yield MenuItem::linkToLogout('🚪 Salir', 'fas fa-sign-out-alt');
    }
}