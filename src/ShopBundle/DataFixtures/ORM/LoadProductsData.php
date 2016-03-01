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
 
        $product1 = new Products();
        $product1->setName('vip');
        $product1->setCategory('CS:GO Arena');
        $product1->setPrice('7.38');
        $product1->setImg('http://holyshit.pl/img/store/vip12.png');
        $product1->setImgMin('http://holyshit.pl/img/store/vip12-min.png');
        $product1->setDescription('lorem ipsum lorem ipsum lorem ipsum lorem ipsum');
        $product1->setDisplayName('Usługa VIP przez 12dni');
        $product1->setDuration(12);
       
        $product2 = new Products();
        $product2->setName('vip_monthly');
        $product2->setCategory('CS:GO Arena');
        $product2->setPrice('17.22');
        $product2->setImg('http://holyshit.pl/img/store/vip25.png');
        $product2->setImgMin('http://holyshit.pl/img/store/vip25-min.png');
        $product2->setDescription('lorem ipsum lorem ipsum lorem ipsum lorem ipsum');
        $product2->setDisplayName('Usługa VIP + Rezerwacja slota przez 25dni');
        $product2->setDuration(25);
       
        $product3 = new Products();
        $product3->setName('double_jump');
        $product3->setCategory('CS:GO Arena');
        $product3->setPrice('7.38');
        $product3->setImg('http://holyshit.pl/img/store/doublejump25.png');
        $product3->setImgMin('http://holyshit.pl/img/store/doublejump25-min.png');
        $product3->setDescription('lorem ipsum lorem ipsum lorem ipsum lorem ipsum');
        $product3->setDisplayName('Podwójny skok przez 25dni');
        $product3->setDuration(25);

        $product4 = new Products();
        $product4->setName('slot');
        $product4->setCategory('CS 1.6 GO MOD');
        $product4->setPrice('7.38');
        $product4->setImg('http://holyshit.pl/img/store/reservation25.png');
        $product4->setImgMin('http://holyshit.pl/img/store/reservation25-min.png');
        $product4->setDescription('lorem ipsum lorem ipsum lorem ipsum lorem ipsum');
        $product4->setDisplayName('Rezerwacja slota przez 25dni');
        $product4->setDuration(25);
 
        $product5 = new Products();
        $product5->setName('vip');
        $product5->setCategory('CS 1.6 GO MOD');
        $product5->setPrice('7.38');
        $product5->setImg('http://holyshit.pl/img/store/vip12.png');
        $product5->setImgMin('http://holyshit.pl/img/store/vip12-min.png');
        $product5->setDescription('lorem ipsum lorem ipsum lorem ipsum lorem ipsum');
        $product5->setDisplayName('Usługa VIP przez 12dni');
        $product5->setDuration(12);
       
        $product6 = new Products();
        $product6->setName('vip_monthly');
        $product6->setCategory('CS 1.6 GO MOD');
        $product6->setPrice('17.22');
        $product6->setImg('http://holyshit.pl/img/store/vip25.png');
        $product6->setImgMin('http://holyshit.pl/img/store/vip25-min.png');
        $product6->setDescription('lorem ipsum lorem ipsum lorem ipsum lorem ipsum');
        $product6->setDisplayName('Usługa VIP + Rezerwacja slota przez 25dni');
        $product6->setDuration(25);
       
       
        $manager->persist($product);
        $manager->persist($product1);
        $manager->persist($product2);
        $manager->persist($product3);
        $manager->persist($product4);
        $manager->persist($product5);
        $manager->persist($product6);
        $manager->flush();
       
    }
}