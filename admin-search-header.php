                    <div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.html" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <!-- <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> -->
										<li><a href="checkout.html">Checkout</a></li>
										<li><a href="cart.html">Cart</a></li>
										<li><a href="login.html">Login</a></li>
                                    </ul>
								</li>
								<li class="dropdown"><a href="shop.html">Products<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="product-details.html">Products Details</a></li>
                                    </ul>
								<!--<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>-->
								<!--<li><a href="404.html">404</a></li>-->
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
                            <form action="view_found_record.php" method="post">
							    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" maxlength="30" required
                                value="<?php if (isset($_POST['first_name']))
                                echo htmlspecialchars($_POST['first_name'], ENT_QUOTES);?>"/>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" maxlength="30" required
                                value="<?php if (isset($_POST['last_name']))
                                echo htmlspecialchars($_POST['last_name'], ENT_QUOTES);?>"/>
                                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Search"/>
                            </form>

						</div>
					</div>