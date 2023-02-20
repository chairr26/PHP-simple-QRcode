<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Latihan Qr COde</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
</head>

<body>
    <div class="container mt-5">
        <h2>Latihan Qr Code</h2>
        <div style="border:1px solid grey; padding:20px; height:auto">
            <form action="<?php echo base_url(); ?>Home/createQR" method="POST">
                <div class="form-group">
                    <label for="exqr">Karakter</label>
                    <input type="text" class="form-control" id="exqr" name="kalimat" placeholder="masukan karakter">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <br><br>



            <?php if (isset($img)) { ?>
                <img style="width:200px;" src="<?= $img; ?>" />
            <?php } ?>
        </div>
    </div>
</body>

</html>