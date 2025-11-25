
<?php>
//store student names in a array
$students=array("manisha","niya","karuna","sanjay");

//display original array using print_r()
echo "<h2>Original array:</h2>";
print_r($students);

//sort array in ascending order using asort()
$asc_students=$students;
asort($asc_students);
echo "<h2>Sorted in Ascending order(asort):</h2>";
print_r($asc_students);
echo "<br>"

//sort array in descending order using arsort()
$desc_students=$students;
arsort($des_students);
echo "<h2>Sorted in descending order (arsort):</h2>";
print_r($des_students);
?>

