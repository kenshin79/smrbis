<?php
include 'application/views/includes/check_login.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo $this->config->item('bootstrap_css'); ?>" rel="stylesheet">   
        <link href="<?php echo $this->config->item('datatables_css') ?>" rel="stylesheet">		
        <link href="<?php echo $this->config->item('datepicker_css'); ?>" rel="stylesheet">	
        <script src="<?php echo $this->config->item('jquery'); ?>"></script>
        <script src="<?php echo $this->config->item('bootstrap_js'); ?>"></script>						
        <script src="<?php echo $this->config->item('datatables_js'); ?>"></script>
        <script src="<?php echo $this->config->item('datepicker_js'); ?>"></script>			
        <script src="<?php echo $this->config->item('common_js'); ?>"></script>		
        <script src="<?php echo $this->config->item('pricelist_js'); ?>"></script>			    

        <title>Manage Pricelist</title>
    </head>
    <body>
        <div class="alert alert-info hide" id="main_alert" role="alert">
            <button type="button" class="close" onclick="$('#admin_alert').addClass('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <div id="mainalert_body"></div>
        </div>
        <div class="modal" id="main_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="alert alert-info hide" id="modal_alert" role="alert">
                        <button type="button" class="close" onclick="$('#modal_alert').addClass('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <div id="modalalert_body"></div>
                    </div>      				
                    <div class="modal-body"></div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->		
        <div class="container-fluid">
            <div class="row">
                <?php
                include 'application/views/includes/headers/currentpage_header.php';
                include 'application/views/includes/headers/username_header.php';
                ?>				
                <div class="col-md-5"></div>
                <?php
                if ($this->session->userdata('session_access') == 0 || $this->session->userdata('session_access') == 1){
                    include 'application/views/includes/headers/sales_header.php';	
                }
				else {
					echo "<div class=\"col-md-1\"></div>";
				}
                if ($this->session->userdata('session_access') == 0) {
                    include 'application/views/includes/headers/admin_header.php';
                } else {
                    echo "<div class=\"col-md-1\"></div>";
                }
                include 'application/views/includes/headers/search_header.php';
                include 'application/views/includes/headers/logout_header.php';
                ?>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active" ><a href="#items" data-toggle="tab" >Items</a></li>
                        <li><a href="#sku" data-toggle="tab" >SKU</a></li>
                        <li><a href="#categories" data-toggle="tab" >Categories</a></li>
                        <li><a href="#suppliers" data-toggle="tab" >Suppliers</a></li>
                        <li><a href="#customers" data-toggle="tab" >Customers</a></li>	
                    </ul>							
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="tab-content">				
                    <div id="items" class="tab-pane active">
                        <br />
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <br />
                                <button class="btn btn-default" onclick="checkAccess(['Add Item', 'items', 'newItem_form'], newEntry_form);">Add Item</button>
                            </div>
                            <div class="col-md-1"></div>
                        </div>									
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <label class="label label-default" for="items_clue">Search</label><input type="text" class="form-control input-lg" id="items_clue" placeholder="Enter at least 3 characters." onkeyup ="checkAccess(['#items_results', '#items_table', 'items/items_main', 'Items_model', document.getElementById('items_clue').value], showMain);" />
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <div id="items_results"></div>
                    </div>

                    <div id="sku" class="tab-pane">
                        <br />
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <br />
                                <button class="btn btn-default" onclick="checkAccess(['Add SKU', 'sku', 'newSku_form'], newEntry_form);">Add SKU</button>
                            </div>
                            <div class="col-md-1"></div>
                        </div>														
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <label class="label label-default" for="sku_clue">Search</label><input type="text" class="form-control input-lg" id="sku_clue" placeholder="Enter at least 3 characters." onkeyup = "checkAccess(['#sku_results', '#sku_table', 'sku/sku_main', 'Sku_model', document.getElementById('sku_clue').value], showMain);" />
                            </div>
                            <div class="col-md-1"></div>
                        </div>					
                        <div id="sku_results"></div>	
                    </div>

                    <div id="categories" class="tab-pane">
                        <br />
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <br />
                                <button class="btn btn-default" onclick="checkAccess(['Add Category', 'categories', 'newCategory_form'], newEntry_form);">Add Category</button>
                            </div>
                            <div class="col-md-1"></div>
                        </div>							
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <label class="label label-default" for="categories_clue">Search</label><input type="text" class="form-control input-lg" id="categories_clue" placeholder="Enter at least 3 characters." onkeyup = "checkAccess(['#categories_results', '#categories_table', 'categories/categories_main', 'Categories_model', document.getElementById('categories_clue').value], showMain);" />
                            </div>
                            <div class="col-md-1"></div>
                        </div>					
                        <div id="categories_results"></div>
                    </div>

                    <div id="suppliers" class="tab-pane">
                        <br />
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10"><br /><button class="btn btn-default" onclick="checkAccess(['Add Supplier', 'suppliers', 'newSupplier_form'], newEntry_form)">Add Supplier</button></div>
                        </div>						
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <label class="label label-default" for="suppliers_clue">Search</label><input type="text" class="form-control input-lg" id="suppliers_clue" placeholder="Enter at least 3 characters." onkeyup="checkAccess(['#suppliers_results', '#suppliers_table', 'suppliers/suppliers_main', 'Suppliers_model', document.getElementById('suppliers_clue').value], showMain);" />
                            </div>
                            <div class="col-md-1"></div>
                        </div>					
                        <div id="suppliers_results"></div>						
                    </div>

                    <div id="customers" class="tab-pane">
                        <br />
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10"><br /><button class="btn btn-default" onclick="checkAccess(['Add Customer', 'customers', 'newCustomer_form'], newEntry_form)">Add Customer</button></div>
                        </div>						
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <label class="label label-default" for="customers_clue">Search</label><input type="text" class="form-control input-lg" id="customers_clue" placeholder="Enter at least 3 characters." onkeyup="checkAccess(['#customers_results', '#customers_table', 'customers/customers_main', 'Customers_model', document.getElementById('customers_clue').value], showMain);" />
                            </div>
                            <div class="col-md-1"></div>
                        </div>					
                        <div id="customers_results"></div>						
                    </div>

                </div>
            </div>		
        </div>
    </body>
</html>