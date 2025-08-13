<?php
session_start();
if (!isset($_SESSION['adminName']) || !isset($_SESSION['adminPassword'])) {
    header("Location: adminLogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/admin.css" />
</head>

<body>
    <?php
    include('conn.php');
    $levelOne = $connection->query("SELECT * FROM question WHERE levelId = 1");
    $levelTwo = $connection->query("SELECT * FROM question WHERE levelId = 2");
    $levelThree = $connection->query("SELECT * FROM question WHERE levelId = 3");
    $levelFour = $connection->query("SELECT * FROM question WHERE levelId = 4");
    ?>
    <div class="container">
        <h1>Admin page</h1>

        <div class="questions">
            <h2>Questions</h2>
            <div class="selectLevelDiv">
                <form method="POST">
                    <select name="selectLevel" id="selectLevel" class="form-select">
                        <option value="">Select Level</option>
                        <option value="1">Level 1</option>
                        <option value="2">Level 2</option>
                        <option value="3">Level 3</option>
                        <option value="4">Level 4</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Select</button>
                </form>
            </div>
            <br>
            <div class="table-wrapper">
                <table class="table table-striped-columns">
                    <tr>
                        <td style="font-weight: bold;">Level Number</td>
                        <td style="font-weight: bold;">Question</td>
                        <td style="font-weight: bold;">Answer</td>
                        <td style="font-weight: bold;">action</td>
                        <td><a href="insert.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a></td>
                    </tr>
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $levelId = $_POST['selectLevel'];
                        if ($levelId == 1) {
                            while ($rowOne = $levelOne->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td> <?php echo $rowOne['levelId']; ?></td>
                                    <td><?php echo $rowOne['ques']; ?></td>
                                    <td><?php echo $rowOne['answer']; ?></td>
                                    <td>
                                        <a href="delete.php?id=<?php echo $rowOne['id'] ?>" class="btn btn-danger"
                                            style="font-size: 10px;"
                                            onclick="return confirm('Bu öğeyi silmek istediğinize emin misiniz?');"><i
                                                class="fa-solid fa-minus"></i></a>
                                    </td>
                                    <td>
                                        <a href="update.php?id=<?php echo $rowOne['id']; ?>" class="btn btn-warning"
                                            style="font-size: 10px;"><i class="fa-solid fa-pen"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else if ($levelId == 2) {
                            while ($rowTwo = $levelTwo->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td> <?php echo $rowTwo['levelId']; ?></td>
                                        <td><?php echo $rowTwo['ques']; ?></td>
                                        <td><?php echo $rowTwo['answer']; ?></td>
                                        <td>
                                            <a href="delete.php?id=<?php echo $rowTwo['id']; ?>" class="btn btn-danger"
                                                style="font-size: 10px;"><i class="fa-solid fa-minus"></i></a>
                                        </td>
                                        <td>
                                            <a href="update.php?id=<?php echo $rowTwo['id']; ?>" class="btn btn-warning"
                                                style="font-size: 10px;"><i class="fa-solid fa-pen"></i></a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        } else if ($levelId == 3) {
                            while ($rowThree = $levelThree->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td> <?php echo $rowThree['levelId']; ?></td>
                                            <td><?php echo $rowThree['ques']; ?></td>
                                            <td><?php echo $rowThree['answer']; ?></td>
                                            <td>
                                                <a href="delete.php?id=<?php echo $rowThree['id']; ?>" class="btn btn-danger"
                                                    style="font-size: 10px;"
                                                    onclick="return confirm('Bu öğeyi silmek istediğinize emin misiniz?');">
                                                    <i class="fa-solid fa-minus"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="update.php?id=<?php echo $rowThree['id']; ?>" class="btn btn-warning"
                                                    style="font-size: 10px;">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                            </td>
                                        </tr>
                                <?php
                            }
                        } else if ($levelId == 4) {
                            while ($rowFour = $levelFour->fetch_assoc()) {
                                ?>
                                            <tr>
                                                <td> <?php echo $rowFour['levelId']; ?></td>
                                                <td><?php echo $rowFour['ques']; ?></td>
                                                <td><?php echo $rowFour['answer']; ?></td>
                                                <td>
                                                    <a href="delete.php?id=<?php echo $rowFour['id'] ?>" class="btn btn-danger"
                                                        style="font-size: 10px;"
                                                        onclick="return confirm('Bu öğeyi silmek istediğinize emin misiniz?');"><i
                                                            class="fa-solid fa-minus"></i></a>
                                                </td>
                                                <td>
                                                    <a href="update.php?id=<?php echo $rowFour['id'] ?>" class="btn btn-warning"
                                                        style="font-size: 10px;"><i class="fa-solid fa-pen"></i></a>
                                                </td>
                                            </tr>
                                <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <br>
        <div class="students">
            <h2>Students</h2>
            <?php
            $scoreStudents = $connection->query("SELECT * FROM score");
            ?>
            <div class="scoreStudents">
                <table class="table table-striped-columns">
                    <tr>
                        <td style="font-weight: bold;">students Name</td>
                        <td style="font-weight: bold;">Score</td>
                        <td style="font-weight: bold;">level id</td>
                    </tr>
                    <?php while ($rowScore = $scoreStudents->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $rowScore['studentName'] ?></td>
                            <td><?php echo $rowScore['score'] ?></td>
                            <td><?php echo $rowScore['levelid'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <script>


    </script>
</body>

</html>