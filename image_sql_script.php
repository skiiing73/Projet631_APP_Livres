<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
</head>
<body>

<?php
if (isset($_POST['submit'])) {
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageType = $_FILES['image']['type'];
    $imageSize = $_FILES['image']['size'];

    // Lire le fichier image en tant que données binaires
    $imageData = file_get_contents($imageTmpName);

    // Préparer et exécuter la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO images (image_data, image_name) VALUES (?, ?)");
    $stmt->bind_param("bs", $imageData, $imageName);

    if ($stmt->execute()) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
    <h2>Upload Image</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="image">Select image to upload:</label>
        <input type="file" name="image" id="image">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>
