<?php
namespace App\Services;

use App\Repositories\BlogRepository;

class BlogService
{
    public $repository;

    public function __construct()
    {
        $this->repository = new BlogRepository;
    }

    public function filterBlogs()
    {
        $filter = $this->getInputData();
        $blogs = $this->repository->getAllBlogs();
        $blogs = $this->repository->filterBlogWithTitle($blogs, $filter['title']);
        $blogs = $this->repository->filterBlogWithCategory($blogs, $filter['category']);
        $blogs = $this->repository->filterBlogWithAuthor($blogs, $filter['author']);
        $blogs = $this->repository->filterBlogWithComments($blogs, $filter['comment_count']);
        $blogs = $blogs->get();
        return $blogs;
    }

    public static function getInputData()
    {
        $inputData = [];
        $inputData['category'] = request('category') ?? '';
        $inputData['author'] = request('author') ?? '';
        $inputData['title'] = request('search') ?? '';
        $inputData['comment_count'] = request('comment_count');
        return $inputData;
    }

}
