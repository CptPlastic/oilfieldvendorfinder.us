<!DOCTYPE html>
<html lang="en">
<head>
<!-- Primary Meta Tags -->
<title>OFVF.US Vendors according to AI</title>
<meta name="title" content="OFVF.US Vendors according to AI" />
<meta name="description" content="AI had a go at sketching our vendors' businesses. Time to play 'Where's Waldo' with your company! Let's see if it nailed any resemblance. " />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="https://oilfieldvendorfinder.us/ai.php" />
<meta property="og:title" content="OFVF.US Vendors according to AI" />
<meta property="og:description" content="AI had a go at sketching our vendors' businesses. Time to play 'Where's Waldo' with your company! Let's see if it nailed any resemblance. " />
<meta property="og:image" content="https://oilfieldvendorfinder.us/ai-images/OldSchoolServices-ThruTubingServices.png" />

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="https://oilfieldvendorfinder.us/ai.php" />
<meta property="twitter:title" content="OFVF.US Vendors according to AI" />
<meta property="twitter:description" content="AI had a go at sketching our vendors' businesses. Time to play 'Where's Waldo' with your company! Let's see if it nailed any resemblance. " />
<meta property="twitter:image" content="https://oilfieldvendorfinder.us/ai-images/OldSchoolServices-ThruTubingServices.png" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  .image-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2px;
    padding: 2px;
  }

  .image-item {
    width: 100%;
    height: auto;
    overflow: hidden; /* Ensure the image doesn't overflow its container */
    position: relative; /* Set position relative for absolute positioning */
  }

  .image-item img {
    width: 100%;
    height: auto;
  }

  .enlarged-image-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 2;
    text-align: center;
    backdrop-filter: blur(10px); /* Apply blur effect to background */
  }

  .enlarged-image {
    max-width: 90%;
    max-height: 90%;
    margin: auto;
    display: block;
    margin-top: 5%;
  }

</style>
</style>
</head>
<body>

<div class="image-grid">
  <!-- Replace 'path_to_your_images_folder' with the path to your images folder -->
  <!-- Make sure images are in the same directory or adjust the path accordingly -->
  <?php
    // Get all files in the images folder
    $files = glob("/var/www/vhosts/oilfieldvendorfinder.us/httpdocs/ai-images/*.*");

    // Loop through each file and display it as an image
    foreach ($files as $file) {
        // Extract the file name from the path
        $fileName = basename($file);
        // Encode the file name to be URL safe
        $encodedFileName = urlencode($fileName);
        // Generate the URL to the image using the encoded file name
        $imageUrl = "https://oilfieldvendorfinder.us/ai-images/" . $encodedFileName;
        echo '<div class="image-item"><img src="' . $imageUrl . '" onclick="showEnlargedImage(this.src, \'' . $fileName . '\')" alt=""></div>';
    }
  ?>
</div>

<div class="enlarged-image-container" id="enlarged-image-container">
  <span class="close-button" onclick="hideEnlargedImage()">&times;</span>
  <img id="enlarged-img" class="enlarged-image" src="" alt="">
  <div id="file-name" style="color: white; position: absolute; bottom: 25px; left: 50%; transform: translateX(-50%); background-color: rgba(0, 0, 0, 0.8); padding: 5px 10px; border-radius: 5px;"></div>
</div>

<script>
  function showEnlargedImage(src, fileName) {
    var body = document.querySelector('body');
    var enlargedImageContainer = document.getElementById('enlarged-image-container');
    var enlargedImg = document.getElementById('enlarged-img');
    var fileNameElement = document.getElementById('file-name');
    enlargedImg.src = src;
    fileNameElement.textContent = fileName;
    enlargedImageContainer.style.display = 'block';
    body.style.overflow = 'hidden'; // Disable scrolling
  }

  function hideEnlargedImage() {
    var body = document.querySelector('body');
    var enlargedImageContainer = document.getElementById('enlarged-image-container');
    enlargedImageContainer.style.display = 'none';
    body.style.overflow = 'auto'; // Enable scrolling
  }

  function showEnlargedImage(src, fileName) {
    var body = document.querySelector('body');
    var enlargedImageContainer = document.getElementById('enlarged-image-container');
    var enlargedImg = document.getElementById('enlarged-img');
    var fileNameElement = document.getElementById('file-name');
    enlargedImg.src = src;
    fileNameElement.textContent = fileName;
    enlargedImageContainer.style.display = 'block';
    body.style.overflow = 'hidden'; // Disable scrolling

    // Add event listener to close the enlarged image when clicked anywhere on the screen
    enlargedImageContainer.addEventListener('click', hideEnlargedImage);
  }

  function hideEnlargedImage() {
    var body = document.querySelector('body');
    var enlargedImageContainer = document.getElementById('enlarged-image-container');
    enlargedImageContainer.style.display = 'none';
    body.style.overflow = 'auto'; // Enable scrolling

    // Remove event listener to avoid closing the image when clicking inside it
    enlargedImageContainer.removeEventListener('click', hideEnlargedImage);
  }
</script>

</body>
</html>
