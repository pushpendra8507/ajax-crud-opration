<?php
$conn=  mysqli_connect("localhost",'root','','test');

if (isset($_POST['action']) && $_POST['action'] == 'load') {
    // $start = intval($_POST['start']);
    // $limit = intval($_POST['limit']);

    // Query to fetch data in chunks of 100 (limit/offset)
    $result = $conn->query("SELECT * FROM employee ");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo 'end'; // If no data left to load
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Infinite Scroll with Table</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        #loading {
            display: none;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h2>Infinite Scroll with Table</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody id="data-container"></tbody>
    </table>
    <div id="loading">Loading...</div>

    <script>
        let start = 0;
        const limit = 100; // Fetch 100 records per scroll
        let reachedEnd = false;

        function loadData() {
            if (reachedEnd) return;

            $('#loading').show();

            $.ajax({
                url: '', // Same file (index.php)
                method: 'POST',
                data: { action: 'load', start: start, limit: limit },
                success: function(response) {
                    $('#loading').hide();
                    if (response.trim() === 'end') {
                        reachedEnd = true;
                    } else {
                        $('#data-container').append(response);
                        start += limit; // Increase start for next set of records
                    }
                }
            });
        }

        // Initial Data Load
        loadData();

        // Detect Scroll Event
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                loadData(); // Load more data when user scrolls near bottom
            }
        });
    </script>
</body>
</html>
