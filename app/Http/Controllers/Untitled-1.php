It sounds like you're asking about PHP CRUD, which typically refers to a basic Create, Read, Update, Delete (CRUD) application using PHP—the core operations for interacting with a database (usually MySQL).

Here's a simple example of a CRUD system in PHP with MySQLi:

🔧 1. Database Setup (MySQL)
sql
Copy
Edit
CREATE DATABASE crud_app;
USE crud_app;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);
📁 2. Connection File (db.php)
php
Copy
Edit
<?php
$conn = new mysqli('localhost', 'root', '', 'crud_app');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "crud_app";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
📝 3. Create User (create.php)
php
Copy
Edit
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    if ($conn->query($sql)) {
        echo "User created successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    Name: <input name="name"><br>
    Email: <input name="email"><br>
    <button type="submit">Create</button>
</form>
📃 4. Read Users (read.php)
php
Copy
Edit
<?php
include 'db.php';
$result = $conn->query("SELECT * FROM users");

while ($row = $result->fetch_assoc()) {
    echo "{$row['id']} - {$row['name']} - {$row['email']} <br>";
}
?>
✏️ 5. Update User (update.php)
php
Copy
Edit
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    if ($conn->query($sql)) {
        echo "User updated!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    ID: <input name="id"><br>
    Name: <input name="name"><br>
    Email: <input name="email"><br>
    <button type="submit">Update</button>
</form>
❌ 6. Delete User (delete.php)
php
Copy
Edit
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $sql = "DELETE FROM users WHERE id=$id";
    if ($conn->query($sql)) {
        echo "User deleted!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    ID: <input name="id"><br>
    <button type="submit">Delete</button>
</form>
Would you like this implemented using PDO, OOP, or with a framework like Laravel?



You said:
not pdo

ChatGPT said:
Great — if you don’t want to use PDO, then MySQLi (Procedural or Object-Oriented) is the right choice, which is what the example I gave earlier uses.

Here’s a complete CRUD example using PHP + MySQLi (procedural), without PDO or frameworks.

✅ Full Example Using MySQLi Procedural
📁 db.php – Database Connection
php
Copy
Edit
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "crud_app";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
📄 index.php – Display All Users (Read)
php
Copy
Edit
<?php include 'db.php'; ?>
<h2>User List</h2>
<a href="create.php">Add New User</a>
<table border="1">
    <tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM users");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>
                    <a href='update.php?id={$row['id']}'>Edit</a> |
                    <a href='delete.php?id={$row['id']}'>Delete</a>
                </td>
              </tr>";
    }
    ?>
</table>
➕ create.php – Add User (Create)
php
Copy
Edit
<?php include 'db.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    mysqli_query($conn, "INSERT INTO users (name, email) VALUES ('$name', '$email')");
    header("Location: index.php");
}
?>
<h2>Create User</h2>
<form method="POST">
    Name: <input name="name"><br>
    Email: <input name="email"><br>
    <button type="submit">Save</button>
</form>
✏️ update.php – Edit User (Update)
php
Copy
Edit
<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    mysqli_query($conn, "UPDATE users SET name='$name', email='$email' WHERE id=$id");
    header("Location: index.php");
}
?>
<h2>Edit User</h2>
<form method="POST">
    Name: <input name="name" value="<?php echo $row['name']; ?>"><br>
    Email: <input name="email" value="<?php echo $row['email']; ?>"><br>
    <button type="submit">Update</button>
</form>
❌ delete.php – Delete User (Delete)
php
Copy
Edit
<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM users WHERE id=$id");
header("Location: index.php");
?>
🗃 SQL Table (if not yet created)
sql
Copy
Edit
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100)
);