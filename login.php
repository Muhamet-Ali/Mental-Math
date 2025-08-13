<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="login">
            <form action="LoginSave.php" method="POST">
                <div class="col-12">
                    <label for="isim">name</label>
                    <input type="text" name="isim" id="isim" class="form-control" required placeholder="isim" >
                </div>
                <div class="col-12">
                    <label for="tlfNo">phone Number</label>
                    <input type="text" name="tlfNo" id="tlfNo" class="form-control" required placeholder="Number" >
                </div>
                <div class="col-12">
                    <label for="yas">Age</label>
                    <input type="text" name="yas" id="yas" class="form-control" required placeholder="Age" >
                </div>
                <div class="col-12">
                    <input type="submit" name="btn" value="Login" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>

    <style>
        .container{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* text-align: center; */
        }
        .login{
            /* text-align: center; */
            background-color: #c4c6ff;
            width: 500px !important;
            padding: 10px;
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
            border-radius: 15px;
        }
        .login div{
            margin: 5px;
        }
        label{
            margin: 3px;
            font-weight: bold;
        }
    </style>
</body>

</html>