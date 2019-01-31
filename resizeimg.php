<?php
/**
 * Image resize
 * @param int $width
 * @param int $height
 */
function resize($width, $height,$index){
  /* Get original image x y*/
  list($w, $h) = getimagesize($_FILES['image']['tmp_name'][$index]);
  /* calculate new image size with ratio */
  $ratio = max($width/$w, $height/$h);
  $h = ceil($height / $ratio);
  $x = ($w - $width / $ratio) / 2;
  $w = ceil($width / $ratio);
  /* new file name */
  $path = 'questionImages/'.$width.'x'.$height.'_'.$_FILES['image']['name'][$index];
  /* read binary data from image file */
  $imgString = file_get_contents($_FILES['image']['tmp_name'][$index]);
  /* create image from string */
  $image = imagecreatefromstring($imgString);
  $tmp = imagecreatetruecolor($width, $height);
  imagecopyresampled($tmp, $image,
    0, 0,
    $x, 0,
    $width, $height,
    $w, $h);
  /* Save image */
  switch ($_FILES['image']['type'][$index]) {
    case 'image/jpeg':
      imagejpeg($tmp, $path, 100);
      break;
    case 'image/png':
      imagepng($tmp, $path, 0);
      break;
    case 'image/gif':
      imagegif($tmp, $path);
      break;
    default:
      exit;
      break;
  }
  return $path;
  /* cleanup memory */
  imagedestroy($image);
  imagedestroy($tmp);
}
?>