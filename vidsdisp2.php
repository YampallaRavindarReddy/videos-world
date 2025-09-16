<!DOCTYPE html>
<html>
<head>
    <title>Scroll Load Data</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        table { width: 100%; border-collapse: collapse; }
        td { border: 1px solid #ccc; padding: 8px; }
    </style>
</head>
<body>

    <table id="dataTable">
        <thead>
            <tr>
                <th>Header 1</th>
                <th>Header 2</th>
                <th>Header 3</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will be appended here -->
        </tbody>
    </table>

    <div id="loading" style="display: none; text-align: center; padding: 10px;">Loading more data...</div>

    <script>
        $(document).ready(function() {
            var offset = 0; // Initial offset
            var loading = false; // Flag to prevent multiple AJAX requests

            // Function to load data
            function loadMoreData() {
                if (loading) return; // Prevent multiple calls
                loading = true;
                $('#loading').show();

                $.ajax({
                    url: 'fetch.php',
                    type: 'GET',
                    data: { offset: offset },
                    success: function(response) {
                        if (response.trim() !== '') {
                            $('#dataTable tbody').append(response);
                            //offset += 9; // Increment offset by the limit (9 in this case)
                        } else {
                            // No more data to load
                            $('#loading').html('No more data to load.');
                        }
                        loading = false;
                        $('#loading').hide();
                    },
                    error: function() {
                        loading = false;
                        $('#loading').hide();
                        alert('Error loading data.');
                    }
                });
            }

            // Load initial data
            loadMoreData();

            // Detect scroll to bottom
            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) { // Adjust 100px threshold as needed
                    loadMoreData();
                }
            });
        });
    </script>

</body>
</html>