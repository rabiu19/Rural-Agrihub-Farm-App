        <?php 
        $page_id = null;
        $comp_model = new SharedController;
        ?>
        <div  class=" py-5">
            <div class="container p-3">
                <div class="row ">
                    <div class="container-fluid col-md-8 bg-profile overlay-light comp-grid">
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
                <div class="col-md-4 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <div>
                            <h4><i class="material-icons">lock_open</i> User Login</h4>
                            <hr />
                            <?php 
                            $this :: display_page_errors(); 
                            ?>
                            <form name="loginForm" action="<?php print_link('index/login/?csrf_token=' . Csrf::$token); ?>" class="needs-validation form page-form" method="post">
                                <div class="input-group form-group">
                                    <input placeholder="Username Or Email" name="username"  required="required" class="form-control" type="text"  />
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="form-control-feedback material-icons">account_circle</i></span>
                                    </div>
                                </div>
                                <div class="input-group form-group">
                                    <input  placeholder="Password" required="required" v-model="user.password" name="password" class="form-control " type="password" />
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="form-control-feedback material-icons">lock</i></span>
                                    </div>
                                </div>
                                <div class="row clearfix mt-3 mb-3">
                                    <div class="col-6">
                                        <label class="">
                                            <input value="true" type="checkbox" name="rememberme" />
                                            Remember Me
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <a href="<?php print_link('passwordmanager') ?>" class="text-danger"> Reset Password?</a>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-block btn-md" type="submit"> 
                                        <i class="load-indicator">
                                            <clip-loader :loading="loading" color="#fff" size="20px"></clip-loader> 
                                        </i>
                                        Login <i class="material-icons">lock_open</i>
                                    </button>
                                </div>
                                <hr />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div  class="bg-gt-primary">
        <div class="container p-3">
            <div class="row py-5 px-5">
                <div class="col-md-12 comp-grid">
                    <div class=""><div class="container-fluid p-3 bg-gt-primary">
                        <!-- Component Three [Start] -->
                        <div class="row py-3">
                            <div class="col-12 col-lg-4 d-flex mb-3">
                                <div class="d-inline p-3 pt-4">
                                    <!--<i class="material-icons ">hourglass_empty</i>-->
                                    <i class="hourglass_empty" style="font-size:25px"></i>
                                </div>
                                <div class="d-inline p-3">
                                    Through our market approach, we engage and aggregate demand from vendors and consumners or fresh fruits and vegatables in urban centres. 
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 d-flex mb-3">
                                <div class="d-inline p-3 pt-4">
                                    <i class="icon-present" style="font-size:25px"></i>
                                </div>
                                <div class="d-inline p-3">
                                    We engage farmers across the country to source for legumes hence help link these farmers to good market opportunities.
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 d-flex mb-3">
                                <div class="d-inline p-3 pt-4">
                                    <i class="hourglass_full" style="font-size:25px"></i>
                                </div>
                                <div class="d-inline p-3">
                                    We also engage farmers to produce for us through farmer group model.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div  class="bg-light">
    <div class="container p-3">
        <div class="row py-5">
            <div class="col-md-12 comp-grid">
                <div class=""> <div class="col-12 mt-4 mb-5">
                    <h1 class="display-5 bold mb-3 text-center">Who we are</h1>
                    <h4 class="mb-4 text-center">This is why you should partner with Rural AgriHub</h4>
                    <p class="text-center font-nm mb-4">
                        We aggregates demand and delivers a wide range of both organic and non organic produce directly from farms to stores of B2B customers retailers, wholesalers, food processors, restaurants, exporters and institutional kitchens. We leverages on technology to assure smooth order execution from farms to stores while organizing quality checks, distribution and traceability.
                    </p>
                </div></div>
            </div>
            <div class="col-sm-12 comp-grid">
                <div class=""><div class="col-12 row">
                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                        <div class="bg-white rounded shadow-sm p-4">
                            <div class="my-4">
                                <i class="material-icons p-3 rounded-circle alert-warning">perm_identity</i>
                            </div>
                            <div class="mb-3 font-nm bold">Market Access and Linkage</div>
                            <div class="mb-4">
                                We establish rich connection to both local and international markets, and owing to the fact that farmers are not adequately linked to these markets.
                            </div>
                            <div class="">
                                <button class="btn btn-outline-warning">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                        <div class="bg-white rounded shadow-sm p-4">
                            <div class="my-4">
                                <i class="material-icons p-3 rounded-circle alert-primary">perm_identity</i>
                            </div>
                            <div class="mb-3 font-nm bold">Farm Management Consultancy</div>
                            <div class="mb-4">
                                We offer a solid solutions to agribusiness entrepreneurs, from the professional advice on venture choice, feasibility study and overall farm management.
                            </div>
                            <div class="">
                                <button class="btn btn-outline-primary">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                        <div class="bg-white rounded shadow-sm p-4">
                            <div class="my-4">
                                <i class="material-icons p-3 rounded-circle alert-danger">perm_identity</i>
                            </div>
                            <div class="mb-3 font-nm bold">Sustainable Rural Development</div>
                            <div class="mb-4">
                                Our business innovation is aimed at encouraging sustained agriculture. We hope it will encourage entrepreneurship in agriculture leading to job creation
                            </div>
                            <div class="">
                                <button class="btn btn-outline-danger">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                        <div class="bg-white rounded shadow-sm p-4">
                            <div class="my-4">
                                <i class="material-icons p-3 rounded-circle alert-success">perm_identity</i>
                            </div>
                            <div class="mb-3 font-nm bold">Increase Farm Yield and Income</div>
                            <div class="mb-4">
                                Poverty among farmers is as a result of their inability to increase yield/harvest, then income. Our solution optimises crop yield with less resources.
                            </div>
                            <div class="">
                                <button class="btn btn-outline-success">Learn More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div  class="mb-3">
    <div class="container p-3">
        <div class="row py-5">
            <div class="col-sm-12 comp-grid">
                <div class=""><div class="">
                    <div class="col-12">
                        <h1 class="display-5 bold mb-3  text-center">Projets</h1>
                        <h4 class="mb-4 text-center">We currently run about four projects</h4>
                    </div>
                </div></div>
            </div>
            <div class="col-md-6 mb-5 mb-md-2 comp-grid">
                <div class="">  <div class="col-12">
                    <div>
                        <img src="assets/images/farm mgt.jpeg" height="100%" width="100%">
                        </div>
                    </div></div>
                </div>
                <div class="col-md-6 mt-4-md-2 comp-grid">
                    <div class=""> <div class="col-12">
                        <div class="col-12 row mt-3">
                            <div class="col-6 mb-4">
                                <div class="mt-3 mb-4">
                                    <i class="material-icons p-3 rounded alert-primary">desktop_mac</i>
                                </div>
                                <div class="bold font-nm mb-3">Bambara Groundnut Production</div>
                                <div class="">
                                    Development of Bambara Groundnut Value Chain based on Regenerative Agricultural Principles in Northern Ghana 
                                </div>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="mt-3 mb-4">
                                    <i class="material-icons p-3 rounded alert-success">desktop_mac</i>
                                </div>
                                <div class="bold font-nm mb-3">Shea Tree Planting</div>
                                <div class="">
                                    Symbolic Tree planting project: working with women groups to plant 211 shea trees as economic tree
                                </div>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="mt-3 mb-4">
                                    <i class="material-icons p-3 rounded alert-secondary">desktop_mac</i>
                                </div>
                                <div class="bold font-nm mb-3">Biochar Production</div>
                                <div class="">
                                    Regenerative Biochar production is a project that aims at supporting the rural small holder farmers to adopt for pure organic and affordable food production mechanism. 
                                </div>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="mt-3 mb-4">
                                    <i class="material-icons p-3 rounded alert-danger">desktop_mac</i>
                                </div>
                                <div class="bold font-nm mb-3">HiKESI Project</div>
                                <div class="">
                                    With our social impact projects, we empower youth, women and communities to build resilience towards agricultural production and other livelihoods initiatives. Hillary Kids Educational Support Initiative (HiKESI) Project 
                                </div>
                            </div>
                        </div>
                    </div></div>
                </div>
            </div>
        </div>
    </div>
    <div  class="">
        <div class="container p-3">
            <div class="row py-5">
                <div class="col-md-12 comp-grid">
                    <div class=""> <div class="col-12">
                        <h1 class="display-5 bold mb-3  text-center">Gallary</h1>
                        <h4 class="mb-4 text-center">Sample product pictures for you</h4>
                    </div></div>
                </div>
                <div class="col-sm-12 comp-grid">
                    <div class=""><div class="d-flex justify-content-center">
                        <div class="col-11 row mt-3">
                            <div class="col-md-4 row mt-3 bg-white p-r">
                                <img class="rounded" src="assets/images/m1.jpg" height="100%" width = "100%">
                                </div>
                                <div class="col-md-4 row mt-3 bg-white p-r">
                                    <img class="rounded" src="assets/images/m2.jpg" height="100%" width = "100%">
                                    </div>
                                    <div class="col-md-4 row mt-3 bg-white p-r">
                                        <img class="rounded" src="assets/images/m3.jpg" height="100%" width = "100%">
                                        </div>
                                        <div class="col-md-4 row mt-3 bg-whitep-r">
                                            <img class="rounded" src="assets/images/m4.jpg" height="100%" width = "100%">
                                            </div>
                                            <div class="col-md-4 row mt-3 bg-white p-r">
                                                <img class="rounded" src="assets/images/okro.jpg" height="100%" width = "100%">
                                                    <div class="col-md-4 row mt-3 bg-white p-r">
                                                        <img class="rounded" src="assets/images/okro.jpg" height="100%" width = "100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            