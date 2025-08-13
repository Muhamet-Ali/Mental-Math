<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="insert-block">
            <h1>insert</h1>
            <form action="insertDone.php" method="POST">
                <div class="col-12">
                    <input type="text" name="ques" class="form-control" placeholder="Question" required>
                </div>
                <div class="col-12">
                    <input type="text" name="answer" class="form-control" placeholder="Answer" required>
                </div>
                <div class="col-12">
                    <select name="levelId" class="form-select" required>
                        <option value="">Select Level</option>
                        <option value="1">Level 1</option>
                        <option value="2">Level 2</option>
                        <option value="3">Level 3</option>
                        <option value="4">Level 4</option>
                    </select>
                </div>
                <div class="col-12">
                    <input type="submit" class="btn btn-primary" value="Insert">
                </div>
                <div class="col-12">
                    <a href="admin.php" class="btn btn-danger" >Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <style>
        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .insert-block {
            width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
    </style>
</body>

</html>