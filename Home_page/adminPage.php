
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
   <style>

        body {
            background: url('https://i.pinimg.com/originals/d4/81/f3/d481f3c72e283309071f79e01b05c06d.gif') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
        }

   
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 100px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

         .btn-grad {background-image: linear-gradient(to right, #FC354C 0%, #0ABFBC  51%, #FC354C  100%)}
         .btn-grad {
            margin: 10px;
            padding: 15px 45px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
            border: none;
          }

          .btn-grad:hover {
            background-position: right center;
            color: #fff;
            text-decoration: none;
          }

    </style>

</head>
  <body class="d-flex justify-content-center align-items-center">
    <div class="form-container">
        <h3 class="text-center">Kirish</h3>
        <form action="/" method="POST">
        
            <div class="row g-3">
              <div class="col">
                <input type="text" id="firstName" name="firstname" class="form-control" placeholder="First name" aria-label="First name" oninput="generateEmail()">
              </div>

              <div class="col">
                <input type="text" id="lastName" name="lastname" class="form-control" placeholder="Last name" aria-label="Last name" oninput="generateEmail()">
              </div>
            </div>

            <br>

            <div class="input-group mb-3">
              <span class="input-group-text">📧</span>
                <div class="form-floating">
                  <input type="email" id="email" class="form-control" id="email" name="email" placeholder="Invalid email" >
                  <label for="email">Invalid email</label>
                </div>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">🔐</span>
                <div class="form-floating">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  <label for="password">Password</label>
                </div>
            </div>

            <div class="row g-2">
              <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-text">Birthday</span>
                    <input type="date" id="birthday" name="birthday" class="form-control">                    
                </div>
              </div>

              <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Gender</span>
                    <select class="form-select">
                        <option selected>Select Gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>
              </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                  <label for="country" class="form-label">Country</label>
                  <input type="text" class="form-control" id="country" name="country" placeholder="Enter the state">
                </div>

                <div class="col-md-6">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="Enter the city">
                </div>
            </div>

            <button class="btn-grad" type="submit">Kirish</button>
        </form>
    </div>

<script>
    function generateEmail() {
            let firstName = document.getElementById("firstName").value.toLowerCase().trim();
            let lastName = document.getElementById("lastName").value.toLowerCase().trim();
            let emailField = document.getElementById("email");

            if (firstName && lastName) {
                emailField.value = firstName + "." + lastName + "@example.com";
            } else {
                emailField.value = "";
            }
    }

    gsap.from(".form-container", { opacity: 0, y: 50, duration: 1 });

    gsap.from("input", { opacity: 0, y: 20, stagger: 0.3, duration: 1 });

</script>

</body>

</html>
