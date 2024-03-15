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
    transition: transform 0.3s ease; /* Add transition effect */
  }

  .image-item:hover img {
    transform: scale(1.1); /* Increase size on hover */
  }

  /* Position the enlarged image on hover */
  .image-item:hover:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    z-index: 1; /* Ensure it appears above the image */
    transition: opacity 0.3s ease; /* Add transition effect */
    opacity: 0; /* Initially hidden */
  }

  /* Show the enlarged image on hover */
  .image-item:hover:after {
    opacity: 1;
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
        echo '<div class="image-item"><img src="' . $imageUrl . '" alt=""></div>';
    }
  ?>
</div>

</body>
</html>
