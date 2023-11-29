<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('bootstrap-5.3.2-dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>
<body>
<?= $this->include('layout/navbar') ?>
<div class="container">
    <div class="info">
		<table class="table table-bordered">
			<tr>
				<td colspan="2" class="text-start">
					<button class="btn btn-primary" onclick="changeName()">Change Name</button>
				</td>
            </tr>
            <tr>
                <td id="nameCellLabel"><h3>Nama:</h3></td>
                <td id="nameCellValue"><h3><?= $name ?></h3></td>
            </tr>
			<tr>
				<td>NPM:</td>
				<td><?= $npm ?></td>
			</tr>
			<tr>
				<td>Matkul:</td>
				<td><?= $class ?></td>
			</tr>
			<tr>
				<td>No. HP:</td>
				<td>
					<a href="https://wa.me/6281290264815" target="_blank">
						<i class="fab fa-whatsapp"></i> <?= $phone ?>
					</a>
				</td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><?= $email ?></td>
			</tr>
			<tr>
				<td>Username:</td>
				<td><?= $username ?>
					<a href="https://github.com/raditya2010631170111" target="_blank" class="btn btn-secondary">
						<i class="fab fa-github"></i> GitHub Profile
					</a>
				</td>
			</tr>
		</table>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="<?= base_url('bootstrap-5.3.2-dist/js/bootstrap.min.js'); ?>"></script>
	
<script>
    function changeName() {
        var nameCellLabel = document.getElementById("nameCellLabel");
        var nameCellValue = document.getElementById("nameCellValue");
        var classCell = document.getElementById("classCell");
        
        var newNameLabel = "Nickname:";
        var newNameValue = "<?= $nickname ?>"; 
        var newClass = "New Class";
        
        if (nameCellLabel.innerHTML.includes("Nama:")) {
            nameCellLabel.innerHTML = "<h3>" + newNameLabel + "</h3>";
            nameCellValue.innerHTML = "<h3>" + newNameValue + "</h3>";
            classCell.innerText = newClass;
        } else {
            nameCellLabel.innerHTML = "<h3>Nama:</h3>";
            nameCellValue.innerHTML = "<h3><?= $name ?></h3>";
            classCell.innerText = $class;
        }
    }
</script>

</body>
</html>
