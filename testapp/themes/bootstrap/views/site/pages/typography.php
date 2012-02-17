<?php 
$this->pageTitle=Yii::app()->name . ' - Base CSS - Sidebar';
$this->breadcrumbs=array(
	'Base CSS',
	'Buttons',
);
?>

<div class="page-header">
	<h1>Heading h1 <small>small tag</small></h1>
</div>

<h2>Inline Style</h2>
<p>Lorem ipsum dolor sit amet, <strong>consectetuer adipiscing</strong> elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris <em>accumsan vulputate</em> tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, <abbr title="I dont know">hendrerit</abbr> in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh <em>bibendum</em> imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>

<h3>Address</h3>
<address>
	<strong>My Address</strong><br />
	Mainstreet 1<br />
	123456 City<br />
	State<br />
</address>

<h4>Blockquote</h4>
<blockquote cite="http://www.example.org">
	<p>Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede.</p>
	<small>The Author</small>
</blockquote>

<h5>Lists</h5>

<div class="row">
	<div class="span3">
		<ul>
			<li>Unordred</li>
			<li>List</li>
			<li>Unordred</li>
			<li>List</li>
		</ul>
	</div>
	
	<div class="span3">
		<ul class="unstyled">
			<li>Unstyled</li>
			<li>List</li>
			<li>Unstyled</li>
			<li>List</li>
			<li>
				<ul>
					<li>Styled</li>
					<li>List</li>
				</ul>
			</li>
		</ul>
	</div>
	
	<div class="span3">
		<ol>
			<li>Ordered</li>
			<li>List</li>
			<li>Ordered</li>
			<li>List</li>
			<li>Ordered</li>
			<li>List</li>
		</ol>
	</div>
	
	<div class="span3">
		<dl>
			<dt>Description</dt>
			<dd>Nullam ultrices, nisi quis scelerisque convallis.</dd>
		</dl>
		<dl>
			<dt>Description</dt>
			<dd>Nullam ultrices, nisi quis scelerisque convallis.</dd>
		</dl>
	</div>

</div>