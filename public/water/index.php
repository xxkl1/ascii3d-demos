<?php
	$url = strtok("$_SERVER[REQUEST_SCHEME]://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", "\?|#");

	// page basic settings
	$page_title 		= "Ascii3D Water Demo";
	$page_description 	= "Ascii3D Water Demo";
	$page_author		= "Morgan";
	$page_keywords		= "Heledron, Hadron, Cymaera, OpenGL, WebGL, Ascii3D";

	// page open graph settings
	$page_og_title = $page_title;
	$page_og_description = $page_description;
	$page_og_url = $url;
	$page_og_image = dirname($page_og_url, 2) . "/" . "thumbnail.png";
	$page_og_type = "website";
?>
<!DOCTYPE html>
<html class="full-window-document">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	
	<!-- title & favicon -->
	<title><?php echo $page_title;?></title>
	<link rel="icon" href="/favicon.png" type="image/png"/>
	<link rel="canonical" href="<?php echo $page_og_url;?>"/>
	
	<!-- info -->
	<meta name="author" content="<?php echo $page_author;?>"/>
	<meta name="description" content="<?php echo $page_description;?>"/>
	<meta name="keywords" content="<?php echo $page_keywords;?>"/>
	
	<!-- sharing -->
	<meta property="og:title" content="<?php echo $page_og_title;?>"/>
	<meta property="og:description" content="<?php echo $page_og_description;?>"/>
	<meta property="og:url"   content="<?php echo $page_og_url;?>"/>
	<meta property="og:image" content="<?php echo $page_og_image;?>"/>
	<meta property="og:type"  content="<?php echo $page_og_type;?>"/>

	<!-- styles -->
	<style> svg { fill: currentColor; height: 1em; width: 1.5em; } </style>
	<link rel="stylesheet" type="text/css" href="./dst/main.css"/>
	<script type="module" src="./dst/main.js"></script>
</head>
<body>
	<helion-standard-view class="helion-fill-parent">
		<helion-app-bar slot="header" center-title="">
			<helion-app-bar-left>
				<a class="helion-app-bar-icon-button" href="/">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/></svg>
				</a>
			</helion-app-bar-left>
			<helion-app-bar-title>Ascii 3D Water Demo</helion-app-bar-title>
		</helion-app-bar>
		<helion-sidebar-view id=sidebarView slot="body" sidebar-opened>
			<helion-panel slot=sidebar style="overflow: auto;">
				<?php include "./sidebar.html"; ?>
			</helion-panel>
			<helion-stack slot=main>
				<helion-aspect-ratio style="--aspect-ratio: 1; padding: 1em 4em;">
					<canvas class="helion-panel" id=myCanvas></canvas>	
				</helion-aspect-ratio>
				<div class="helion-intangible actionButtons">
					<button title="Information" class="helion-circle-button js-toggleDialog">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path d="M20 424.229h20V279.771H20c-11.046 0-20-8.954-20-20V212c0-11.046 8.954-20 20-20h112c11.046 0 20 8.954 20 20v212.229h20c11.046 0 20 8.954 20 20V492c0 11.046-8.954 20-20 20H20c-11.046 0-20-8.954-20-20v-47.771c0-11.046 8.954-20 20-20zM96 0C56.235 0 24 32.235 24 72s32.235 72 72 72 72-32.235 72-72S135.764 0 96 0z"/></svg>
					</button>
					<button title="Download" class="helion-circle-button js-downloadImage">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"/></svg>
					</button>
					<button title="Toggle Settings" class="helion-circle-button js-toggleSidebar">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z"/></svg>
					</button>
					<button title="Share" class="helion-circle-button js-share">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"/></svg>
					</button>
				</div>
			</helion-stack>
		</helion-sidebar-view>
	</helion-standard-view>

	<helion-panel class="infoDialog helion-fill-parent">
		<div style="max-width: 600px; width: 100%; margin: auto;">
			<?php include "./info.html"; ?>
		</div>

		<div class="helion-intangible helion-fill-parent actionButtons">
			<button class="helion-circle-button js-toggleDialog" title="Close"> 
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"/></svg>
			</button>
		</div>
	</helion-panel>

	<style>
		.infoDialog {
			opacity: 1;
			transition: opacity .2s ease;
			will-change: opacity;
		}

		body:not([data-info-dialog-opened]) .infoDialog {
			opacity: 0;
			pointer-events: none;
		}

		body:not([data-info-dialog-opened]) .infoDialog * {
			pointer-events: none !important;
		}

		.actionButtons {
			display: flex;
			flex-direction: column;
			align-items: flex-end;
			justify-content: start;
			grid-gap: .5em;
			padding: .5em;
		}

		[slot=sidebar] {
			padding: .5em;
		}
	</style>

	<script type="module">
		for (const button of document.querySelectorAll(".js-toggleDialog")) {
			button.onclick = ()=>{
				document.body.toggleAttribute("data-info-dialog-opened");
			}
		}
		
		for (const button of document.querySelectorAll(".js-share")) {
			button.onclick = async ()=>{
				if (!navigator.share) {
					alert("Sharing is not available in this environment.");
					return;
				}
				
				try {
					await navigator.share({
						title: document.title,
						text: (document.querySelector('meta[name="description"]'))?.content ?? document.title,
						url: window.location.href
					});
				} catch(e) {
					if (e.name === "AbortError") return;
					alert("An error occurred: " + e.name);
				}
			}
		}
		
		for (const button of document.querySelectorAll(".js-toggleSidebar")) {
			button.onclick = async ()=>{
				sidebarView.toggleAttribute("sidebar-opened");
			}
		}

		for (const button of document.querySelectorAll(".js-downloadImage")) {
			button.onclick = ()=>{
				const a = document.createElement("a");
				a.href = myCanvas.toDataURL("image/png", undefined);
				a.download = "ascii3d-water.png";
				a.click();
			}
		}

		new ResizeObserver(()=>{
			sidebarView.setAttribute("layout", 
				(sidebarView.clientWidth/sidebarView.clientHeight) < .8 ? "mobile" : "desktop"
			);
		}).observe(sidebarView);
	</script>
</body>
</html>