<?php
namespace ShopBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ShopBundle\Entity\Products;
 
class LoadProductsData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $product = new Products();
        $product->setName('slot');
        $product->setCategory('CS:GO Arena');
        $product->setPrice('7.38');
        $product->setImg('http://holyshit.pl/img/store/reservation25.png');
        $product->setImgMin('http://holyshit.pl/img/store/reservation25-min.png');
        $product->setDescription('lorem ipsum lorem ipsum lorem ipsum lorem ipsum');
        $product->setDisplayName('Rezerwacja slota przez 25dni');
        $product->setDuration(25);
        $product->setCategorypath('csgo_arena');
 
        $product1 = new Products();
        $product1->setName('vip');
        $product1->setCategory('CS:GO Arena');
        $product1->setPrice('7.38');
        $product1->setImg('http://holyshit.pl/img/store/vip12.png');
        $product1->setImgMin('http://holyshit.pl/img/store/vip12-min.png');
        $product1->setDescription('lorem ipsum lorem ipsum lorem ipsum lorem ipsum');
        $product1->setDisplayName('Usługa VIP przez 12dni');
        $product1->setDuration(12);
        $product1->setCategorypath('csgo_arena');

        $product2 = new Products();
        $product2->setName('vip_monthly');
        $product2->setCategory('CS:GO Arena');
        $product2->setPrice('17.22');
        $product2->setImg('http://holyshit.pl/img/store/vip25.png');
        $product2->setImgMin('http://holyshit.pl/img/store/vip25-min.png');
        $product2->setDescription('lorem ipsum lorem ipsum lorem ipsum lorem ipsum');
        $product2->setDisplayName('Usługa VIP + Rezerwacja slota przez 25dni');
        $product2->setDuration(25);
        $product2->setCategorypath('csgo_arena');

        $product3 = new Products();
        $product3->setName('double_jump');
        $product3->setCategory('CS:GO Arena');
        $product3->setPrice('7.38');
        $product3->setImg('http://holyshit.pl/img/store/doublejump25.png');
        $product3->setImgMin('http://holyshit.pl/img/store/doublejump25-min.png');
        $product3->setDescription('lorem ipsum lorem ipsum lorem ipsum lorem ipsum');
        $product3->setDisplayName('Podwójny skok przez 25dni');
        $product3->setDuration(25);
        $product3->setCategorypath('csgo_arena');

        $manager->persist($product);
        $manager->persist($product1);
        $manager->persist($product2);
        $manager->persist($product3);
        $manager->flush();
       
    }
}