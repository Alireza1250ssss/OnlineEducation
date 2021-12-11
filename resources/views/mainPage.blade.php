<!DOCTYPE html>
<html lang="en">
 
<x-header title="Online Education" css="mainPage" />

<body>
    <!-- header section starts  -->
    <header id="header">
        <a href="#" class="logo"><img src="images/eduLogo.png" alt="Education"></a>

        <nav>
            <ul>
                <li><a href="#home">home</a></li>
                <li><a href="#course">courses</a></li>
                <li><a href="#service">services</a></li>
                <li><a href="#testimonial">testimonials</a></li>
                <li><a href="#contact">contact</a></li>
            </ul>
        </nav>

        <div class="fas fa-bars"></div>
    </header>
    <!-- header ends -->

    <!-- home section starts  -->

    <section id="home" class="container-fluid">
        <div class="row align-items-center min-vh-100 content">
            <div class="col-md-8 text-center text-md-left ml-md-5 position-relative">
                <h2>online</h2>
                <h1>education</h1>
                <h3>learn online from home</h3>
                @auth
                <a href="{{auth()->user()->role.'/dashboard'}}"><button>Dashboard >></button></a>
                @else
                <a href="/login"><button>Login >></button></a>
                @endauth
                <div class="icons">
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
        </div>
    </section>

    <!-- home section ends  -->

    <!-- course section starts -->
    <section id="course">
        <h1 class="heading">our latest courses</h1>
        <div class="box-container">
            <div class="box" >
                <img src="images/eduLogo.png" alt="">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis repellat eius
                    , erat laboriosam adipisci totam perferendis architecto
                    earum, consequatur, dolorum inventore, vel dolor dolores iste ipsa? Rem iste maiores esse hic dolores fugit adipisci pariatur commodi?
                </p>
            </div>
            <div class="box">
                <img src="images/eduLogo.png" alt="">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis repellat eius
                    , porro officia, aspernatur sapiente at animi temporibus hic dolore ipsa eum expedita alias a, labore suscipit incidunt sit quos?
                    Libero hic recusandae quibusdam provident quaerat laboriosam adipdipisci pariatur commodi?
                </p>
            </div>
            <div class="box">
                <img src="images/eduLogo.png" alt="">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis repellat eius
                    , porro officia, aspernatur sapiente at animem iste maiores esse hic dolores fugit adipisci pariatur commodi?
                </p>
            </div>
            <div class="box">
                <img src="images/eduLogo.png" alt="">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis repellat eius
                    , porro officia, aspernatur sapiente at anim pr dolor dolores iste ipsa? Rem iste maiores esse hic dolores fugit adipisci pariatur commodi?
                </p>
            </div>
        </div>
    </section>
    <!-- course section ends -->

    <!-- service section starts -->
    <section id="service">
        <h1 class="heading">what we offer?</h1>

        <div class="box-container">

            <div class="box" data-aos='flip-right'>
                <img src="images/edulogo.png" alt="">
                <div class="info">
                    <h2>skilled teachers</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum id, 
                        autem voficiis consectetur dolor nostrum tempore nesciunt similec earum deleniti ipsam praesentium dicta eveniet?</p>
                </div>
            </div>
            <div class="box" data-aos='flip-up'>
                <img src="images/edulogo.png" alt="">
                <div class="info">
                    <h2>24x7 hours service</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum id, 
                        autem voficiis consectetur dolor nostrum tempore nesciunt similec earum deleniti ipsam praesentium dicta eveniet?</p>
                </div>
            </div>
            <div class="box" data-aos='flip-down'>
                <img src="images/edulogo.png" alt="">
                <div class="info">
                    <h2>certificate distribution</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum id, 
                        autem voficiis consectetur dolor nostrum tempore nesciunt similec earum deleniti ipsam praesentium dicta eveniet?</p>
                </div>
            </div>

        </div>

    </section>
    <!-- service section ends -->

    <!-- testimonial section starts -->
    <section id="testimonial">
        <h1 class="heading">what our students say</h1>

        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <img src="images/back1.png" alt="">
                <div class="info">
                    <p><i class="fas fa-quote-left"></i>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore repellat laborum officia magnam dignissimos nostrum ab corrupti t
                    emporibus labore, cupiditate vitae ducimus nihil delectus pariatur soluta nisi, consequatur dicta perspiciatis.
                    <i class="fas fa-quote-right"></i></p>
                    <h2>--someone's name</h2>
                </div>
            </div>

            <div class="box" data-aos="fade-right">
                <img src="images/back1.png" alt="">
                <div class="info">
                    <p><i class="fas fa-quote-left"></i>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore repellat laborum officia magnam dignissimos nostrum ab corrupti t
                    emporibus labore, cupiditate vitae ducimus nihil delectus pariatur soluta nisi, consequatur dicta perspiciatis.
                    <i class="fas fa-quote-right"></i></p>
                    <h2>--someone's name</h2>
                </div>
            </div>

            <div class="box" data-aos="fade-down">
                <img src="images/back1.png" alt="">
                <div class="info">
                    <p><i class="fas fa-quote-left"></i>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore repellat laborum officia magnam dignissimos nostrum ab corrupti t
                    emporibus labore, cupiditate vitae ducimus nihil delectus pariatur soluta nisi, consequatur dicta perspiciatis.
                    <i class="fas fa-quote-right"></i></p>
                    <h2>--someone's name</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial section ends -->

    <!-- footer starts -->
    <section id="footer">
        <h1>&copy; copyright @ 2021 by <span>Maniac</span></h1>
    </section>
    <!-- footer ends -->

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
        delay:500
    });
  </script>
    <script src="js/mainPage.js"></script>
</body>

</html>