<?php

namespace ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\ProductsRepository")
 */
class Products
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="display_name", type="string", length=255)
     */
    private $display_name;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

        /**
     * @var string
     *
     * @ORM\Column(name="categorypath", type="string", length=255)
     */
    private $categorypath;


    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string")
     */
    private $price;

      /**
     * @var int
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255)
     */
    private $img;

    /**
    * @var string
    * @ORM\Column(name="img_min", type="string", length=255) 
    */
    private $img_min;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Products
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Products
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Products
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Products
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set img
     *
     * @param string $img
     *
     * @return Products
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

  /**
     * Set display_name
     *
     * @param string $display_name
     *
     * @return Products
     */
    public function setDisplayName($display_name)
    {
        $this->display_name = $display_name;

        return $this;
    }

    /**
     * Get display_name
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

      /**
     * Set duration
     *
     * @param int $duration
     *
     * @return Products
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return duration
     */
    public function getDuration()
    {
        return $this->duration;
    }
          /**
     * Set img_min
     *
     * @param string $img_min
     *
     * @return Products
     */
    public function setImgMin($img_min)
    {
        $this->img_min = $img_min;

        return $this;
    }

    /**
     * Get img_min
     *
     * @return img_min
     */
    public function getImgMin()
    {
        return $this->img_min;
    }
        /**
     * Set categorypath
     *
     * @param string $categorypath
     *
     * @return Products
     */
    public function setCategorypath($categorypath)
    {
        $this->categorypath = $categorypath;

        return $this;
    }

    /**
     * Get categorypath
     *
     * @return string
     */
    public function getCategorypath()
    {
        return $this->categorypath;
    }

}
