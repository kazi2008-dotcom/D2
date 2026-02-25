<?php  
include('db.php'); 
session_start();  
  
$message_sent = false;  
$error_message = "";  
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $name = mysqli_real_escape_string($conn, $_POST['name']);  
    $email = mysqli_real_escape_string($conn, $_POST['email']);  
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);  
    $msg = mysqli_real_escape_string($conn, $_POST['message']);  
  
    $sql = "INSERT INTO contact_messages (name, email, subject, message)   
            VALUES ('$name', '$email', '$subject', '$msg')";  
  
    if (mysqli_query($conn, $sql)) {  
        $message_sent = true;  
    } else {  
        $error_message = "Error: " . mysqli_error($conn);  
    }  
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | DesiDelight</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { 
            --desi-green: #198754; 
            --desi-gold: #ffc107;
            --dark-accent: #212529;
        }
        
        body { background-color: #fdfdfd; font-family: 'Segoe UI', Roboto, sans-serif; }
        
        /* Gradient Header */
        .contact-header { 
            background: linear-gradient(135deg, var(--desi-green) 0%, #0d4d2f 100%); 
            color: white; 
            padding: 80px 0;
            margin-bottom: -50px;
        }

        /* Modern Card Styling */
        .main-card { 
            border: none; 
            border-radius: 20px; 
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1); 
        }

        .info-sidebar {
            background: var(--dark-accent);
            color: white;
            padding: 40px;
            height: 100%;
        }

        .form-container {
            padding: 40px;
            background: white;
        }

        .btn-success {
            background-color: var(--desi-green);
            border: none;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #146c43;
            transform: translateY(-2px);
        }

        .contact-icon {
            width: 45px;
            height: 45px;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-right: 15px;
            color: var(--desi-gold);
        }

        .form-control:focus {
            border-color: var(--desi-green);
            box-shadow: 0 0 0 0.25 darkgreen;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-success" href="index.php">Desi<span class="text-white">Delight</span></a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="products.php">Shop</a>
            <a class="nav-link active" href="contact.php">Contact</a>
        </div>
    </div>
</nav>

<header class="contact-header text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Get In Touch</h1>
        <p class="lead opacity-75">Have questions about our spices or sweets? We're here to help!</p>
    </div>
</header>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card main-card">
                <div class="row g-0">
                    <div class="col-md-5 info-sidebar d-flex flex-column justify-content-center">
                        <h3 class="mb-4">Contact Information</h3>
                        <p class="mb-5 opacity-75">Fill out the form and our team will get back to you within 24 hours.</p>
                        
                        <div class="d-flex align-items-center mb-4">
                            <div class="contact-icon"><i class="fas fa-phone"></i></div>
                            <div>
                                <h6 class="mb-0">Call Us</h6>
                                <small>+91 12345677890</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                            <div>
                                <h6 class="mb-0">Email Us</h6>
                                <small>hello@desidelight.com</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-5">
                            <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <h6 class="mb-0">Visit Us</h6>
                                <small>123 Desi Delight, ABC, India</small>
                            </div>
                        </div>

                        <div class="social-links d-flex gap-3">
                            <a href="#" class="text-white"><i class="fab fa-facebook fa-lg"></i></a>
                            <a href="#" class="text-white"><i class="fab fa-instagram fa-lg"></i></a>
                            <a href="#" class="text-white"><i class="fab fa-twitter fa-lg"></i></a>
                        </div>
                    </div>

                    <div class="col-md-7 form-container">
                        <?php if ($message_sent): ?>
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                                </div>
                                <h2 class="fw-bold">Message Sent!</h2>
                                <p class="text-muted">Thank you, <?php echo htmlspecialchars($name); ?>. We've received your inquiry.</p>
                                <a href="index.php" class="btn btn-success px-4 mt-3">Return Home</a>
                            </div>
                        <?php else: ?>
                            <?php if ($error_message): ?>
                                <div class="alert alert-danger"><?php echo $error_message; ?></div>
                            <?php endif; ?>

                            <form action="contact.php" method="POST">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Your Name</label>
                                        <input type="text" name="name" class="form-control form-control-lg" placeholder="John Doe" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Email Address</label>
                                        <input type="email" name="email" class="form-control form-control-lg" placeholder="name@example.com" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Subject</label>
                                        <input type="text" name="subject" class="form-control form-control-lg" placeholder="How can we help?">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Message</label>
                                        <textarea name="message" class="form-control" rows="5" placeholder="Write your message here..." required></textarea>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn btn-success w-100 btn-lg shadow-sm">
                                            Send Message <i class="fas fa-paper-plane ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>