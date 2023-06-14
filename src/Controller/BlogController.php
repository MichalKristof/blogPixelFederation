<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Entity\Comment;
use App\Form\BlogFormType;
use App\Repository\BlogRepository;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    private $em;
    private $blogRepository;

    public function __construct(BlogRepository $blogRepository, EntityManagerInterface $em)
    {
        $this->blogRepository = $blogRepository;

        $this->em = $em;
    }
    #[Route('/', name: 'app_blog')]
    public function index(BlogRepository $blogRepository,CommentRepository $commentRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $blogRepository->paginationQuery(),
            $request->query->getInt('page', 1),
            Blog::NUM_ITEMS,
        );

        return $this->render('blog/index.html.twig', [
            'pagination' => $pagination,
            'totalCount' => $pagination->getTotalItemCount(),
        ]);
    }

    #[Route('/blog/create', name: 'app_blog_create')]
    public function create(Request $request): Response
    {
        $blog = new Blog();

        $form = $this->createForm(BlogFormType::class, $blog);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $blog = $form->getData();
            
            $this->em->persist($blog);
            $this->em->flush();

            return $this->redirectToRoute('app_blog');
        }

        return $this->render('blog/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/blog/{id}', name: 'app_blog_show')]
    public function show($id, CommentRepository $commentRepository): Response
    {
        $blog = $this->blogRepository->find($id);

        $comments = $commentRepository->findBy(['blog' => $blog->getId()]);

        return $this->render('blog/show.html.twig', [
            'blog' => $blog,
            'comments' => $comments,
        ]);
    }
    #[Route('/blog/{id}/comment', name: 'app_blog_comment')]
    public function comment($id, Request $request): Response
    {
        $blog = $this->blogRepository->find($id);

        $comment = new Comment();
        $comment->setBlog($blog);
        $comment->setContent($request->request->get('content'));
        $comment->setDate(new \DateTime());

        $this->em->persist($comment);
        $this->em->flush();

        return $this->redirectToRoute('app_blog_show', ['id' => $blog->getId()]);
    }
}
