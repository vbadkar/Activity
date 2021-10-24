<?php
    require "includes/header.php";
    require "includes/database.php";
?>
    <div class="accordian">
        <div class="label">
            Category
            <div class="wrapper">
                <div class="catContent">
                Food
            </div>
            <div class="catContent">
                Music
            </div>
            <div class="catContent">
                Sports
            </div>
            <div class="catContent">
                Gymnastics
            </div>
            <div class="catContent">
                Travel
            </div>
            </div>
        </div>
    </div>
    <script>
        let label = document.querySelector(".label");
        let content = document.querySelector(".wrapper");
        console.log(label);
        console.log(content);
            label.addEventListener("click", function(){
                content.classList.toggle("active");
            });
    </script>
