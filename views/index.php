<!doctype html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<div class="container">
    <h2>Registration Form</h2>
    <form action="/intership/registrationForm/user/registration" method="post">
        <div class="form-group">
            <label for="fullName">Name:</label>
            <input type="text" id="same" name="name" >
        </div>
        <div class="form-group">
            <label for="fullName">Surname:</label>
            <input type="text" id="nurname" name="surname" >
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" >
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" >
        </div>
        <div class="form-group">
            <label for="fullName">Password:</label>
            <input type="password" id="password" name="password" >
        </div>
        <div class="form-group">
            <label for="email">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" >
        </div>
        <div class="form-group">
            <?= (isset($_SESSION['msg'])) ? $_SESSION['msg'] : null; ?>
        </div>
        <button type="submit" name ="registration">Submit</button>
    </form>
</div>
</body>
</html>