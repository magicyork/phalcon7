<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class WstGoodsController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for wst_goods
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'WstGoods', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "goodsId";

        $wst_goods = WstGoods::find($parameters);
        if (count($wst_goods) == 0) {
            $this->flash->notice("The search did not find any wst_goods");

            $this->dispatcher->forward([
                "controller" => "wst_goods",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $wst_goods,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a wst_good
     *
     * @param string $goodsId
     */
    public function editAction($goodsId)
    {
        if (!$this->request->isPost()) {

            $wst_good = WstGoods::findFirstBygoodsId($goodsId);
            if (!$wst_good) {
                $this->flash->error("wst_good was not found");

                $this->dispatcher->forward([
                    'controller' => "wst_goods",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->goodsId = $wst_good->goodsId;

            $this->tag->setDefault("goodsId", $wst_good->goodsId);
            $this->tag->setDefault("goodsSn", $wst_good->goodsSn);
            $this->tag->setDefault("productNo", $wst_good->productNo);
            $this->tag->setDefault("goodsName", $wst_good->goodsName);
            $this->tag->setDefault("goodsImg", $wst_good->goodsImg);
            $this->tag->setDefault("shopId", $wst_good->shopId);
            $this->tag->setDefault("marketPrice", $wst_good->marketPrice);
            $this->tag->setDefault("shopPrice", $wst_good->shopPrice);
            $this->tag->setDefault("warnStock", $wst_good->warnStock);
            $this->tag->setDefault("goodsStock", $wst_good->goodsStock);
            $this->tag->setDefault("goodsUnit", $wst_good->goodsUnit);
            $this->tag->setDefault("goodsTips", $wst_good->goodsTips);
            $this->tag->setDefault("isSale", $wst_good->isSale);
            $this->tag->setDefault("isBest", $wst_good->isBest);
            $this->tag->setDefault("isHot", $wst_good->isHot);
            $this->tag->setDefault("isNew", $wst_good->isNew);
            $this->tag->setDefault("isRecom", $wst_good->isRecom);
            $this->tag->setDefault("goodsCatIdPath", $wst_good->goodsCatIdPath);
            $this->tag->setDefault("goodsCatId", $wst_good->goodsCatId);
            $this->tag->setDefault("shopCatId1", $wst_good->shopCatId1);
            $this->tag->setDefault("shopCatId2", $wst_good->shopCatId2);
            $this->tag->setDefault("brandId", $wst_good->brandId);
            $this->tag->setDefault("goodsDesc", $wst_good->goodsDesc);
            $this->tag->setDefault("goodsStatus", $wst_good->goodsStatus);
            $this->tag->setDefault("saleNum", $wst_good->saleNum);
            $this->tag->setDefault("saleTime", $wst_good->saleTime);
            $this->tag->setDefault("visitNum", $wst_good->visitNum);
            $this->tag->setDefault("appraiseNum", $wst_good->appraiseNum);
            $this->tag->setDefault("isSpec", $wst_good->isSpec);
            $this->tag->setDefault("gallery", $wst_good->gallery);
            $this->tag->setDefault("goodsSeoKeywords", $wst_good->goodsSeoKeywords);
            $this->tag->setDefault("illegalRemarks", $wst_good->illegalRemarks);
            $this->tag->setDefault("dataFlag", $wst_good->dataFlag);
            $this->tag->setDefault("createTime", $wst_good->createTime);
            
        }
    }

    /**
     * Creates a new wst_good
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "wst_goods",
                'action' => 'index'
            ]);

            return;
        }

        $wst_good = new WstGoods();
        $wst_good->goodsSn = $this->request->getPost("goodsSn");
        $wst_good->productNo = $this->request->getPost("productNo");
        $wst_good->goodsName = $this->request->getPost("goodsName");
        $wst_good->goodsImg = $this->request->getPost("goodsImg");
        $wst_good->shopId = $this->request->getPost("shopId");
        $wst_good->marketPrice = $this->request->getPost("marketPrice");
        $wst_good->shopPrice = $this->request->getPost("shopPrice");
        $wst_good->warnStock = $this->request->getPost("warnStock");
        $wst_good->goodsStock = $this->request->getPost("goodsStock");
        $wst_good->goodsUnit = $this->request->getPost("goodsUnit");
        $wst_good->goodsTips = $this->request->getPost("goodsTips");
        $wst_good->isSale = $this->request->getPost("isSale");
        $wst_good->isBest = $this->request->getPost("isBest");
        $wst_good->isHot = $this->request->getPost("isHot");
        $wst_good->isNew = $this->request->getPost("isNew");
        $wst_good->isRecom = $this->request->getPost("isRecom");
        $wst_good->goodsCatIdPath = $this->request->getPost("goodsCatIdPath");
        $wst_good->goodsCatId = $this->request->getPost("goodsCatId");
        $wst_good->shopCatId1 = $this->request->getPost("shopCatId1");
        $wst_good->shopCatId2 = $this->request->getPost("shopCatId2");
        $wst_good->brandId = $this->request->getPost("brandId");
        $wst_good->goodsDesc = $this->request->getPost("goodsDesc");
        $wst_good->goodsStatus = $this->request->getPost("goodsStatus");
        $wst_good->saleNum = $this->request->getPost("saleNum");
        $wst_good->saleTime = $this->request->getPost("saleTime");
        $wst_good->visitNum = $this->request->getPost("visitNum");
        $wst_good->appraiseNum = $this->request->getPost("appraiseNum");
        $wst_good->isSpec = $this->request->getPost("isSpec");
        $wst_good->gallery = $this->request->getPost("gallery");
        $wst_good->goodsSeoKeywords = $this->request->getPost("goodsSeoKeywords");
        $wst_good->illegalRemarks = $this->request->getPost("illegalRemarks");
        $wst_good->dataFlag = $this->request->getPost("dataFlag");
        $wst_good->createTime = $this->request->getPost("createTime");
        

        if (!$wst_good->save()) {
            foreach ($wst_good->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "wst_goods",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("wst_good was created successfully");

        $this->dispatcher->forward([
            'controller' => "wst_goods",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a wst_good edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "wst_goods",
                'action' => 'index'
            ]);

            return;
        }

        $goodsId = $this->request->getPost("goodsId");
        $wst_good = WstGoods::findFirstBygoodsId($goodsId);

        if (!$wst_good) {
            $this->flash->error("wst_good does not exist " . $goodsId);

            $this->dispatcher->forward([
                'controller' => "wst_goods",
                'action' => 'index'
            ]);

            return;
        }

        $wst_good->goodsSn = $this->request->getPost("goodsSn");
        $wst_good->productNo = $this->request->getPost("productNo");
        $wst_good->goodsName = $this->request->getPost("goodsName");
        $wst_good->goodsImg = $this->request->getPost("goodsImg");
        $wst_good->shopId = $this->request->getPost("shopId");
        $wst_good->marketPrice = $this->request->getPost("marketPrice");
        $wst_good->shopPrice = $this->request->getPost("shopPrice");
        $wst_good->warnStock = $this->request->getPost("warnStock");
        $wst_good->goodsStock = $this->request->getPost("goodsStock");
        $wst_good->goodsUnit = $this->request->getPost("goodsUnit");
        $wst_good->goodsTips = $this->request->getPost("goodsTips");
        $wst_good->isSale = $this->request->getPost("isSale");
        $wst_good->isBest = $this->request->getPost("isBest");
        $wst_good->isHot = $this->request->getPost("isHot");
        $wst_good->isNew = $this->request->getPost("isNew");
        $wst_good->isRecom = $this->request->getPost("isRecom");
        $wst_good->goodsCatIdPath = $this->request->getPost("goodsCatIdPath");
        $wst_good->goodsCatId = $this->request->getPost("goodsCatId");
        $wst_good->shopCatId1 = $this->request->getPost("shopCatId1");
        $wst_good->shopCatId2 = $this->request->getPost("shopCatId2");
        $wst_good->brandId = $this->request->getPost("brandId");
        $wst_good->goodsDesc = $this->request->getPost("goodsDesc");
        $wst_good->goodsStatus = $this->request->getPost("goodsStatus");
        $wst_good->saleNum = $this->request->getPost("saleNum");
        $wst_good->saleTime = $this->request->getPost("saleTime");
        $wst_good->visitNum = $this->request->getPost("visitNum");
        $wst_good->appraiseNum = $this->request->getPost("appraiseNum");
        $wst_good->isSpec = $this->request->getPost("isSpec");
        $wst_good->gallery = $this->request->getPost("gallery");
        $wst_good->goodsSeoKeywords = $this->request->getPost("goodsSeoKeywords");
        $wst_good->illegalRemarks = $this->request->getPost("illegalRemarks");
        $wst_good->dataFlag = $this->request->getPost("dataFlag");
        $wst_good->createTime = $this->request->getPost("createTime");
        

        if (!$wst_good->save()) {

            foreach ($wst_good->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "wst_goods",
                'action' => 'edit',
                'params' => [$wst_good->goodsId]
            ]);

            return;
        }

        $this->flash->success("wst_good was updated successfully");

        $this->dispatcher->forward([
            'controller' => "wst_goods",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a wst_good
     *
     * @param string $goodsId
     */
    public function deleteAction($goodsId)
    {
        $wst_good = WstGoods::findFirstBygoodsId($goodsId);
        if (!$wst_good) {
            $this->flash->error("wst_good was not found");

            $this->dispatcher->forward([
                'controller' => "wst_goods",
                'action' => 'index'
            ]);

            return;
        }

        if (!$wst_good->delete()) {

            foreach ($wst_good->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "wst_goods",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("wst_good was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "wst_goods",
            'action' => "index"
        ]);
    }

}
