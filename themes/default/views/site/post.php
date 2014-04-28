<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Post a Free Ad';
$this->breadcrumbs=array(
	'Post a Ad',
);
?>

	<div class="span12">
    	<div class="large-8 small-12 columns content-wrap">
        	<div class="content-part contact-us post-ads">
            <h1>Post your free ad</h1>
            	<form action="" method="">
                	<ul>
                    	<li><label>Category</label>
                        	<select>
                            	<option>Mobile &amp; tablets</option>
                                <option>Computers and Accessories</option>
                                <option>Electronics Items & Technology</option>
                                <option>Vehicles</option>
                                <option>Real Estate</option>
                            </select>
                        </li>
                        <li><label>Type of ad</label>
                        	<div class="radio-group clearfix">
                        		<div class="first-radio"><input type="radio" /> <span>Seller</span></div>
                            	<div class="second-radio"><input type="radio" /> <span>Buyer</span></div>
                            </div>
                        </li>
                        <li><label>Country</label>
                        	<input type="text" />
                        </li>
                        <li><label>City</label>
                        	<input type="text" />
                        </li>
                        <li><label>Your Locality</label>
                        	<input type="text" />
                        </li>
                        <li><label>Title of the Ad</label>
                        	<input type="text" />
                        </li>
                        <li>
                        	<label>Condtion</label>
                            <div class="radio-group clearfix">
                            <div class="first-radio"><input type="radio" /> <span>Used</span></div>
                            <div class="second-radio"><input type="radio" /> <span>New</span></div>
                            </div>
                        </li>
                        <li>
                        	<label>Photos for your ad</label>
                            <button type="button" class="btn btn-default btn-lg">
                              Add Photo
                            </button>
                            
                        </li>
                        <li>
                        	<label>Price</label>
                            <input type="text" />
                        </li>
                        <li>
                        	<label>Description</label>
                            <textarea></textarea>
                        </li>
                    </ul>
                    
                    <h3>User Information</h3>
                    <ul>
                    	<li><label>You are</label>
                        	<div class="radio-group clearfix">
                        	<div class="first-radio"><input type="radio" /> <span>Individual</span></div>
                            <div class="second-radio"><input type="radio" /> <span>Dealer</span></div>
                            </div>
                        </li>
                        <li><label>Name</label>
                        	<input type="text" />
                        </li>
                        <li><label>Email ID</label>
                        	<input type="text" />
                        </li>
                        <li><label>Mobile No.</label>
                        	<input type="text" />
                        </li>
                    </ul>
                    <div class="btn-holder">
                    	By clicking "Post", you agree to our Terms of Use & Privacy Policy.<br />
                        <input type="submit" value="Post" class="btn btn-success"/>
                    </div>
                </form>
            </div>
        </div>
    </div>