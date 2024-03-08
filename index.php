<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Frequency Counter</title>
    <style>
        /* Style the body and center the form */
        body {
            font-family: Arial, sans-serif;
            background-color: #fce4ec; /* Light pink background */
            text-align: center;
            padding: 20px;
        }

        /* Style the form container */
        form {
            background-color: #fff; /* White form background */
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        /* Style form labels and inputs */
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        textarea,
        select,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        /* Style the submit button */
        input[type="submit"] {
            background-color: #880e4f; /* Darker pink submit button */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #ad1457; /* Darker hover color */
        }
        /*center */
        /* Center the bottom part */
        .result-container {
            max-width: 600px;
            margin: 20px auto;
        }

        /* Style the result table */
        .result-container table {
            background-color: #fce4ec; /* Light pink table background */
            border-collapse: collapse;
            width: 100%;
        }

        .result-container th,
        .result-container td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .result-container th {
            background-color: #c2185b; /* Pink header background */
            color: white;
        }

        .result-container tr:nth-child(even) {
            background-color: #fce4ec; /* Light pink table row background */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Word Frequency Counter</h1>
        <form action="" method="post">
            <label for="inputText">Paste your text here:</label><br>
            <textarea id="inputText" name="inputText" rows="10" cols="50"></textarea><br>

            <label for="sortingOrder">Sorting Order:</label>
            <select id="sortingOrder" name="sortingOrder">
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select><br>

            <label for="displayLimit">Number of Words to Display:</label>
            <input type="number" id="displayLimit" name="displayLimit" value="10" min="1"><br>

            <input type="submit" value="Submit">
        </form>

        <div class="result-container">
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["inputText"])) {
                $inputText = $_POST["inputText"];
                $sortingOrder = $_POST["sortingOrder"];
                $displayLimit = $_POST["displayLimit"];

                $words = str_word_count($inputText, 1);

                $stopWords = ["the", "and", "in", "to", "of", "a", "is", "for", "on"];
                $filteredWords = array_diff($words, $stopWords);
                $wordFrequencies = array_count_values($filteredWords);

                ($sortingOrder === "asc") ? asort($wordFrequencies) : arsort($wordFrequencies);
                
                echo "<h2>Word Frequencies</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Word</th><th>Frequency</th></tr>";
                $counter = 0;
                foreach ($wordFrequencies as $word => $frequency) {
                    if ($counter < $displayLimit) {
                        echo "<tr><td>$word</td><td>$frequency</td></tr>";
                        $counter++;
                    } else {
                        break;
                    }
                }
                echo "</table>";
            }
            ?>
        </div>
    </div>
</body>

<html>