<?php
App::uses('AppModel', 'Model');

//App::import('Vendor', 'Scraper/LIB_http');
//App::import('Vendor', 'Scraper/LIB_parse');
App::import('Vendor', 'simple_html_dom');

/**
 * Store Model
 *
 */
class Store extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    private $url;
    private $baseUrl = 'http://www.argos.ie';
    public $displayField = 'store_name';

    private $result = array(
        'status' => false,
        'imgUrl' => '',
        'alt' => '',
        'title' => '',
        'pCode' => '',
        'desc' => '',
        'url' => '',
        'msg' => 'Whoops, there as been a problem. Sorry about that. Please try again.',
        'addInfo' => 'Uh Oh, this wasn\'t supposed to happen.'
    );


    public function getExisting() {
        $options = array(
            'fields' => array(
                'code',
                'store_name',
                'street_address',
                'locality',
                'region',
                'postal_code',
                'extra',
            )
        );
        $currentList = Hash::extract($this->find('all', $options), "{n}.Store");

        return $currentList;
    }

    /**
     *
     */
    public function checkForUpdates() {
        $old = $this->getExisting();
        $new = $this->downloadStoreList();

        $changes = $this->checkForNewStores($new, $old);
        if (isEmpty($changes)) {
            return 'No Stores to update';
        } else {
            $this->updateDataBase($new);
        }
    }

    /**
     * @param $new
     * @param $old
     * @return mixed
     */
    public function checkForNewStores($new, $old) {
        foreach ($new as $k => $v) {
            if ($new[$k] === $old[$k]) {
                unset($new[$k]);
            }
        }
        return $new;
    }


    /**
     * @return array
     * Scrapes URL and generates array list of store results with respective details
     */
    public function downloadStoreList() {
        $url = 'http://www.argos.ie/webapp/wcs/stores/servlet/ArgosStoreLocatorDB?includeName=StoreLocator&langId=111&storeId=10152';
        $html = file_get_html($url, 'www.google.ie');

        $stores = array();
        foreach ($html->find('li.storeDetails') as $d) {
            $s = array();
            //Split string by regex to remove whitespace and parse code and store name into an array
            $str = trim(preg_replace('!\s+!', ' ', $d->getElementById('.storeTitle')->children(0)->plaintext));
            preg_match('!\d+!', $str, $matches);

            $s['code'] = trim($matches[0]);
            $s['store_name'] = trim(str_replace($s['code'], '', $str));
            $s['street_address'] = trim($d->getElementByClass('street-address')->plaintext);
            $s['locality'] = trim($d->getElementByClass('locality')->plaintext);
            $s['region'] = trim($d->getElementByClass('region')->plaintext);
            $s['postal_code'] = trim($d->getElementByClass('postal-code')->plaintext);

            $ex = $d->getElementById('.storeTitle')->children(1);
            $s['extra'] = isset($ex) ? true : false;

            $day = new DateTime();
            $times = $d->find('.hours');

            //iterate over hours class, and add each day and opening hours. auto sorted by the site as
            //'today' being on top of the list in the souce code
            //foreach ($times as $t) {
            //    $s['hours'][$day->format('D')] = $t->plaintext;
            //    $day->add(new DateInterval('P1D'));
            //}
            //sort($s['hours']);
            $stores[] = $s;
            unset($s);
        }
        $html->clear();
        return $stores;
    }

    public function updateDataBase($data) {
        $this->truncate();
        $this->create();
        $result = $this->saveAll($data);
        if (!$result) {
            return false;
        }
        return 'Stores re-created successfully';
    }

    public function fetchProduct($product_id) {
        $this->url = 'http://www.argos.ie/static/Product/partNumber/' . $product_id . '.htm';
        $html = file_get_html($this->url);

        //if no results found, redirected to a https page with another display not related to our search results.
        $errorDoc = $html->find('div[class=heading]',0);
        if(isset($errorDoc)){
            $this->result['status'] = false;
            $this->result['msg'] = 'Sorry, we are unable to find the catalogue number you entered.';
            $this->result['addInfo'] = $errorDoc->children(1)->plaintext;
            $html->clear();
            unset($html);
            return $this->result;
        }

        $image = $html->find('img[id=mainimage]', 0);

        $tData = $html->find('div[id=primaryproductinfo]', 0);
        // there is potentially an additional div in the results if a product is 'new'
        // This checks and skips over the div if its present
        if($tData->children(0)->getAttribute('class')){
            $title = $tData->children(1)->plaintext;
        }
        else{
            $title = $tData->children(0)->plaintext;
        }

        $dData = $html->find('div[id=contentholder]', 0);

        $pData = $html->find('li[class=mainprice]', 0);
        $mPrice = trim($pData->children(0)->plaintext);
        $i = strpos($mPrice, ';') + 1;

        $this->result['status'] = true;
        $this->result['imgUrl'] = $this->baseUrl . $image->getAttribute('src');
        $this->result['alt'] = $image->getAttribute('alt');
        $this->result['title'] = $title;
        $this->result['pCode'] = substr($mPrice, $i);
        $this->result['desc'] = trim($dData->children(0)->plaintext);
        $this->result['url'] = $this->url;

        $html->clear();
        unset($html);
        return $this->result;


    }



}
