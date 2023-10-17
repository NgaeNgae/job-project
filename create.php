<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    $show = "hidden";
    require_once('./userController.php');
    if (isset($_POST['save'])) {
        $user = new userController();
        if (!$user->show($_POST['email'])) {
            $data = $user->store($_POST);
            $hidden = "hidden";
            $show = "";
        } else {
            $error = "this user already register";
        }
    }
    ?> <card class="<?php echo $show ?>">
        <div class=" mx-auto mt-20 p-5 rounded-lg bg-blue-500 w-[30%]">
            <h1 class="py-5">Name : <?php echo $data['name'] ?></h1>
            <h1 class="py-5">Email : <?php echo $data['email'] ?></h1>
        </div>
    </card>
    <form class="bg-blue-500 <?php echo $hidden ?> font-serif mt-20 p-5 w-[30%] mx-auto" action="create.php"
        method="post">
        <h1 class=" text-3xl text-center text-blue-700 font-lg">Create Page</h1>
        <div class="my-4">
            <label>Name</label>
            <input class="rounded mt-3 py-1 px-3 outline-none w-full" name="name" type="text" required>
        </div>
        <div class="my-4">
            <label>Email</label>
            <input class="rounded mt-3 py-1 px-3 outline-none w-full" name="email" type="email" required>
            <p class="text-rose-700 text-lg"><?php echo  $error ?></p>
        </div>
        <div class="my-4">
            <label>Password</label>
            <input class="rounded mt-3 py-1 px-3 outline-none w-full" name="password" type="password" required>
        </div>
        <button class="w-full bg-blue-700 py-2 text-xl" name="save" type="submit">Create</button>
    </form>
</body>

</html>