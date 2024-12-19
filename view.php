<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Registered Details</title>
    <style>
       body{
            background-color: black;
        }
        #RS{
            margin-left:34rem;
            font-size:45px;
            letter-spacing:5px;
            background: linear-gradient(90deg, #e391ca, #780a57);
            background-clip:text;
            -webkit-text-fill-color: transparent;
        }

        .displayB{
            height:30rem;
            width:90rem;
            background-color:white;
            margin-top:2rem;
            margin-left:7.5rem;
            padding-bottom: 3rem; /* Space for the button at the bottom */
            position: relative;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }
        th{
            background-color:purple;
            color:white;
            border:1px solid white;
           }

        th, td {
            padding: 10px;
            text-align: left;
        }
        #exitBtn {
            width:9rem;
            margin-bottom:7rem;
            position: absolute;
            bottom: 0;
            left: 48%;
            transform: translateX(-50%);
            padding: 10px;
            background-color: red;
            color: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            background-color: purple;
            letter-spacing: 5px;
            border:2px solid white;
        }

        #exitBtn:hover {
            background-color: rgb(66, 8, 66);
        }
    </style>
</head>
<body>
    <h1 id="RS">REGISTERED STUDENTS</h1>
    <div class="displayB">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Email</th>
                <th>Year</th>
                <th>Branch</th>
                <th>USN</th>
                <th>Section</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection
            $conn = new mysqli("localhost", "root", "", "registration");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch data from the database
            $sql = "SELECT name, dob, `e-mail`, year, branch, usn, section FROM students";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['name']) . "</td>
                            <td>" . htmlspecialchars($row['dob']) . "</td>
                            <td>" . htmlspecialchars($row['e-mail']) . "</td>
                            <td>" . htmlspecialchars($row['year']) . "</td>
                            <td>" . htmlspecialchars($row['branch']) . "</td>
                            <td>" . htmlspecialchars($row['usn']) . "</td>
                            <td>" . htmlspecialchars($row['section']) . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No records found</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
        </tbody>
    </table>
    </div>
 <button id="exitBtn" onclick="window.location.href='index.html'">EXIT</button>
</body>
</html>