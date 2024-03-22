<?php

namespace App\Controller;

use App\Entity\Job;
use App\Entity\Company;
use App\Repository\CategoryRepository;
use App\Repository\CompanyRepository;
use App\Repository\JobRepository;
use App\Repository\JobTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{
    #[Route('/jobs', name: 'app_jobs')]
    public function index(JobRepository $jobRepository, CategoryRepository $categoryRepository,CompanyRepository $companyRepository, Request $request): Response
    
    {
        $category = $request->query->get('category');
        $company = $request->query->get('company');
       

        if ($category) {
            $jobs = $jobRepository->findByCategory($category);
        } elseif($company) {
            $jobs = $jobRepository->findByCompany($company);
        }
          
          
         else {
            $jobs = $jobRepository->findAll();
        }
        
        


        $categories = $categoryRepository->findAll();
        $companies = $companyRepository->findAll();
       

        return $this->render('job/index.html.twig', [
            'jobs' => $jobs,
            'categories' => $categories,
            'companies' => $companies,
            'current_category' => $category,
            'current_company' => $company,
           
        ]);
    }


    #[Route('/jobs/{id}', name: 'app_job_show')]
    public function show(
        Job $job,
        Request $request,
        EntityManagerInterface $entityManager,
        Security $security,
        SessionInterface $session
    ): Response {
        return $this->render('job/show.html.twig', [
            'job' => $job,
        ]);
    }
}
