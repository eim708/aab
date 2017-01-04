<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<body>
    <?php if(isset($_SESSION)) {
        echo $this->session->flashdata('flash_data');
    } ?>
 
    <form action="<?= site_url('login') ?>" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" />
        <br/>
        <label for="password">Password</label>
        <input type="text" name="password" />
        <br/>
        <button type="submit">Login</button>
    </form>
</body>
</html>