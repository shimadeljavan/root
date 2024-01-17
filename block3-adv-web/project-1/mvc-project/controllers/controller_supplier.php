<?php

require_once 'models/model_supplier.php';
class SupplierController {
    private $supplier;



    public function __construct($connection) {
        $this->supplier = new SupplierModel($connection);
    }

    public function showSuppliers() {
        $suppliers = $this->supplier->selectSuppliers();
        include 'views/suppliers.php';  
    }

    public function showSupplierForm() {
        include 'views/supplier_form.php'; 
    }

    public function addSupplier() {
        $supplierName = $_POST['supplierName'];
        $address = $_POST['address'];
        $contactNumber = $_POST['contactNumber'];
        if(!$supplierName) {
            echo "<p>Missing information</p>";
            $this->showSupplierForm();
            return;
        } else if($this->supplier->insertSupplier($supplierName, $address, $contactNumber)) {
            echo "<p>Added supplier: $supplierName successfully </p>";
        } else {
            echo "<p>Could not add supplier </p>";
        }
        $this->showSuppliers();
    }

    public function deleteSupplier($supplierID) {
        $supplier = $this->supplier->getSupplierByID($supplierID);
        if ($supplier) {
        $supplier = $this->supplier->getSupplierByID($supplierID);    
            include 'views/supplier_delete.php';
        } else {
            echo "<p>Supplier not found</p>";
            $this->showSuppliers();
        }
    }

    public function confirm_deleteSupplier($supplierID) {
        if ($this->supplier->deleteSupplier($supplierID)) {
            echo "<p>this Supplier ID : $supplierID deleted successfully</p>";
        } else {
            echo "<p>Could not delete supplier</p>";
        }
        $this->showSuppliers();
    }
}
$connection = new ConnectionObject("localhost", "shima_food", "shimashima261710", "shima94_food");
$supplierController = new SupplierController($connection);
if ($action === 'showSuppliers') {
        $supplierController->showSuppliers();
    } elseif ($action === 'showSupplierForm') {
        $supplierController->showSupplierForm();
    } elseif ($action === 'addSupplier') {
        $supplierController->addSupplier();
    } elseif ($action === 'deleteSupplier') {
        $supplierID = isset($_GET['supplierID']) ? $_GET['supplierID'] : '';
        if ($supplierID) {
            $supplierController->deleteSupplier($supplierID);
        } else {
            echo "<p>Error: Supplier ID not provided for deletion.</p>";
        }
    } elseif ($action === 'confirm_deleteSupplier') {
        $supplierID = isset($_GET['supplierID']) ? $_GET['supplierID'] : '';
        $supplierController->confirm_deleteSupplier($supplierID);
    }

?>
