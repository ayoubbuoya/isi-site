<?php

function headerLinks()
{
  echo '
    <a class="navbar-brand d-flex align-items-center me-3" href="index.php">
    <img src="imgs/islain.png" alt="" class="isi-logo" />
    <!-- <span class="fs-4">ISI Kef</span> -->
    </a>
  <button class="navbar-toggler me-5" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
      <li class="nav-item">
        <a class="nav-link me-3 ms-2" href="index.php#news">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link me-3 ms-2" href="index.php#about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link me-3 ms-2" href="index.php#formations">Nos Formations</a>
      </li>
      <li class="nav-item">
        <a href="index.php#gallery" class="nav-link me-3 ms-2">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link me-3 ms-2" href="index.php#map">Location</a>
      </li>
      <li class="nav-item">
        <a class="nav-link me-3 ms-2" href="index.php#contact">Contact</a>
      </li>

      <li class="nav-item">
        <a class="nav-link me-3 ms-2" href="cours.php">Cours</a>
      </li>
      <li class="nav-item">
        <a class="nav-link me-3 ms-2" href="events.php">Events</a>
      </li>
      <li class="nav-item">
        <a class="nav-link me-3 ms-2" href="calendar.php">Calendar</a>
      </li>
    </ul>   
    ';
}
