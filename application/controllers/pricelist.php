<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pricelist extends CI_Controller {

    public function index() {
        $data['icon1'] = $this->config->item('pricelist', 'icon');
        $data['icon2'] = $this->config->item('user', 'icon');
        $data['icon3'] = $this->config->item('search', 'icon');
        $data['icon6'] = $this->config->item('admin', 'icon');
        $data['icon5'] = $this->config->item('log_out', 'icon');
        $data['icon7'] = $this->config->item('sales', 'icon');
        $data['current'] = "Pricelist Manager";
        $this->load->view('pricelist/pricelist_main', $data);
    }

    public function nameUnique() {
        $name = $this->input->post('name', TRUE);
        $model = $this->input->post('model', TRUE);
        $this->load->model($model);
        $duplicate = $this->{$model}->checkName($name);
        if ($duplicate) {
            echo "0";
        } else {
            echo "1";
        }
    }
    public function showAllItems(){
        $this->load->model('Items_model');
        $data['all_items'] = $this->Items_model->wholePricelist();
        $this->load->view('pricelist/items/all_items', $data);
    }
    public function itemCostUnique() {
        $itemId = $this->input->post('itemId', TRUE);
        $skuId = $this->input->post('skuId', TRUE);
        $supplierId = $this->input->post('supplierId', TRUE);
        $costDate = $this->input->post('costDate', TRUE);
        $this->load->model('Costs_model');
        $duplicate = $this->Costs_model->itemCostUnique($itemId, $skuId, $supplierId, $costDate);
        if ($duplicate) {
            echo "1";
        } else {
            echo "0";
        }
    }

    public function itemPriceUnique() {
        $itemId = $this->input->post('itemId', TRUE);
        $skuId = $this->input->post('skuId', TRUE);
        $this->load->model('Prices_model');
        $duplicate = $this->Prices_model->itemPriceUnique($itemId, $skuId);
        if ($duplicate) {
            echo "1";
        } else {
            echo "0";
        }
    }

    public function showMain() {
        $model = $this->input->post('model', TRUE);
        $main_page = $this->input->post('main_page');
        $clue = $this->input->post('clue', TRUE);
        $this->load->model($model);
        $data['all_list'] = $this->{$model}->getAll($clue);
        $this->load->view('pricelist/' . $main_page, $data);
    }

    public function deleteSku() {
        $skuId = $this->input->post('skuId', TRUE);
        $this->load->model('Sku_model');
        $deleted = $this->Sku_model->deleteSku($skuId);
        if ($deleted) {
            $activity = "Success: deleted SKU";
        } else {
            $activity = "Failed: delete SKU";
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $deleted;
    }

    public function deleteCategory() {
        $categoryId = $this->input->post('categoryId', TRUE);
        $this->load->model('Categories_model');
        $deleted = $this->Categories_model->deleteCategory($categoryId);
        if ($deleted) {
            $activity = "Success: deleted category";
        } else {
            $activity = "Failed: delete category";
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $deleted;
    }

    public function deleteItem() {
        $itemId = $this->input->post('itemId', TRUE);
        $this->load->model('Items_model');
        $deleted = $this->Items_model->deleteItem($itemId);
        if ($deleted) {
            $activity = "Success: deleted item";
        } else {
            $activity = "Failed: delete item";
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $deleted;
    }

    public function deleteSupplier() {
        $supplierId = $this->input->post('supplierId', TRUE);
        $this->load->model('Suppliers_model');
        $deleted = $this->Suppliers_model->deleteSupplier($supplierId);
        if ($deleted) {
            $activity = "Success: deleted supplier";
        } else {
            $activity = "Failed: delete supplier";
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $deleted;
    }

    public function deleteCustomer() {
        $customerId = $this->input->post('customerId', TRUE);
        $this->load->model('Customers_model');
        $deleted = $this->Customers_model->deleteCustomer($customerId);
        if ($deleted) {
            $activity = "Success: deleted customer";
        } else {
            $activity = "Failed: delete customer";
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $deleted;
    }

    public function deleteCost() {
        $costId = $this->input->post('costId', TRUE);
        $this->load->model('Costs_model');
        $deleted = $this->Costs_model->deleteCost($costId);
        if ($deleted) {
            $activity = "Success: deleted cost";
        } else {
            $activity = "Failed: delete cost";
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $deleted;
    }

    public function newForm($folder, $view) {
        $this->load->view("pricelist/" . $folder . "/" . $view);
    }

    public function newItemCost_form() {
        $data['itemId'] = $this->input->post('itemId', TRUE);
        $data['itemName'] = $this->input->post('itemName', TRUE);
        $this->load->model('Suppliers_model');
        $data['all_suppliers'] = $this->Suppliers_model->getAll2();
        $this->load->model('Sku_model');
        $data['all_sku'] = $this->Sku_model->getAll2();
        $this->load->view('pricelist/items/newItemCost_form', $data);
    }

    public function newItemPrice_form() {
        $data['itemId'] = $this->input->post('itemId', TRUE);
        $data['itemName'] = $this->input->post('itemName', TRUE);
        $this->load->model('Sku_model');
        $data['all_sku'] = $this->Sku_model->getAll2();
        $this->load->view('pricelist/items/newItemPrice_form', $data);
    }

    public function addSku() {
        $this->load->library('Smrbis');
        $skuName = $this->smrbis->cleanString($this->input->post('skuName', TRUE));
        $skuCount = $this->input->post('skuCount', TRUE);
        $skuDesc = $this->smrbis->cleanString($this->input->post('skuDesc', TRUE));
        $this->load->model('Sku_model');
        $skuAdded = $this->Sku_model->insertSku($skuName, $skuCount, $skuDesc);
        if ($skuAdded) {
            $activity = "Success: Added SKU " . $skuName . " - " . $skuCount;
        } else {
            $activity = "Failed: Add SKU " . $skuName . " - " . $skuCount;
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $skuAdded;
    }

    public function addCategory() {
        $this->load->library('Smrbis');
        $categoryName = $this->smrbis->cleanString($this->input->post('categoryName', TRUE));
        $categoryDesc = $this->smrbis->cleanString($this->input->post('categoryDesc', TRUE));
        $this->load->model('Categories_model');
        $categoryAdded = $this->Categories_model->insertCategory($categoryName, $categoryDesc);
        if ($categoryAdded) {
            $activity = "Success: Added Category " . $categoryName;
        } else {
            $activity = "Failed: Add Category " . $categoryName;
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $categoryAdded;
    }

    public function addSupplier() {
        $this->load->library('Smrbis');
        $supplierName = $this->smrbis->cleanString($this->input->post('supplierName', TRUE));
        $supplierAddress = $this->smrbis->cleanString($this->input->post('supplierAddress', TRUE));
        $supplierTelephone = $this->smrbis->cleanString($this->input->post('supplierTelephone', TRUE));
        $supplierMobile = $this->smrbis->cleanString($this->input->post('supplierMobile', TRUE));
        $supplierEmail = $this->smrbis->cleanString($this->input->post('supplierEmail', TRUE));
        $this->load->model('Suppliers_model');
        $supplierAdded = $this->Suppliers_model->insertSupplier($supplierName, $supplierAddress, $supplierTelephone, $supplierMobile, $supplierEmail);
        if ($supplierAdded) {
            $activity = "Success: Added Supplier " . $supplierName;
        } else {
            $activity = "Failed: Add Supplier " . $supplierName;
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $supplierAdded;
    }

    public function addCustomer() {
        $this->load->library('Smrbis');
        $customerName = $this->smrbis->cleanString($this->input->post('customerName', TRUE));
        $customerAddress = $this->smrbis->cleanString($this->input->post('customerAddress', TRUE));
        $customerTelephone = $this->smrbis->cleanString($this->input->post('customerTelephone', TRUE));
        $customerMobile = $this->smrbis->cleanString($this->input->post('customerMobile', TRUE));
        $customerEmail = $this->smrbis->cleanString($this->input->post('customerEmail', TRUE));
        $this->load->model('Customers_model');
        $customerAdded = $this->Customers_model->insertCustomer($customerName, $customerAddress, $customerTelephone, $customerMobile, $customerEmail);
        if ($customerAdded) {
            $activity = "Success: Added Customer " . $customerName;
        } else {
            $activity = "Failed: Add Customer " . $customerName;
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $customerAdded;
    }

    public function addItem() {
        $this->load->library('Smrbis');
        $itemName = $this->smrbis->cleanString($this->input->post('itemName', TRUE));
        $itemCategory = $this->smrbis->cleanString($this->input->post('itemCategory', TRUE));
        $itemDesc = $this->smrbis->cleanString($this->input->post('itemDesc', TRUE));
        $this->load->model('Items_model');
        $itemAdded = $this->Items_model->insertItem($itemName, $itemCategory, $itemDesc);
        if ($itemAdded) {
            $activity = "Success: Added Item " . $itemName;
        } else {
            $activity = "Failed: Add Item " . $itemName;
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $itemAdded;
    }

    public function addItemCost() {
        $this->load->model('Costs_model');
        $costAdded = $this->Costs_model->insertCost();
        if ($costAdded) {
            $activity = "Success: Added Item cost";
        } else {
            $activity = "Failed: Add Item cost";
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $costAdded;
    }

    public function addItemPrice() {
        $this->load->model('Prices_model');
        $priceAdded = $this->Prices_model->insertPrice();
        if ($priceAdded) {
            $activity = "Success: Added Item price";
        } else {
            $activity = "Failed: Add Item price";
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $priceAdded;
    }

    public function editSku() {
        $this->load->library('Smrbis');
        $data['skuId'] = $this->input->post('skuId', TRUE);
        $data['skuName'] = $this->smrbis->cleanString($this->input->post('skuName', TRUE));
        $data['skuCount'] = $this->input->post('skuCount', TRUE);
        $data['skuDesc'] = $this->smrbis->cleanString($this->input->post('skuDesc', TRUE));
        $this->load->view('pricelist/sku/editSku_form', $data);
    }

    public function editCategory() {
        $this->load->library('Smrbis');
        $data['categoryId'] = $this->input->post('categoryId', TRUE);
        $data['categoryName'] = $this->smrbis->cleanString($this->input->post('categoryName', TRUE));
        $data['categoryDesc'] = $this->smrbis->cleanString($this->input->post('categoryDesc', TRUE));
        $this->load->view('pricelist/categories/editCategory_form', $data);
    }

    public function editSupplier() {
        $this->load->library('Smrbis');
        $data['supplierId'] = $this->input->post('supplierId', TRUE);
        $data['supplierName'] = $this->smrbis->cleanString($this->input->post('supplierName', TRUE));
        $data['supplierAddress'] = $this->smrbis->cleanString($this->input->post('supplierAddress', TRUE));
        $data['supplierTelephone'] = $this->smrbis->cleanString($this->input->post('supplierTelephone', TRUE));
        $data['supplierMobile'] = $this->smrbis->cleanString($this->input->post('supplierMobile', TRUE));
        $data['supplierEmail'] = $this->smrbis->cleanString($this->input->post('supplierEmail', TRUE));
        $this->load->view('pricelist/suppliers/editSupplier_form', $data);
    }

    public function editCustomer() {
        $this->load->library('Smrbis');
        $data['customerId'] = $this->input->post('customerId', TRUE);
        $data['customerName'] = $this->smrbis->cleanString($this->input->post('customerName', TRUE));
        $data['customerAddress'] = $this->smrbis->cleanString($this->input->post('customerAddress', TRUE));
        $data['customerTelephone'] = $this->smrbis->cleanString($this->input->post('customerTelephone', TRUE));
        $data['customerMobile'] = $this->smrbis->cleanString($this->input->post('customerMobile', TRUE));
        $data['customerEmail'] = $this->smrbis->cleanString($this->input->post('customerEmail', TRUE));
        $this->load->view('pricelist/customers/editCustomer_form', $data);
    }

    public function editItem() {
        $this->load->library('Smrbis');
        $data['itemId'] = $this->input->post('itemId', TRUE);
        $data['itemName'] = $this->smrbis->cleanString($this->input->post('itemName', TRUE));
        $data['itemCategory'] = $this->input->post('itemCategory', TRUE);
        $data['itemDesc'] = $this->smrbis->cleanString($this->input->post('itemDesc', TRUE));
        $this->load->view('pricelist/items/editItem_form', $data);
    }

    public function updateSku() {
        $this->load->library('Smrbis');
        $skuId = $this->input->post('skuId', TRUE);
        $skuName = $this->smrbis->cleanString($this->input->post('skuName', TRUE));
        $skuCount = $this->input->post('skuCount', TRUE);
        $skuDesc = $this->smrbis->cleanString($this->input->post('skuDesc', TRUE));
        $this->load->model('Sku_model');
        $updated = $this->Sku_model->updateSku($skuId, $skuName, $skuCount, $skuDesc);
        if ($updated) {
            $activity = "Success: updated SKU ";
        } else {
            $activity = "Failed: update SKU ";
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $updated;
    }

    public function updateCategory() {
        $this->load->library('Smrbis');
        $categoryId = $this->input->post('categoryId', TRUE);
        $categoryName = $this->smrbis->cleanString($this->input->post('categoryName', TRUE));
        $categoryDesc = $this->smrbis->cleanString($this->input->post('categoryDesc', TRUE));
        $this->load->model('Categories_model');
        $updated = $this->Categories_model->updateCategory($categoryId, $categoryName, $categoryDesc);
        if ($updated) {
            $activity = "Success: updated category ";
        } else {
            $activity = "Failed: update category ";
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $updated;
    }

    public function updateSupplier() {
        $this->load->library('Smrbis');
        $supplierId = $this->input->post('supplierId', TRUE);
        $supplierName = $this->smrbis->cleanString($this->input->post('supplierName', TRUE));
        $supplierAddress = $this->smrbis->cleanString($this->input->post('supplierAddress', TRUE));
        $supplierTelephone = $this->smrbis->cleanString($this->input->post('supplierTelephone', TRUE));
        $supplierMobile = $this->smrbis->cleanString($this->input->post('supplierMobile', TRUE));
        $supplierEmail = $this->smrbis->cleanString($this->input->post('supplierEmail', TRUE));
        $this->load->model('Suppliers_model');
        $updated = $this->Suppliers_model->updateSupplier($supplierId, $supplierName, $supplierAddress, $supplierTelephone, $supplierMobile, $supplierEmail);
        if ($updated) {
            $activity = "Success: updated supplier ";
        } else {
            $activity = "Failed: update supplier ";
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $updated;
    }

    public function updateCustomer() {
        $this->load->library('Smrbis');
        $customerId = $this->input->post('customerId', TRUE);
        $customerName = $this->smrbis->cleanString($this->input->post('customerName', TRUE));
        $customerAddress = $this->smrbis->cleanString($this->input->post('customerAddress', TRUE));
        $customerTelephone = $this->smrbis->cleanString($this->input->post('customerTelephone', TRUE));
        $customerMobile = $this->smrbis->cleanString($this->input->post('customerMobile', TRUE));
        $customerEmail = $this->smrbis->cleanString($this->input->post('customerEmail', TRUE));
        $this->load->model('Customers_model');
        $updated = $this->Customers_model->updateCustomer($customerId, $customerName, $customerAddress, $customerTelephone, $customerMobile, $customerEmail);
        if ($updated) {
            $activity = "Success: updated customer ";
        } else {
            $activity = "Failed: update customer ";
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $updated;
    }

    public function updateItem() {
        $this->load->library('Smrbis');
        $itemId = $this->input->post('itemId', TRUE);
        $itemName = $this->smrbis->cleanString($this->input->post('itemName', TRUE));
        $itemCategory = $this->smrbis->cleanString($this->input->post('itemCategory', TRUE));
        $itemDesc = $this->smrbis->cleanString($this->input->post('itemDesc', TRUE));
        $this->load->model('Items_model');
        $updated = $this->Items_model->updateItem($itemId, $itemName, $itemCategory, $itemDesc);
        if ($updated) {
            $activity = "Success: updated item ";
        } else {
            $activity = "Failed: update item ";
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $updated;
    }

    public function updateCostNotes() {
        $this->load->library('Smrbis');
        $costId = $this->input->post('costId', TRUE);
        $notes = $this->smrbis->cleanString($this->input->post('notes', TRUE));
        $cost = $this->input->post('cost', TRUE);
        $this->load->model('Costs_model');
        $updated = $this->Costs_model->updateCostNotes($costId, $cost, $notes);
        if ($updated) {
            $activity = "Success: updated cost notes ";
        } else {
            $activity = "Failed: update cost notes ";
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $updated;
    }

    public function updatePrice() {
        $this->load->model('Prices_model');
        $updated = $this->Prices_model->updatePrice();
        if ($updated) {
            $activity = "Success: updated price ";
        } else {
            $activity = "Failed: update price ";
        }
        $username = $this->session->userdata('session_user');
        $this->load->model('admin/Activitylog_model');
        $this->Activitylog_model->recordActivity($username, $activity);
        echo $updated;
    }

    public function showCostPrice() {
        $itemId = $this->input->post('itemId', TRUE);
        $data['itemId'] = $itemId;
        $data['itemName'] = $this->input->post('itemName', TRUE);
        $this->load->model('Costs_model');
        $data['item_costs'] = $this->Costs_model->getItemCosts($itemId);
        $this->load->model('Prices_model');
        $data['item_prices'] = $this->Prices_model->getItemPrices($itemId);
        $this->load->view('pricelist/items/itemCostPrice_form', $data);
    }

    public function editCostNotes() {
        $data['costId'] = $this->input->post('costId', TRUE);
        $data['notes'] = str_ireplace("&#92n", '\n', $this->input->post('notes', TRUE));
        $data['cost'] = $this->input->post('cost', TRUE);
        $data['skuName'] = $this->input->post('skuName', TRUE);
        $data['skuCount'] = $this->input->post('skuCount', TRUE);
        $data['itemId'] = $this->input->post('itemId', TRUE);
        $data['itemName'] = $this->input->post('itemName', TRUE);
        $this->load->view('pricelist/items/editCostNotes_form', $data);
    }

    public function editPrice() {
        $data['priceId'] = $this->input->post('priceId', TRUE);
        $data['rprice'] = $this->input->post('rprice', TRUE);
        $data['wprice'] = $this->input->post('wprice', TRUE);
        $data['notes'] = str_ireplace("&#92n", '\n', $this->input->post('notes', TRUE));
        $data['itemId'] = $this->input->post('itemId', TRUE);
        $data['itemName'] = $this->input->post('itemName', TRUE);
        $this->load->view('pricelist/items/editPrice_form', $data);
    }

}
