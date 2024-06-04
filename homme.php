<?php

session_start();
include('inc/connections.php');
if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id = $_SESSION['id'];
    $user = $_SESSION['username'];
    $info = mysqli_query($conn,"select * from users where username = '$user'");
    while($data = mysqli_fetch_array($info)){


?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="./53026577976.png">
    <script src="https://kit.fontawesome.com/e8fa2e31b4.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
            font-size: 18px;
        }
        body {
            margin: 4vh;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .sidebar {
            width: 25%;
            border: 1px solid #eee;
            border-radius: 3px;
            padding: 15px;
            height: 92vh;
            box-shadow: 0px 0px 3px gray;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .fa-circle {
            color: orangered;
        }
        .searchBar {
            width: 100%;
            background-color: #eee;
            border-radius: 3px;
            padding: 9px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        input {
            border: none;
            outline: none;
            background: none;
        }
        .glass:hover {
            color: orangered;
            cursor: pointer;
        }
        .social-icons {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .fa-brands {
            font-size: 25px;
            margin: 0 10px;
            color: #333;
            cursor: pointer;
        }
        .fa-brands:hover {
            color: orangered;
        }
        .data {
            width: 73%;
            border-radius: 3px;
            height: 92vh;
            overflow-y: auto;
        }
        .top {
            height: 60px;
            border-radius: 3px;
            background-color: #eee;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
        }
        .header {
            height: 200px;
            border-radius: 3px;
            background-color: #333;
            margin: 3vh 0px;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .header p {
            font-size: 40px;
            font-weight: bold;
            color: white;
        }
        #root {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
        }
        .box {
            margin: 1px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #333;
            border-radius: 5px;
            padding: 15px;
        }
        .img-box {
            width: 100%;
            height: 176px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .images {
            max-height: 90%;
            max-width: 90%;
            object-fit: cover;
            object-position: center;
        }
        .bottom {
            margin-top: 20px;
            width: 100%;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            height: 110px;
        }
        h2 {
            font-size: 20px;
            color: orangered;
        }
        button {
            width: 100%;
            position: relative;
            border: none;
            border-radius: 5px;
            background-color: #333;
            padding: 7px 25px;
            cursor: pointer;
            color: white;
        }
        button:hover {
            background-color: orangered;
        }
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidehead">
                <div class="dots">
                    <i class="fa-solid fa-circle"></i>
                    <i class="fa-solid fa-circle" style="color: #333;"></i>
                    <i class="fa-solid fa-circle"></i>
                </div>
                <hr style="margin: 15px 0; border: 1px solid #eee">
            </div>
            <div class="sidebody" style="height: 69vh;">
                <div class="searchBar">
                    <input placeholder="Search..." id="searchBar" name="searchBar" type="text">
                    <i class="fa-solid fa-magnifying-glass glass" id="btn"></i>
                </div>
            </div>
            <div class="sidefoot">
                <hr style="margin: 15px 0; border: 1px solid #eee">
                <div class="social-icons">
                    <i class="fa-brands fa-square-facebook"></i>
                    <i class="fa-brands fa-youtube"></i>
                    <i class="fa-brands fa-square-github"></i>
                </div>
            </div>

        </div>
        <div class="data">
            <div class="top">
                <p>+212 0665-942360</p>
                <p>Central@gmail.com</p>
            </div>
            <div class="header">
                <p>Central Danone Suivi PDR</p>
            </div>
            <div class="body">
                <div id="root"></div>
            </div>
        </div>
    </div>

    <script>
        const product = [
            {
                id: 0,
                title: ' product S <br> Sender: Ibtisam Ghaziwi <br> Arrival station: Marrakesh <br> Company: Central Danone',
                price: 120,
            },
            {
                id: 1,
                image: 'image/hh-2.jpg',
                title: 'product R <br> Sender: Abdelali Ghaziwi <br> Arrival station: fés <br> Company: Central Danone',
                price: 60,
            },
            {
                id: 2,
                image: 'image/ee-3.jpg',
                title: 'product E <br> Sender: Ayoub Ghaziwi <br> Arrival station: Casa Blanca <br> Company: Central Danone',
                price: 230,
            },
            {
                id: 3,
                image: 'image/aa-1.jpg',
                title: 'product T <br> Sender: Adam Ghaziwi <br> Arrival station: Ouarzazate <br> Company: Central Danone',
                price: 100,
            },
            {
                id: 4,
                image: 'image/bb-1.jpg',
                title: 'product Y <br> Sender: Amin Ghaziwi <br> Arrival station: Errachidia <br> Company: Central Danone',
                price: 230,
            },
            {
                id: 5,
                image: 'image/cc-1.jpg',
                title: 'product W <br> Sender: Anisa Ghaziwi <br> Arrival station: Agadir <br> Company: Central Danone',
                price: 100,
            },
        ];

        const categories = [...new Set(product.map((item) => { return item }))]

        document.getElementById('searchBar').addEventListener('keyup', (e) => {
            const searchData = e.target.value.toLowerCase();
            const filteredData = categories.filter((item) => {
                return (
                    item.title.toLowerCase().includes(searchData)
                )
            })
            displayItem(filteredData)
        });

        const displayItem = (items) => {
            document.getElementById('root').innerHTML = items.map((item) => {
                var { image, title, price } = item;
                return (
                    `<div class='box'>
                        <div class='bottom'>
                            <p>${title}</p><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                    </div>`
                )
            }).join('')
        };
        displayItem(categories);

    </script>
</body>

</html>
<?php
}
}
?>