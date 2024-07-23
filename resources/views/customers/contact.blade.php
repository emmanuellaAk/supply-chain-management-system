<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    flex-wrap: wrap;
    max-width: 900px;
    margin: 50px auto;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.contact-info {
    flex: 1;
    background-color: #28a745;
    color: #fff;
    padding: 20px;
}

.contact-info h2 {
    margin-top: 0;
}

.contact-info ul {
    list-style: none;
    padding: 0;
}

.contact-info ul li {
    margin-bottom: 10px;
    display: flex;
    align-items: center;
}

.contact-info ul li i {
    margin-right: 10px;
}

.contact-form {
    flex: 2;
    padding: 20px;
}

.contact-form h2 {
    margin-top: 0;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    display: inline-block;
    background-color: #28a745;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #218838;
}

</style>
   
    <div class="container">
        <div class="contact-info">
            <h2>Let's get in touch</h2>
            <p>We're open for any suggestion or just to have a chat</p>
            <ul>
                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    Address: 198 West 21th Street, Suite 721 New York NY 10016
                </li>
                <li>
                    <i class="fas fa-phone"></i>
                    Phone: +1235 2355 98
                </li>
                <li>
                    <i class="fas fa-envelope"></i>
                    Email: info@yoursite.com
                </li>
                <li>
                    <i class="fas fa-globe"></i>
                    Website: yoursite.com
                </li>
            </ul>
        </div>
        <div class="contact-form">
            <h2>Get in touch</h2>
            <form action="#">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
