<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Buy & Sell';
$this->breadcrumbs=array(
	'Buy & Sell',
);
?>

	<div class="span8">
    	<div class="large-8 small-12 columns content-wrap">
        	<div class="content-part advice-wrap buy-sell">
            	<div class="header1 clearfix">
                	<div class="left-part">
                        <form>
                            <input type="text" placeholder="Enter your search term" />
                            <input type="submit" value="Search" class="search_btn" />
                        </form>
                    </div>
                    <div class="right-part">
						<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/post" class="iframe"><input type="button" class="post_btn" value="Post Free Ad" /></a>                    	
                    </div>
                </div>
                <!-- header1 ends here -->
                
                <div class="header2">
                	<h1>Start Search in Godwelling!</h1>
                    <div class="select_holder clearfix">
                    	<select>
                        	<option>Select Category</option>
                            <option>Mobile phone</option>
                        </select>
                        <select>
                        	<option>Select Country</option>
                            <option>India</option>
                        </select>
                        <select class="last">
                        	<option>I want to sell</option>
                            <option>I want to buy</option>
                        </select>
                    </div>
                    <div class="btn_holder">
                    	<input type="submit" value="Submit" class="search_btn submit_btn" />
                    </div>
                </div>
                <!-- header2 ends here -->
                
                <div class="category-section">
                	<h2>Select a category below</h2>
                    <div class="category-wrap clearfix">
                    	<h3>Mobiles and Tablets</h3>
                        <ul>
                        	<li><a href="#">Mobiles</a></li>
                            <li><a href="#">Tablets/Notebook</a></li>
                        </ul>
                        <ul>
                        	<li><a href="#">Accessories</a></li>
                            <li><a href="#">Landline Phones</a></li>
                        </ul>
                    </div>
                    
                    <div class="category-wrap clearfix">
                    	<h3>Computers and Accessories</h3>
                        <ul>
                        	<li><a href="#">Desktop</a></li>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Keyboards &amp; Mice</a></li>
                        </ul>
                        <ul>
                        	<li><a href="#">Data Storage</a></li>
                            <li><a href="#">Printers, Fax &amp; photocopy Machines</a></li>
                            <li><a href="#">Computer accessories</a></li>
                        </ul>
                    </div>
                    
                    <div class="category-wrap clearfix">
                    	<h3>Electronics Items &amp; Technology</h3>
                        <ul>
                        	<li><a href="#">Cameras, Digital SLR's &amp; Camera Accessories</a></li>
                            <li><a href="#">LaMP3 &amp; Media Playersptops</a></li>
                            <li><a href="#">Home theaters, speakers &amp; headphones</a></li>
                            <li><a href="#">DVD, Video Players, Play stations</li>
                        </ul>
                        <ul>
                        	<li><a href="#">Projectors</a></li>
                            <li><a href="#">Watches</a></li>
                            <li><a href="#">Home Appliances &amp; Accessories</a></li>
                            <li><a href="#">Office/Industrial Equipment’s</a></li>
                        </ul>
                    </div>
                    
                    <div class="category-wrap clearfix">
                    	<h3>Vehicles</h3>
                        <ul>
                        	<li><a href="#">Bicycle</a></li>
                            <li><a href="#">Motorcycles &amp; scooters</a></li>
                            <li><a href="#">Cars</a></li>  
                        </ul>
                        <ul>
                        	<li><a href="#">Buses, Trucks, Vans &amp; Plant</a></li>
                            <li><a href="#">Vehicles Parts & Accessories </a></li>
                        </ul>
                    </div>
                    
                    <div class="category-wrap clearfix">
                    	<h3>Real Estate</h3>
                        <ul>
                        	<li><a href="#">Independent House/Villas/Bungalows for Sale</a></li>
                            <li><a href="#">Apartments for sale</a></li>
                            <li><a href="#">Land/Plots for sale</a></li>
                            <li><a href="#">Office/Commercial place for sale</a></li>
                        </ul>
                        <ul>
                        	<li><a href="#">Paying Guest/Service Apartments/Hostels</a></li>
                            <li><a href="#">Independent House/Villas/Bungalows for Rent</a></li>
                            <li><a href="#">Apartments for rent</a></li>
                            <li><a href="#">Office/Commercial place for rent</a></li>
                        </ul>
                    </div>
                    
                    <div class="category-wrap clearfix">
                    	<h3>Real Estate</h3>
                        <ul>
                        	<li><a href="#">Home, Kitchen &amp; Garden Appliances</a></li>
                            <li><a href="#">Toys &amp; Baby care</a></li>
                            <li><a href="#">Sports, Fitness &amp; Health</a></li>
                            <li><a href="#">Furniture &amp; Fixtures</a></li>
                        </ul>
                        <ul>
                        	<li><a href="#">Books, stationery &amp; Hobbies</a></li>
                            <li><a href="#">Jewelry, Accessories, &amp; Antiques</a></li>
                            <li><a href="#">Movies, Music &amp; Games</a></li>
                            <li><a href="#">Music Instruments</a></li>
                        </ul>
                    </div>
                    
                </div>
                <!-- category section ends here -->
                
            </div>
	</div>
	</div>
	<div class="span4 sidebar hidden-phone">
		<div class="well">
			<h4>Search</h4>
			<?php echo CHtml::beginForm($this->createUrl('/search'), 'get', array('id' => 'search')); ?>
                <div class="input-append">
                    <?php echo CHtml::textField('q', Cii::get($_GET, 'q', ''), array('type' => 'text', 'style' => 'width: 97%', 'placeholder' => 'Type to search, then press enter')); ?>
                </div>
            <?php echo CHtml::endForm(); ?>
		</div>
        <div class="large-4 small-12 columns sidebar-wrap">
        	<div class="sidebar">
            	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/add1.jpg" style="margin-bottom:15px" />
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/add2.jpg" style="margin-bottom:15px" />
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/add3.jpg" style="margin-bottom:15px" />
            </div>
        </div>		
		
		
	</div>
