<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="mb-3">
        <div class="container-fluid   p-3 b">
            <div class="row py-5 px-5">
                <div class="col-md-6 order-12-md-1 px-5 px-md-2 comp-grid">
                    <div class=""><div class="">
                        <!--this is our page title and subtitle-->
                        <h1 class="display-4 bold text-success mb-3"><?php echo SITE_NAME;?></h1>
                        <h4 class="mb-4">Hello welcome to <?php echo SITE_NAME;?></h4>
                        <div class="font-nm mb-4">
                            Rural AgriHub is a social enterprise in the market to ensure that smallholder farmers in remote areas are adequately linked to secured market where they can be assured of good returns from their produce, thereby reducing food wastage and post harvest losses. We do this with the help of a simple web based tool.
                        </div>
                        <!--our page button comes over here-->
                        <div class="">
                            <a href="https://form.jotform.com/222763371045554">
                                <button class="btn btn-lg rounded btn-success">Order Now!</button>
                            </a>
                            <a href="https://http://ruralagrihub.com">
                                <button class="btn btn-lg rounded btn-outline-success">Know more!</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 order-11 comp-grid">
                <div class="">
                    <div class="col-12">
                        <img src="assets/images/cabage.jpeg" height="100%" width="100%">
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div  class="border-top">
        <div class="container-fluid overlay-light">
            <div class="page-header"><h4>Summary Dashboard</h4></div>
            <div class="row ">
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_customers();  ?>
                    <a class="animated rubberBand record-count card bg-success text-white"  href="<?php print_link("customers/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons">extension</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Customers</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_community();  ?>
                    <a class="animated rubberBand record-count card bg-warning text-white"  href="<?php print_link("community/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons">extension</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Community</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_inventory();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("inventory/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons">extension</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Inventory</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_farmers();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("farmers/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons">extension</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Farmers</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_subscribtions();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("subscribtions/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons">extension</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Subscribtions</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
