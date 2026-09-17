<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="file">
        <button type="submit">Upload</button>
    </form>

    <hr>

    <h3>Uploaded Files</h3>
    <table border="1">
    <tr>
        <th>File Name</th>
        <th>File Path</th>
        <th>File Size</th>
        <th>File Type</th>
        <th>File Date</th>
    </tr>
    @foreach ($files as $file)
        <tr>
            <td>{{ $file->getFilename() }}</td>
            <td>{{ $file->getPath() }}</td>
            <td>{{ $file->getSize() }}</td>
            <td>{{ $file->getExtension() }}</td>
            <td>{{ $file->getMtime() }}</td>
        </tr>
    @endforeach
    </table>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        const form = document.querySelector('form');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const file = document.getElementById('file').files[0];
            const formData = new FormData();
            formData.append('file', file);
            $.ajax({
                url: '/api/upload',
                type: 'POST',
                data: formData,
                processData: false,   
                contentType: false,   
                success: function(response) {
                    console.log(response);
                    alert("File uploaded successfully");
                    window.location.reload();
                },
                error: function(error) {
                    console.error(error);
                    alert("File uploaded failed");
                }
            });
        });
    </script>
</body>
</html>