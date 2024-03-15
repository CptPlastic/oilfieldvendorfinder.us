<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AI-OFVF-IMAGES</title>
<style>
  .image-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 10px;
    padding: 10px;
  }

  .image-item {
    width: 100%;
    height: auto;
  }

  .image-item img {
    width: 100%;
    height: auto;
  }
</style>
</head>
<body>

<div class="image-grid">
  <!-- Replace 'path_to_your_images_folder' with the path to your images folder -->
  <!-- Make sure images are in the same directory or adjust the path accordingly -->
 <?php
    // Get all files in the images folder
    $files = glob("/httpdocs/ai-images/*.*");

    // Loop through each file and display it as an image
    foreach ($files as $file) {
      echo '<div class="image-item"><img src="' . $file . '" alt=""></div>';
    }
  ?>
</div>

</body>
</html>
