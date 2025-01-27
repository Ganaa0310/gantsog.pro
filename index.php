<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="home.css">
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search" />

</head>

<body>
	<?php include 'header.php' ?>
	<div class="banner">
		<img src="banner.webp" style="width:100%; height:85vh; object-fit:cover;">
		<div class="banner_texts">
			<h1>Welcome to Code Community</h1>
		</div>
	</div>
	<nav>
		<a href="#entertaining" onclick="showTab('entertaining')">Entertaining</a>
		<a href="#trending" onclick="showTab('trending')">Trending</a>
		<a href="#latest" onclick="showTab('latest')">Latest</a>
		<a href="#top" onclick="showTab('top')">Top</a>
	</nav>
	<div class="container">
		<div id="entertaining" class="tab-content active">
			<h2>Entertaining Code Problems</h2>
			<p>Add your amusing coding challenges here!</p>
		</div>
		<div id="trending" class="tab-content">
			<h2>Trending Code Problems</h2>
			<p>Check out the most asked coding problems!</p>
		</div>
		<div id="latest" class="tab-content">
			<h2>Latest Code Problems</h2>
			<p>Stay updated with the newest coding challenges!</p>
			<ul>
				<li>Problem 1: Find the Missing Number in an Array</li>
				<li>Problem 2: Reverse a String Without Using Built-In Methods</li>
				<li>Problem 3: Calculate Fibonacci Series Using Recursion</li>
			</ul>
		</div>
		<div id="top" class="tab-content">
			<h2>Top Code Problems</h2>
			<p>Explore the most popular and top-rated coding challenges!</p>
			<ul>
				<li>Problem 1: Two Sum (LeetCode)</li>
				<li>Problem 2: Merge Intervals (LeetCode)</li>
				<li>Problem 3: Longest Substring Without Repeating Characters (LeetCode)</li>
			</ul>
		</div>
	</div>
	<footer>
		<p>&copy; 2025 Code Community. All rights reserved. | <a href="terms.html">Terms of Use</a> | <a
				href="privacy.html">Privacy Policy</a></p>
	</footer>
	<script>
		function showTab(tabId) {
			const tabs = document.querySelectorAll('.tab-content');
			tabs.forEach(tab => {
				tab.classList.remove('active');
			});
			document.getElementById(tabId).classList.add('active');
		}
	</script>
	<script src="https://kit.fontawesome.com/a692e1c39f.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"></script>
</body>

</html>