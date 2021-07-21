<!DOCTYPE html>
<html>
    <head>
        <title>codeigniter Crud tutorial on codesource.io</title>
        <!-- latest compiled and minified css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <style>

            .container {
                max-width: 500px;
            }

            .error {
                display: block;
                padding-top: 5px;
                font-size: 14px;
                color: red;
            }

        </style>
    </head>
    <body>
        <div class="container mt-5">
            <form method="post" id="addname" name="addname" action="<?php site_url('/submit-form')?>">
                <div class="form-group">
                    <label>name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label>email</label>
                    <input type="text" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add name & email</button>
                </div>             
            </form>
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
    <script>
        if ($("#add_create").length > 0) {
            $("#add_create").validate({
                rules: {
                    name: {
                        required: true;
                    },
                    email: {
                        required: true,
                        maxlength: 60,
                        email: true,
                    },
                },
                message: {
                    name: {
                        required: "Name is required.",
                    },
                    email: {
                        required: "Email is required.",
                        maxlength: "The email can be up to 60 characters long.",
                        email: "It does not seem to be a valid email.",
                    },
                },
            })
        }
    </script>
    </body>
</html>