<?php
session_start();
include('header.php');
include('database.php');
$page = 'all';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
if ($page == 'all') {
?>

    <div id="heart-container"></div>
    <h2 class="text-center mt-4">i`m so glad that you agreed :)</h2>
    <h3 class="text-center mt-5">choose our first date idea :</h3>
    <div class="d-flex justify-content-between w-50 mt-5 mx-auto">
        <div class="card-date-idea p-0">
            <a href="?page=pizza-date" class="text-decoration-none">
                <img src="img/pizza-date.jpeg" class="date-idea-img" alt="">
                <div class="card-idea">
                    <h4 class="date-idea-text m-0 ">pizza date</h4>
                </div>
            </a>
        </div>
        <div class="card-date-idea p-0">
            <a href="?page=cinema-date" class="text-decoration-none">
                <img src="img/cinema-date.jpeg" class="date-idea-img" alt="">
                <div class="card-idea">
                    <h4 class="date-idea-text m-0 ">cinema date</h4>
                </div>
            </a>
        </div>
        <div class="card-date-idea p-0">
            <a href="?page=arcade-date" class="text-decoration-none">
                <img src="img/arcade-date.jpeg" class="date-idea-img" alt="">
                <div class="card-idea">
                    <h4 class="date-idea-text m-0 ">arcade date</h4>
                </div>
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-between mb-5 w-50 mt-5 mx-auto">
        <div class="card-date-idea p-0">
            <a href="?page=walking-chill" class="text-decoration-none">
                <img src="img/walking-chill.jpeg" class="date-idea-img" alt="">
                <h4 class="date-idea-text pt-3 m-0 ">walking and chill</h4>
            </a>
        </div>
        <div class="card-date-idea p-0">
            <a href="?page=coffe-date" class="text-decoration-none">
                <img src="img/coffe-date.jpg" class="date-idea-img" alt="">
                <div class="card-idea">
                    <h4 class="date-idea-text m-0 ">coffe date</h4>
                </div>
            </a>
        </div>
        <div class="card-date-idea p-0">
            <a href="?page=other" class="text-decoration-none">
                <img src="img/other.png" class="date-idea-img" alt="">
                <div class="card-idea">
                    <h4 class="date-idea-text m-0 ">other</h4>
                </div>
            </a>
        </div>
    </div>
<?php
} elseif ($page == 'pizza-date') { ?>
    <form action="?page=pizza-save" class="mx-auto mt-5 text-center" method="post">
        <label class="label" for="">Restaurant name:</label>
        <input type="text" name="Restaurant_name" class="input">
        <input type="submit" value="confirm" class="btn-confirm">
    </form>
<?php
} elseif ($page == 'pizza-save') {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $Restaurant_name = $_POST['Restaurant_name'];
        $statment = $connect->prepare(
            'INSERT INTO pizza_date (place_name)
        VALUES(?)'
        );
        $statment->execute(array($Restaurant_name));
        header("location:msg.php");
    }
} elseif ($page == 'cinema-date') {
?>
    <form action="?page=cinema-save" class="mx-auto mt-5 text-center" method="post">
        <label class="label" for="">film name:</label>
        <input type="text" name="film_name" class="input">
        <label class="label mt-3" for="">cinema name:</label>
        <input type="text" name="cinema_name" class="input">
        <input type="submit" value="confirm" class="btn-confirm">
    </form>
<?php
} elseif ($page == 'cinema-save') {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $film_name = $_POST['film_name'];
        $cinema_name = $_POST['cinema_name'];
        $statment = $connect->prepare(
            'INSERT INTO cinema_date (film_name, cinema_name) VALUES (?, ?)'
        );
        $statment->execute(array($film_name, $cinema_name));
        header("location:msg.php");
    }
}elseif($page == 'arcade-date'){
?>
    <form action="?page=arcade-save" class="mx-auto mt-5 text-center" method="post">
        <label class="label" for="">arcade name:</label>
        <input type="text" name="arcade_name" class="input">
        <input type="submit" value="confirm" class="btn-confirm">
    </form>

<?php
}elseif($page == 'arcade-save'){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $arcade_name = $_POST['arcade_name'];
        $statment = $connect->prepare(
            'INSERT INTO arcade_date (arcade_name) VALUES(?)' );
        $statment->execute(array($arcade_name));
        header("location:msg.php");
    }
}elseif($page == 'walking-chill'){
?>
    <form action="?page=walking-save" class="mx-auto mt-5 text-center" method="post">
        <label class="label" for="">street name:</label>
        <input type="text" name="street_name" class="input">
        <input type="submit" value="confirm" class="btn-confirm">
    </form>
<?php
}elseif($page == 'walking-save'){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $street_name = $_POST['street_name'];
        $statment = $connect->prepare(
            'INSERT INTO walking_chill (street_name) VALUES(?)' );
        $statment->execute(array($street_name));
        header("location:msg.php");
    }
}elseif($page == 'coffe-date'){
?>
    <form action="?page=coffe-save" class="mx-auto mt-5 text-center" method="post">
        <label class="label" for="">coffe shop name:</label>
        <input type="text" name="coffe_name" class="input">
        <input type="submit" value="confirm" class="btn-confirm">
    </form>
<?php
}elseif($page == 'coffe-save'){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $coffe_name = $_POST['coffe_name'];
        $statment = $connect->prepare(
            'INSERT INTO coffe_date (coffe_name) VALUES(?)' );
        $statment->execute(array($coffe_name));
        header("location:msg.php");
    }
}elseif($page == 'other'){
?>
    <form action="?page=other-save" class="mx-auto mt-5 text-center" method="post">
        <label class="label" for="">other idea:</label>
        <input type="text" name="other" class="input">
        <input type="submit" value="confirm" class="btn-confirm">
    </form>
<?php
}elseif($page == 'other-save'){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $other = $_POST['other'];
        $statment = $connect->prepare(
            'INSERT INTO other (idea) VALUES(?)' );
        $statment->execute(array($other));
        header("location:msg.php");
    }
}
?>
<?php
include('footer.php');
