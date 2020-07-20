<?php

namespace App\Form;

use App\Entity\Book;
use phpDocumentor\Reflection\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BooksFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                "label" => "Titre",
                "required" => false
            ])

            ->add('NbPages', null, [
                "required" => false
            ])

            ->add("genre", EntityType::class, [
                "class" => Genre::class,
                "choice_label" => "name"
            ])

            ->add('genre', null, [
                "required" => false
            ])

            ->add('resume', null, [
                "required" => false
            ])

            ->add("submit", SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
