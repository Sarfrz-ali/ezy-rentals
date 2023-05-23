<?php
$searchq = $_GET["search"];
?>
<style>
.search{
    padding:7px 10px;
    width:300px;
    outline:none;
}
</style><div class="header">
            <header class="container">
                <div class="wrapper">
                    <div id="logo"><a href="http://localhost/ezy rentals"><span class="logo">Ezy</span><span class="logo"> Rentals</span></a>
                    </div>
                   
                    <div>
                        <form action="search.php" method="get">
                            <input type="text" placeholder="search" class="search" name="search" value="<?php echo $searchq; ?>">

                        </form>
                    </div>

                    <div>
                    <div id="profile" class="profile">
                    <div class="profile-img">
                        <?php echo $name[0] ?>
                    </div>
                    <div class="profile-info display-none" id="profile-info">
                        <ul class="p-0">
                            <li><a href="logout.php" name="log_out">Log Out</a></li>
                        </ul>
                    </div>
                </div>
                    </div>
                </div>
            </header>
        </div>
        <script>
            let profile = document.querySelector("#profile");
            let profile_info = document.querySelector("#profile-info");
            profile.addEventListener("click", function () {
                profile_info.classList.toggle("display-block");
            })

        </script>

    