<?php
#const FILE_PATH = 'https://adventofcode.com/2024/day/1/input';
const FILE_PATH = 'input.txt';
const NUMBER_DELIMITER = '   ';

// Opening the input file stream
$fileStream = fopen(FILE_PATH, 'rb');

// Initial preparation of number lists
$numberArray1 = [];
$numberArray2 = [];

// Reads the file by rows
while (($row = fgets($fileStream)) !== false)
{
    // Split the row to two numbers
    $numbers = explode(NUMBER_DELIMITER, $row, 2);

    // Push  the numbers into their separated lists
    $numberArray1[] = (int) $numbers[0];
    $numberArray2[] = (int) $numbers[1];
}

// File read ends, closing the stream
fclose($fileStream);

// Sort the number arrays
sort($numberArray1, SORT_NUMERIC);
sort($numberArray2, SORT_NUMERIC);

// Size of the array (number of rows in the original file)
$rowCount = count($numberArray1);

// Initial state of the difference sum
$sum = 0;
$similarityScoreTable = [];

// Summing differences of the numbers and building similarity score table
for ($i = 0; $i < $rowCount; $i++)
{
    $sum += abs($numberArray1[$i] - $numberArray2[$i]);

    $similarityScoreTable[$numberArray2[$i]] = ($similarityScoreTable[$numberArray2[$i]] ?? 0) + 1;
}


// Calculation of the similarity score
$similarityScore = 0;
foreach ($numberArray1 as $keyNumber)
{
    $similarityScore += $keyNumber * ($similarityScoreTable[$keyNumber] ?? 0);
}


// Printing the results
echo 'Sum of differences: ' . $sum . PHP_EOL;
echo 'SimilarityScore: ' . $similarityScore . PHP_EOL;

?>
