<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 6/16/2018
 * Time: 5:04 PM
 */

namespace App\Dto;

class PaginationDto
{
    protected $tasks;
    protected $path;
    protected $actpage;
    protected $totalPageCount;

    /**
     * @return mixed
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @param mixed $tasks
     * @return PaginationDto
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     * @return PaginationDto
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActpage()
    {
        return $this->actpage;
    }

    /**
     * @param mixed $actpage
     * @return PaginationDto
     */
    public function setActpage($actpage)
    {
        $this->actpage = $actpage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalPageCount()
    {
        return $this->totalPageCount;
    }

    /**
     * @param mixed $totalPageCount
     * @return PaginationDto
     */
    public function setTotalPageCount($totalPageCount)
    {
        $this->totalPageCount = $totalPageCount;
        return $this;
    }

}