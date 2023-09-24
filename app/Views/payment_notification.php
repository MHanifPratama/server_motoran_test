<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?=base_url('/user/store')?>" method="post">
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>NPM</td>
            <td>:</td>
            <td><input type="text" name="npm"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Simpan"></td>
        </tr>
    </table>
    </form>
</body>
</html>