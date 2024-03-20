<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Company;
use App\Entity\Job;
use App\Entity\JobType;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(CategoryCrudController::class)->generateUrl());
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Jobiz');
    }

    public function configureMenuItems(): iterable
    {
         yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
         yield MenuItem::linkToCrud('Category', 'fas fa-list', Category::class);
         yield MenuItem::linkToCrud('Company', 'fas fa-list', Company::class);
         yield MenuItem::linkToCrud('Job', 'fas fa-list', Job::class);
        yield MenuItem::linkToCrud('JobType', 'fas fa-list', JobType::class);
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);

    }
}
