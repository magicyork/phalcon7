<?php

class WstGoods extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $goodsId;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $goodsSn;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $productNo;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $goodsName;

    /**
     *
     * @var string
     * @Column(type="string", length=150, nullable=false)
     */
    public $goodsImg;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $shopId;

    /**
     *
     * @var double
     * @Column(type="double", length=11, nullable=false)
     */
    public $marketPrice;

    /**
     *
     * @var double
     * @Column(type="double", length=11, nullable=false)
     */
    public $shopPrice;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $warnStock;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $goodsStock;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    public $goodsUnit;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $goodsTips;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    public $isSale;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    public $isBest;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    public $isHot;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    public $isNew;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    public $isRecom;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $goodsCatIdPath;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $goodsCatId;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $shopCatId1;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $shopCatId2;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $brandId;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $goodsDesc;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    public $goodsStatus;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $saleNum;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $saleTime;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $visitNum;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $appraiseNum;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    public $isSpec;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $gallery;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $goodsSeoKeywords;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $illegalRemarks;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    public $dataFlag;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $createTime;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'wst_goods';
    }

}
