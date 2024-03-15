<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AI-OFVF-IMAGES</title>
<style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
  }

  .image-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 5px;
    padding: 5px;
  }

  .image-item {
    position: relative;
  }

  .image-item img {
    width: 100%;
    height: auto;
    display: block;
  }

  .file-name {
    display: none; /* Initially hide file names */
    color: white;
    font-weight: bold;
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    padding: 5px 10px;
    border-radius: 5px;
  }

  .enlarged-image-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.9);
    z-index: 2;
    text-align: center;
    overflow-y: auto;
  }

  .close-button {
    cursor: pointer;
    position: absolute;
    top: 10px;
    right: 20px;
    color: white;
    font-size: 24px;
    z-index: 3;
  }
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
        echo '<div class="image-item"><img src="' . $imageUrl . '" alt=""><div class="file-name">' . $fileName . '</div></div>';
    }
  ?>
</div>

<div class="enlarged-image-container" id="enlarged-image-container">
  <span class="close-button" onclick="hideEnlargedImage()">&times;</span>
  <img id="enlarged-img" class="enlarged-image" src="" alt="">
  <div id="file-name" class="file-name"></div>
</div>

<script>
  function showEnlargedImage(src, fileName) {
    var body = document.querySelector('body');
    var enlargedImageContainer = document.getElementById('enlarged-image-container');
    var enlargedImg = document.getElementById('enlarged-img');
    var fileNameElement = document.getElementById('file-name');
    enlargedImg.src = src;
    fileNameElement.textContent = fileName;
    enlargedImageContainer.style.display = 'flex';
    body.style.overflow = 'hidden'; // Disable scrolling
  }

  function hideEnlargedImage() {
    var body = document.querySelector('body');
    var enlargedImageContainer = document.getElementById('enlarged-image-container');
    enlargedImageContainer.style.display = 'none';
    body.style.overflow = 'auto'; // Enable scrolling
  }
</script>

</body>
</html>
