<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neighborhood Emergency Alert System - Emergency Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: antiquewhite;
        }
        header {
            background-color:#630909;
            color: white;
            height: auto;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header img {
            height: 50px;
            margin-right: 20px;
        }
        header nav {
            display: inline-block;
        }
        header nav a {
            text-decoration: none;
            color: #fff;
            margin-left: 20px;
        }
        header nav a:first-child {
            margin-left: 0;
        }
        header nav a:hover {
            text-decoration: underline;
        }
        .content {
            padding: 30px;
            text-align: left;
           
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #C21C1C;
            color: white;
        }
        footer {
            background-color: antiquewhite;
            color: black;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            height: 15px;
        }
    </style>
</head>
<body>
    <header>
        <div>
            <img src="../NEAS/img/logo.png" alt="Neighborhood Emergency Alert System">
            
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="emergency_contact.php">Emergency Contact</a>
        </nav>
    </header>

    <div class="content">
        <h1>Emergency Contact Information</h1>
        <table>
            <thead>
                <tr>
                    <th>Organization</th>
                    <th>Contact Number</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Medicare National Hospital</td>
                    <td>4467067</td>
                </tr>
                <tr>
                    <td>Kathmandu Medical College</td>
                    <td>4476152</td>
                </tr>
                <tr>
                    <td>Blood Bank</td>
                    <td>4225344</td>
                </tr>
                <tr>
                    <td>Bir Hospital</td>
                    <td>4223807</td>
                </tr>
                <tr>
                    <td>Teku Hospital</td>
                    <td>4253396</td>
                </tr>
                <tr>
                    <td>Nepal police</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>Fire Support</td>
                    <td>101</td>
                </tr>
                <tr>
                    <td>Missing Child Response</td>
                    <td>1098</td>
                </tr>
                <tr>
                    <td>Ambulance</td>
                    <td>102</td>
                </tr>
                <tr>
                    <td>OM Hospital & Research Centre</td>
                    <td>+977 1-4476225</td>
                </tr>
                <tr>
                    <td>Police Station, Gausala</td>
                    <td>44-692072/9854090050</td>
                </tr>
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 Neighborhood Emergency Alert System. All rights reserved.</p>
    </footer>

</body>
</html>
