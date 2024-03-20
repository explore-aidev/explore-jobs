<?php

namespace App\Controller\Admin;

use App\Entity\Job;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class JobCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Job::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextField::new('country'),
            TextField::new('city'),
            BooleanField::new('remote_allowed'),
            MoneyField::new('salary_range')->setCurrency('EUR'),
            MoneyField::new('salary_max')->setCurrency('EUR'),
            TextEditorField::new('description'),
            AssociationField::new('category'),
            AssociationField::new('company'),
            AssociationField::new('job_types'),
      
        ];
    }
    
}
