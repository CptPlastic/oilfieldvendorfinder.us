<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AI-OFVF-IMAGES</title>
<style>
  .image-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 0fr));
    gap: 0px;
    padding: 0px;
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
    backdrop-filter: blur(5px); /* Apply blur effect to background */
  }

  .enlarged-image {
    max-width: 90%;
    max-height: 90%;
    margin: auto;
    display: block;
    margin-top: 5%;
  }

  .close-button {
    cursor: pointer;
    position: absolute;
    top: 10px;
    right: 20px;
    color: red;
    font-size: 34px;
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
        echo '<div class="image-item"><img src="' . $imageUrl . '" onclick="showEnlargedImage(this.src, \'' . $fileName . '\')" alt=""></div>';
    }
  ?>
</div>

<div class="enlarged-image-container" id="enlarged-image-container">
  <span class="close-button" onclick="hideEnlargedImage()">&times;</span>
  <img id="enlarged-img" class="enlarged-image" src="" alt="">
  <div id="file-name" style="color: white; position: absolute; bottom: 25px; left: 50%; transform: translateX(-50%); background-color: rgba(0, 0, 0, 0.3); padding: 5px 10px; border-radius: 5px;"></div>
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
</script>

</body>
</html>
