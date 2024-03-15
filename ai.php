<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AI-OFVF-IMAGES</title>
<style>
  .image-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 5px;
    padding: 5px;
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

  .enlarged-image {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 2;
    text-align: center;
  }

  .enlarged-image img {
    max-width: 90%;
    max-height: 90%;
    margin: auto;
    display: block;
    margin-top: 5%;
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
        echo '<div class="image-item"><img src="' . $imageUrl . '" onclick="showEnlargedImage(this.src)" alt=""></div>';
    }
  ?>
</div>

<div class="enlarged-image" id="enlarged-image">
  <span onclick="hideEnlargedImage()" style="cursor: pointer; position: absolute; top: 10px; right: 20px; color: white; font-size: 24px;">&times;</span>
  <img id="enlarged-img" src="" alt="">
</div>

<script>
  function showEnlargedImage(src) {
    var enlargedImage = document.getElementById('enlarged-image');
    var enlargedImg = document.getElementById('enlarged-img');
    enlargedImg.src = src;
    enlargedImage.style.display = 'block';
  }

  function hideEnlargedImage() {
    var enlargedImage = document.getElementById('enlarged-image');
    enlargedImage.style.display = 'none';
  }
</script>

</body>
</html>
