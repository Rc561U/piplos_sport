<?php

namespace App\Controller\Admin;

use App\Entity\Competition;
use App\Entity\SocialNetwork;
use App\Entity\Sportsman;
use App\Entity\TournamentTable;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardCMainController extends AbstractDashboardController
{
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin Panel');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Competitions');
        yield MenuItem::linkToCrud('All Competitions', 'fas fa-trophy', Competition::class);

        yield MenuItem::section('Social Networks');
        yield MenuItem::linkToCrud('All Social Networks', 'fas fa-share-alt', SocialNetwork::class);

        yield MenuItem::section('Sportsmen');
        yield MenuItem::linkToCrud('All Sportsmen', 'fas fa-running', Sportsman::class);

        yield MenuItem::section('Tournament Tables');
        yield MenuItem::linkToCrud('All Tournaments', 'fas fa-table', TournamentTable::class);
    }
}
