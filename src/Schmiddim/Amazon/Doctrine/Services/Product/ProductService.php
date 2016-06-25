<?php


namespace Schmiddim\Amazon\Doctrine\Services\Product;


use Doctrine\ORM\EntityManager;
use Schmiddim\Amazon\Doctrine\Services\AbstractEntityService;

use Schmiddim\Amazon\Doctrine\Entities\Product;
use Schmiddim\Amazon\Doctrine\Entities\Image;
use Schmiddim\Amazon\Doctrine\Entities\Price;
use Schmiddim\Amazon\Doctrine\Entities\Offer;
class ProductService extends AbstractEntityService implements ProductServiceInterface
{


    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager);

        $this->setRepositoryIdentifier(Product::class);
    }


    public function getProductByAsin($asin)
    {


        $product = $this->getRepository()->findOneBy(array('asin' => $asin));
        return $product;
    }


    public function existsProductByAsin($asin)
    {
        if (null !== $this->getProductByAsin($asin)) {
            return true;
        }
        return false;
    }
    /**
     * @param \SimpleXMLElement $xmlObject
     * @throws \Exception
     */
    public function createProductByXml(\SimpleXMLElement $itemDetails)
    {

        $product = new Product();
        $product->setByResponseObject($itemDetails);

        //check if we have it already in db
        $searchForProduct = $this->getProductByAsin($product->getAsin());

        if (null !== $searchForProduct) {
            return $searchForProduct;
        }


        $imageSmall = new Image(
            $itemDetails->SmallImage->URL
            , Image::SIZE_SMALL
            , $itemDetails->SmallImage->Width
            , $itemDetails->SmallImage->Height

        );
        $imageMedium = new Image(
            $itemDetails->MediumImage->URL
            , Image::SIZE_MEDIUM
            , $itemDetails->MediumImage->Width
            , $itemDetails->MediumImage->Height

        );

        $imageLarge = new Image(
            $itemDetails->LargeImage->URL
            , Image::SIZE_LARGE
            , $itemDetails->LargeImage->Width
            , $itemDetails->LargeImage->Height

        );

        $product->setImages([$imageSmall, $imageMedium, $imageLarge]);

        //Price
        $listPrice = new Price();
        $listPrice->setByResponseObject($itemDetails->ItemAttributes->ListPrice);
        $product->setListPrice($listPrice);

        //Offer
        if($itemDetails->Offers->TotalOffers >0 ){
            $offer = new Offer();
            $priceOffer = new Price();
            $priceOffer->setByResponseObject($itemDetails->Offers->Offer->OfferListing->Price);
            $offer->setByResponseObject($itemDetails, $priceOffer);
            $product->setOffers(array($offer));
        }
        //Persist
      /*  $entityManager = $this->getEntityManager();
        $entityManager->persist($product);
        $entityManager->flush();*/
        return $product;
    }

}