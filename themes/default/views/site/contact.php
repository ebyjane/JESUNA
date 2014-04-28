<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Contact';
$this->breadcrumbs=array(
	'Contact',
);
?>

	<div class="span12">
    	<div class="large-8 small-12 columns content-wrap">
        	<div class="content-part contact-us">
            	<h1>Please fill in the form to contact us</h1>
            	<form action="" method="">
                	<ul>
                    	<li><label>Contact Godwelling</label>
                        	<select>
                        		<option>Support Team</option>
                                <option>Business Development</option>
                                <option>Press</option>
                                <option>Advertising</option>
                        	</select>
                        </li>
                        <li><label>Full Name</label>
                        	<input type="text" />
                        </li>
                        <li><label>Your Email Address</label>
                        	<input type="text" />
                        </li>
                        <li><label>Subject</label>
                        	<input type="text" />
                        </li>
                        <li><label>Message</label>
                        	<textarea></textarea>
                        </li>
                        <li class="btn-holder">
                        	<input type="submit" value="Submit" class="btn btn-success" />
                            <input type="reset" value="Reset" class="btn btn-default" />
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
