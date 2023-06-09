<?php
session_start();

if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
  $name = $_SESSION['name'];
  $email = $_SESSION['email'];
  $role = $_SESSION['role'];
  $account_img = $_SESSION["account-img"];
  $logged =  true;
} else {
  $logged = false;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ISI-KEF</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <!-- Font Awseome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <!-- csss -->
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="style-cours.css">
</head>

<body onload="load();">
  <script>
    function load() {
      // Load the PHP script that outputs the session variables as a JSON object
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'get_session_infos.php');
      xhr.onload = function() {
        // Parse the JSON response
        var sessionData = JSON.parse(xhr.responseText);
        console.log(sessionData);
      };
      xhr.send();

      // check if logged n 
      var header = document.getElementById("header");
      var logged = <?php echo $logged ? 'true' : 'false'; ?>;
      var account = document.getElementById("account");
      var noAccount = document.getElementById("no-account");
      if (logged) {
        header.classList.add('logged');
        noAccount.classList.toggle("hidden");
      } else {
        account.classList.toggle("hidden");
      }
    }
  </script>

  <!-- Header Section -->
  <header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
      <div class="container-fluid">
        <?php
        require_once("functions.php");
        headerLinks();
        ?>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="no-account">
          <li class="nav-item">
            <a class="btn btn-outline-primary me-2" href="login.php">Sign in</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary" href="join.php">Join</a><br>
          </li>
        </ul>
        <div class="navbar-nav ms-auto mb-2 mb-lg-0 me-3" id="account">
          <div class="dropdown-account">
            <button class="drop-btn" type="button">
              <img src="<?php echo $account_img ?>" class="account-img" alt="">
            </button>
            <div class="dropdown-account-content">
              <a href="#" id="upload-image-btn">Change Image</a> <br>
              <a href="logout.php">Log out</a>
            </div>
          </div>
        </div>
      </div>
      </div>
    </nav>
  </header>

  <main class="m-3 mb-0">
    <section class="image-upload-section" style="margin-top: 5rem; display: none;">
      <!-- Upload Image Model -->
      <form class="image-upload-container" action="change_picture.php" method="post" enctype="multipart/form-data">
        <input type="file" id="file" name="image" accept="image/*" hidden>
        <div class="img-area" data-img="">
          <i class='bx bxs-cloud-upload icon'></i>
          <h3>Upload Image</h3>
          <p>Image size must be less than <span>2MB</span></p>
        </div>
        <button type="button" class="select-image">Select Image</button>
        <input type="submit" id="submit_btn" class="btn btn-secondary w-100 m-2 p-3 rounded" name="submit_btn" value="Change Picture">
      </form>
      <script>
        var uploadImageA = document.getElementById("upload-image-btn");
        const selectImage = document.querySelector('.select-image');
        const inputFile = document.querySelector('#file');
        const imgArea = document.querySelector('.img-area');

        uploadImageA.addEventListener("click", function() {
          document.querySelector(".image-upload-section").style.display = "block";
        })

        selectImage.addEventListener('click', function() {
          inputFile.click();
        })

        inputFile.addEventListener('change', function() {
          const image = this.files[0]
          if (image.size < 2000000) {
            const reader = new FileReader();
            reader.onload = () => {
              const allImg = imgArea.querySelectorAll('img');
              allImg.forEach(item => item.remove());
              const imgUurl = reader.reslt;
              const img = document.createElement('img');
              img.src = imgUrl;
              imgArea.appendChild(img);
              imgArea.classList.add('active');
              imgArea.dataset.img = image.name;
            }
            reader.readAsDataURL(image);
          } else {
            alert("Image size more than 2MB");
          }
        })
      </script>
    </section>
    <section class="news" id="news">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center">
            <div class="section-title">
              <h2>Latest News</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="blog-grid">
              <div class="blog-img">
                <div class="date">20 FEB</div>
                <a href="#">
                  <img src="http://www.isikef.rnu.tn/Fr/image_resize.php?img=upload%2F1674203427.jpg&w=350" title="" alt="" />
                </a>
              </div>
              <div class="blog-info">
                <h5>
                  <a href="#">DEMANDE DE STAGE ETE</a>
                </h5>
                <p>DEMANDE DE STAGE ETE</p>
                <div class="btn-bar">
                  <a href="new1.html" class="px-btn-arrow">
                    <span>Read More</span>
                    <i class="arrow"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="blog-grid">
              <div class="blog-img">
                <div class="date">05 DEC</div>
                <a href="#">
                  <img src="http://www.isikef.rnu.tn/Fr/image_resize.php?img=upload%2F1670235262.jpg&w=350&h=240" title="" alt="" />
                </a>
              </div>
              <div class="blog-info">
                <h5>
                  <a href="#">Annonce stage</a>
                </h5>
                <p>ANNONCE STAGE FIN D'ETUDES</p>
                <div class="btn-bar">
                  <a href="#" class="px-btn-arrow">
                    <span>Read More</span>
                    <i class="arrow"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="blog-grid">
              <div class="blog-img">
                <div class="date">15 NOV</div>
                <a href="#">
                  <img src="http://www.isikef.rnu.tn/Fr/image_resize.php?img=upload%2F1668502775.jpg&w=350&h=240" title="" alt="" />
                </a>
              </div>
              <div class="blog-info">
                <h5>
                  <a href="#">PEEJ</a>
                </h5>
                <p>Avis à tous les enseignants de l'Université de Jen</p>
                <div class="btn-bar">
                  <a href="#" class="px-btn-arrow">
                    <span>Read More</span>
                    <i class="arrow"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About  -->
    <section class="about pt-5 pb-5" id="about">
      <div class="container wrapabout">
        <div class="red"></div>
        <div class="row">
          <div class="align-items-center justify d-flex mb-5 mb-lg-0">
            <div class="blockabout">
              <div class="blockabout-inner text-center text-sm-start">
                <div class="title-big pb-3 mb-3">
                  <h3>ABOUT US</h3>
                </div>
                <p class="description-p text-muted pe-0 pe-lg-0">
                  L’Institut Supérieur d’Informatique du Kef a été crée selon
                  le décret n°06-1587 du 6 juin 2006 portant création
                  d’établissements d’enseignement supérieur et de recherche.
                </p>
                <p class="description-p text-muted pe-0 pe-lg-0">
                  En effet, l’ISIKef est l’une des établissements
                  universitaires de l’université de Jendouba.
                </p>
                <div class="sosmed-horizontal pt-3 pb-3">
                  <a href="https://www.facebook.com/profile.php?id=100057592473413" target="u_blank"><i class="fa fa-facebook"></i></a>
                </div>
                <a href="#" class="btn rey-btn mt-3">See More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Nos Formation -->
    <section class="formations" id="formations">
      <div class="container gray-bg">
        <div class="filter-section">
          <button class="filter-btn active" data-filter="lcs">LCS</button>
          <button class="filter-btn" data-filter="lce">LCE</button>
          <button class="filter-btn" data-filter="siw">SIW</button>
          <button class="filter-btn" data-filter="asri">ASRI</button>
          <button class="filter-btn" data-filter="awi">AWI</button>
          <button class="filter-btn" data-filter="nticdia">NTICDIA</button>
        </div>
        <hr>
        <div class="content-section">
          <div class="item lcs">
            <h4>LCS</h4>
            <p>Cette Licence Intitulé "Computer Science" Comprend Deux Spécialités :</p>

            <a href="http://parcours-lmd.salima.tn/listeueetab.php?parc=UUkDTl9wB2ZdbFAqDjJWZVRyXGI=&etab=Wj9Waw05" target="_blank">Génie Logiciel Et Système D'Information : GL</a>
            <br>
            <a href="http://parcours-lmd.salima.tn/listeueetab.php?parc=VU1ZFAwjUTBXZlIoAT1RYgguDTI=&etab=BGEEOVxo" target="_blank">Informatique et Multimédia : IM</a>
          </div>
          <div class="item lce" style="display: none">
            <h4>LCE</h4>
            <p>Licence en Computer Engineering</p>
            <p>Cette Licence Contient une seule Spécialité : </p>
            <a href="http://parcours-lmd.salima.tn/listeueetab.php?parc=AxtSH11yBGVVZFErVGhQYAQiCzQ=&etab=UDUEOQw4" target="u_blank">Ingénierie des réseaux et systèmes</a>
          </div>
          <div class="item siw" style="display: none">
            <h4>SIW</h4>
            <p>Mastère de Recherche en Systèmes d'Informations et Web</p>
            <a href="http://www.isikef.rnu.tn/upload/1570693820.pdf" target="u_blank">Plan d'études du Mastère de recherche en systèmes d'informations et web</a>
          </div>
          <div class="item asri" style="display: none">
            <h4>ASRI</h4>
            <p>Mastère Professionnel en Administration et Sécurité des Réseaux Informatiques</p>
            <a href="http://www.isikef.rnu.tn/upload/1570097568.pdf" target="u_blank">Pour plus de détails sur le parcours - ASRI</a>
          </div>
          <div class="item awi" style="display: none">
            <h4>AWI</h4>
            <p>Mastère Professionnel en Application Web Intelligente</p>
          </div>
          <div class="item nticdia" style="display: none">
            <h4>NTICDIA</h4>
            <p>Mastère Co-Construite en Nouvelles Technologies de l’Information et de la Communication dédiées à l'Innovation de l'Agriculture</p>
            <a href="http://www.isikef.rnu.tn/upload/1570097573.pdf" target="u_blank"> Pour plus de détails sur le Parcours - NTICDIA </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Gallery -->
    <section id="gallery">
      <div class="row mb-5"></div>
      <div class="row">
        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
          <img src="imgs/gallery-img3.png" class="w-100 h-75 shadow-1-strong rounded mb-4 img-hover" alt="" />
        </div>

        <div class="col-lg-4 mb-4 mb-lg-0">
          <img src="imgs/gallery-img2.png" class="w-100 h-75 shadow-1-strong rounded mb-4 img-hover" alt="" />
        </div>

        <div class="col-lg-4 mb-4 mb-lg-0">
          <img src="/imgs/gallery-img1.png" class="w-100 h-75 shadow-1-strong rounded mb-4 img-hover" alt="Waves at Sea" />
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
          <img src="imgs/gallery-img4.png" class="w-100 h-75 shadow-1-strong rounded mb-4 img-hover" alt="" />
        </div>

        <div class="col-lg-4 mb-4 mb-lg-0">
          <img src="imgs/gallery-img5.png" class="w-100 h-75 shadow-1-strong rounded mb-4 img-hover" alt="" />
        </div>

        <div class="col-lg-4 mb-4 mb-lg-0">
          <img src="/imgs/gallery-img6.png" class="w-100 h-75 shadow-1-strong rounded mb-4 img-hover" alt="Waves at Sea" />
        </div>
      </div>
      <!-- Gallery -->
    </section>
    <!-- Google Map -->
    <section id="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3220.4881692950116!2d8.707579675757698!3d36.17900780246981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fba44eb16009e5%3A0xea46e94b9ed2cde8!2sHigher%20Institute%20of%20Computer%20Science%20of%20Kef!5e0!3m2!1sen!2stn!4v1681000256462!5m2!1sen!2stn" style="border:0;width: 75%;height: 80vh; margin:2rem 11rem; margin-top: 5rem" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    <!-- Contact -->
    <section class="contact gray-bg" id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="section-title">
              <h2>Get In Touch</h2>
            </div>
          </div>
        </div>
        <div class="row flex-row-reverse">
          <div class="col-md-7 col-lg-8 m-15px-tb">
            <div class="contact-form">
              <form action="https://formspree.io/f/xqkogadj" method="post" class="contactform contact_form" id="contact_form">
                <div class="returnmessage valid-feedback p-15px-b" data-success="Your message has been received, We will contact you soon."></div>
                <div class="empty_notice invalid-feedback p-15px-b">
                  <span>Please Fill Required Fields</span>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input name="name" id="name" type="text" placeholder="Full Name" class="form-control" required />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input name="email" id="email" type="text" placeholder="Email Address" class="form-control" required />
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <input name="subject" id="subject" type="text" placeholder="Subject" class="form-control" required />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea name="message" id="message" placeholder="Message" class="form-control" rows="3" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="send">
                      <button type="submit" id="send_message" class="px-btn theme" href="#"><span>Contact Us</span> <i class="arrow"></i></button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-5 col-lg-4 m-15px-tb">
            <div class="contact-name">
              <h5>Mail</h5>
              <p>ayoubamerrr290@gmail.com</p>
            </div>
            <div class="contact-name">
              <h5>Visit Us</h5>
              <p>5 Rue Saleh Ayech, <br />7100 Kef</p>
            </div>
            <div class="contact-name">
              <h5>Phone</h5>
              <p>+216 78 201 056</p>
            </div>
            <div class="social-share nav">
              <a href="https://www.facebook.com/profile.php?id=100057592473413" target="u_blank" class="facebook">
                <i class="fa fa-facebook"></i>
              </a>
              <a class="linkedin" href="https://www.linkedin.com/" target="u_blank">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer class="bg-light text-center text-white">

    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="https://www.facebook.com/ayoub.buoya.3762/" target="u_blank" role="button"><i class="fab fa-facebook-f"></i></a>
        <!-- Linkedin -->
        <a class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="https://www.linkedin.com/in/ayoub-amer-285b67190/" target="u_blank" role="button"><i class="fab fa-linkedin-in"></i></a>
        <!-- Github -->
        <a class="btn text-white btn-floating m-1" style="background-color: #333333;" href="https://github.com/ayoubbuoya" target="u_blank" role="button"><i class="fab fa-github"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Back to top button -->
    <button id="back-to-top-btn" class="btn btn-primary" title="Go to top" style="float: right;margin-top: -2.4rem; margin-right: 1rem"><i class="fas fa-arrow-up w-100"></i></button>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2); letter-spacing: 0.2rem;font-weight: bold; ">
      © 2023 Copyright :
      <a class="text-white" href="https://ayoub-amer.netlify.app/" target="u_blank"> <span class="">Ayoub Amer</span></a>
    </div>
    <!-- Copyright -->
  </footer>
  <script>
    var backToTopBtn = document.getElementById("back-to-top-btn");

    // Show or hide the button based on scroll position
    window.addEventListener("scroll", function() {
      if (window.pageYOffset > 100) {
        backToTopBtn.style.display = "block";
      } else {
        backToTopBtn.style.display = "none";
      }
    });

    // Scroll to top when the button is clicked
    backToTopBtn.addEventListener("click", function() {
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    });
  </script>

  <script>
    const filterBtns = document.querySelectorAll('.filter-btn');
    const items = document.querySelectorAll('.item');

    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        // Set all buttons to inactive
        filterBtns.forEach(btn => {
          btn.classList.remove('active');
        });

        // Set clicked button to active
        btn.classList.add('active');

        // Filter items based on button data-filter value
        const filterValue = btn.dataset.filter;
        items.forEach(item => {
          if (item.classList.contains(filterValue)) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });
  </script>
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>