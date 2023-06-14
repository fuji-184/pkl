<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <script src="https://kit.fontawesome.com/7c8801c017.js" crossorigin="anonymous"></script>

    <!-- Roboto Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://assets.codepen.io/7773162/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">


      <link rel="stylesheet" href="./responsif.css" />
        
        
      <style>
      @media screen and (max-width: 767px) {
  #artikel {
    grid-template-columns: auto;
    margin: 0;
  }
  #pegawai{
    grid-template-columns: auto;
  }
}

@media screen and (min-width: 768px) {
  #artikel {
    grid-template-columns: auto auto auto;
    margin: 0 60px 0 60px;
  }
  #pegawai {
    grid-template-columns: auto auto;
  }
}

      
      
      .cari-pegawai input {
        background: black;
        color: white;
      }
      
      #pagination {
        margin-top: 60px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
      }
        
        .tombol2 {
          padding: 7px;
          background: black;
          border-radius: 12px;
          color: white;
        }
        
        .banner {
          background: blue;
        }
        
        .card-post {
          background: black;
          color: white;
          width: 200px;
          border-radius: 12px;
        }
        .judul-post {
          font-size: 21px;
          font-weight: 700;
          text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }
        
        .post-detail{
          padding: 20px;
        }
        
        .tombol-baca {
          padding: 8px;
          margin: 20px 0 20px 20px;
          border-radius: 12px;
        }
        .gambar-post {
          width: 100%;
          height: 100px;
          border-top-left-radius: 12px;
          border-top-right-radius: 12px;
          filter: brightness(7,0%);
        }
        #artikel {
          
          display: grid;
          
          gap: 30px;
          place-items: center;
        }
        
        /*
#pegawai {
  width: 100%;
  display: flex;
  justify-content: center;
  flex-direction: column;
  gap:30px;
}
*/
#pegawai {
  display: grid;
  
  grid-gap: 50px;
}
.pegawai-section {
  padding-top: 50px;
}
.pegawai-detail tr td {
  padding: 4px 7px;
}
.img-pegawai {
  width: 150px;
  height: 150px;
  border-radius: 12px;
}
.pegawai-card {
  display: flex;
  gap: 30px;
  margin: 0 auto;
}
 .cari-pegawai {
   display: flex;
   width: 100%;
   justify-content: center;
   margin-bottom: 60px;

 }
 .cari-pegawai input {
   width: 50%;
   padding: 10px;
   border-radius: 12px;
 }
.pagination-list, .pagination-post {
  width: 100%;
  display:flex;
  justify-content: center;
  margin-top: 30px;
  
}
.pagination-post {margin: 60px 0 30px 0}
.pagination-list li button {
  padding: 8px;
  border-radius: 12px;
  background: black;
  color: white;
}
.pagination-post li button {
  padding: 8px;
  border-radius: 12px;
  background: white;
  color: black;
}
.svg-jurusan {
  width: 50%;
}
.misi {
  margin: 0 20px 0 20px;
} 
.about__data {
  margin: 0 20px 0 20px;
}
.visi {
  text-align: center;
}
.misi {
  list-style-type: none;
}
.deskripsi-misi li {
  text-align: justify;
}
.chat {
  width: 100%;
  background-color: white;
  color: white;
  position: fixed;
  top: 0;
  bottom: 0;

 
}
.ketik-chat {background-color: #000000;}
.chat-header {background: linear-gradient(to bottom, hsl(281, 63%, 10%), #000000);}
.chat-header, .ketik-chat {
  width: 100%;
  
  color: white;
}

.chat-header {
  display: flex;
  justify-content: center;
  align-items: center;
}

.chat-header h2 {
  padding: 30px;
  text-align: center;
  font-size: 20px;
  font-weight: 600;
  line-height: 24px;
  color: white;
}

.tutup-chat {
  width: 31px;
  height: 31px;
  position: absolute;
  right: 30px;
  display: flex;
  justify-content: center;
  align-items: center;
  border: none;
  border-radius: 5px;
  font-weight: 600;
}

.ketik-chat {
  display: flex;
  padding: 30px;
  position: fixed;
  bottom: 0;
  gap: 10px;
}

.ketik-chat input {
  width: 100%;
  border: none;
  padding: 15px;
  border-radius: 10px;
}

.ketik-chat input:focus {
  outline: none;
}

.ketik-chat button {
  border-radius: 10px;
  padding: 15px;
  border: none;
  background-color: white;
  font-weight: 600;
}

.isi-chat {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column-reverse;
  overflow-y: scroll;
  padding-top: 65px;
  padding-bottom: 250px;
  background: #e1f0f8;
  background: -webkit-linear-gradient(to bottom, #F0F3FA, #FDF8E3);
  background: linear-gradient(to bottom, #F0F3FA, #defff7);
}

.isi-chat h3 {
  padding-bottom: 30px;
  font-size: 20px;
  font-weight: 600;
  line-height: 24px;
}
/* #17ca9c; */
.pesan {
  padding: 30px;
  border-radius: 10px;
  background-color: #000000;
  color: white;
  position: relative;
  bottom: 0;
  margin: 0 30px 20px 30px;
  border-radius: 10px;
}

.chat-container {
  display: flex;
  justify-content: center;
}

@media screen and (min-width: 769px){
  .chat, .ketik-chat {
    width: 100%;
  }
  .chat-container {
    justify-content: right;
  }
}
/* GOOGLE FONTS */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;900&display=swap");
/* VARIABLES CSS */
:root {
  --header-height: 3.5rem;
  /* Colors */
  --hue: 14;
  --first-color: hsl(var(--hue), 91%, 54%);
  --first-color-alt: hsl(var(--hue), 91%, 50%);
  --title-color: hsl(var(--hue), 4%, 100%);
  --text-color: hsl(var(--hue), 4%, 85%);
  --text-color-light: hsl(var(--hue), 4%, 55%);
  /*Red gradient*/
  --body-color: linear-gradient(
    90deg,
    hsl(338, 67%, 11%) 0%,
    hsl(281, 63%, 10%) 100%
  );
  --container-color: linear-gradient(
    136deg,
    hsl(338, 67%, 11%) 0%,
    hsl(281, 63%, 10%) 100%
  );
  --sub: #ff5b79;
  /* Font and typography */
  --body-font: "Poppins", sans-serif;
  --biggest-font-size: 2rem;
  --h1-font-size: 1.5rem;
  --h2-font-size: 1.25rem;
  --h3-font-size: 1rem;
  --normal-font-size: 0.938rem;
  --small-font-size: 0.813rem;
  --smaller-font-size: 0.75rem;
  /* Font weight */
  --font-medium: 500;
  --font-semi-bold: 600;
  --font-black: 900;
  /* Margenes Bottom */
  --mb-0-25: 0.25rem;
  --mb-0-5: 0.5rem;
  --mb-0-75: 0.75rem;
  --mb-1: 1rem;
  --mb-1-5: 1.5rem;
  --mb-2: 2rem;
  --mb-2-5: 2.5rem;
  /* z index */
  --z-tooltip: 10;
  --z-fixed: 100;
}
/* Responsive typography */
@media screen and (min-width: 992px) {
  :root {
    --biggest-font-size: 4rem;
    --h1-font-size: 2.25rem;
    --h2-font-size: 1.5rem;
    --h3-font-size: 1.25rem;
    --normal-font-size: 1rem;
    --small-font-size: 0.875rem;
    --smaller-font-size: 0.813rem;
  }
}
/* BASE */
* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}
html {
  scroll-behavior: smooth;
}
body {
  margin: var(--header-height) 0 0 0;
  font-family: var(--body-font);
  font-size: var(--normal-font-size);
  background: var(--body-color);
  color: var(--text-color);
  transition: 0.3s;
}
h1,
h2,
h3,
h4 {
  color: var(--title-color);
  font-weight: var(--font-semi-bold);
}
ul {
  list-style: none;
}
a {
  text-decoration: none;
}
img {
  max-width: 100%;
  height: auto;
}
button,
input {
  border: none;
  outline: none;
}
button {
  cursor: pointer;
  font-family: var(--body-font);
  font-size: var(--normal-font-size);
}
/* REUSABLE CSS CLASSES */
.section {
  padding: 4.5rem 0 2rem;
}
.section__title {
  font-size: var(--h2-font-size);
  margin-bottom: var(--mb-2);
  text-align: center;
}
/* LAYOUT */
.container {
  max-width: 968px;
  margin-left: var(--mb-1-5);
  margin-right: var(--mb-1-5);
}
.grid {
  display: grid;
}
.main {
  overflow: hidden; /*For animation*/
}
/* HEADER */
.header {
  width: 100%;
  background: var(--body-color);
  position: fixed;
  top: 0;
  left: 0;
  z-index: var(--z-fixed);
}
/* NAV */
.nav {
  height: var(--header-height);
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.nav__logo {
  display: flex;
  align-items: center;
  column-gap: 0.5rem;
  font-weight: var(--font-medium);
}
.nav__logo-img {
  width: 1.25rem;
}
.nav__link,
.nav__logo,
.nav__toggle,
.nav__close {
  color: var(--sub);
}
.nav__toggle {
  font-size: 1.25rem;
  cursor: pointer;
}
@media screen and (max-width: 767px) {
  .nav__menu {
    position: fixed;
    width: 100%;
    background: var(--container-color);
    top: -150%;
    left: 0;
    color: #F08080;
    padding: 3.5rem 0;
    transition: 0.4s;
    z-index: var(--z-fixed);
    border-radius: 0 0 1.5rem 1.5rem;
  }
}
.nav__img {
  width: 100px;
  position: absolute;
  top: 0;
  left: 0;
}
.nav__close {
  font-size: 1.8rem;
  position: absolute;
  top: 0.5rem;
  right: 0.7rem;
  cursor: pointer;
}
.nav__list {
  display: flex;
  flex-direction: column;
  align-items: center;
  row-gap: 1.5rem;
}
.nav__link {
  text-transform: uppercase;
  font-weight: var(--font-black);
  transition: 0.4s;
}
.nav__link:hover {
  color: var(--text-color);
}
/* Show menu */
.show-menu {
  top: 0;
}
/* Change background header */
.scroll-header {
  background: var(--container-color);
}
/* Active link */
.active-link {
  position: relative;
}
.active-link::before {
  content: "";
  position: absolute;
  bottom: -0.75rem;
  left: 45%;
  width: 5px;
  height: 5px;
  background-color: var(--sub);
  border-radius: 50%;
}
/* HOME */
.home__content {
  row-gap: 1rem;
}
.home__group {
  display: grid;
  position: relative;
  padding-top: 2rem;
}
.home__img {
  height: 250px;
  justify-self: center;
  margin-top: 20px;
}
.home__indicator {
  width: 8px;
  height: 8px;
  background-color: var(--title-color);
  border-radius: 50%;
  position: absolute;
  top: 7rem;
  right: 2rem;
}
.home__indicator::after {
  content: "";
  position: absolute;
  width: 1px;
  height: 48px;
  background-color: var(--title-color);
  top: -3rem;
  right: 45%;
}
.home__details-img {
  position: absolute;
  right: 0.5rem;
}
.home__details-title,
.home__details-subtitle {
  display: block;
  font-size: var(--small-font-size);
  text-align: right;
}
.home__subtitle {
  font-size: var(--h3-font-size);
  color: var(--sub);
  text-transform: uppercase;
  margin-bottom: var(--mb-1);
}
.pumpkin__subtitle {
  font-size: var(--h3-font-size);
  color: #ffffff;
  text-transform: uppercase;
  margin-bottom: var(--mb-1);
}
.home__title {
  font-size: var(--biggest-font-size);
  font-weight: var(--font-black);
  line-height: 109%;
  margin-bottom: var(--mb-1);
}
.home__description {
  margin-bottom: var(--mb-1);
}
.home__buttons {
  display: flex;
  justify-content: space-between;
}
/* Swiper Class */
.swiper-pagination {
  position: initial;
  margin-top: var(--mb-1);
}
.swiper-pagination-bullet {
  width: 5px;
  height: 5px;
  background-color: var(--title-color);
  opacity: 1;
}
.swiper-pagination-horizontal.swiper-pagination-bullets
  .swiper-pagination-bullet {
  margin: 0 0.5rem;
}
.swiper-pagination-bullet-active {
  width: 1.5rem;
  height: 5px;
  border-radius: 0.5rem;
}
/* BUTTONS */
.button {
  display: inline-block;
  background-color: var(--first-color);
  color: var(--sub);
  padding: 1rem 1.75rem;
  border-radius: 0.5rem;
  font-weight: var(--font-medium);
  transition: 0.3s;
}
.button:hover {
  background-color: var(--first-color-alt);
}

.button__icon {
  font-size: 1.25rem;
}
.book--now {
  display: inline-block;
  transition: 0.3s;
}
.book--now:hover {
  transform: scale(1.2);
}
.button--ghost {
  border: 2px solid;
  background-color: transparent;
  border-radius: 3rem;
  padding: 0.75rem 1.5rem;
}
.button--ghost:hover {
  background: none;
}
.button--link {
  color: var(--title-color);
}
.button--flex {
  display: inline-flex;
  align-items: center;
  column-gap: 0.5rem;
}
/* CATEGORY */
.category__container {
  grid-template-columns: repeat(2, 1fr);
  gap: 1rem 2rem;
}
.category__data {
  text-align: center;
}
.category__img {
  width: 120px;
  margin-bottom: var(--mb-0-75);
  transition: 0.3s;
}
.category__title {
  margin-bottom: var(--mb-0-25);
}
.category__data:hover .category__img {
  transform: translateY(-0.5rem);
}
/* ABOUT */
.about__container {
  row-gap: 2rem;
}
.about__data {
  text-align: center;
}
.about__description {
  margin-bottom: var(--mb-2);
}
.about__img {
  width: 200px;
  justify-self: center;
  animation: floating 2s ease-in-out infinite;
}
/* TRICK OR TREAT */
.trick__container {
  grid-template-columns: repeat(2, 1fr);
  gap: 1.5rem;
  padding-top: 1rem;
}
.trick__content {
  position: relative;
  background: var(--container-color);
  border-radius: 1rem;
  padding: 1.5rem 0 1rem 0;
  text-align: center;
  overflow: hidden;
}
.trick__img {
  width: 90px;
  transition: 0.3s;
}
.trick__subtitle,
.trick__price {
  display: block;
}
.trick__subtitle {
  font-size: var(--smaller-font-size);
  margin-bottom: var(--mb-0-5);
}
.trick__title,
.trick__price {
  color: var(--title-color);
  font-weight: var(--font-medium);
  font-size: var(--normal-font-size);
}
.trick__button {
  display: inline-flex;
  padding: 0.5rem;
  border-radius: 0.25rem 0.25rem 0.75rem 0.25rem;
  position: absolute;
  right: -3rem;
  bottom: 0;
}
.trick__icon {
  font-size: 1.25rem;
  color: var(--title-color);
}
.trick__content:hover .trick__img {
  transform: translateY(-0.5rem);
}
.trick__content:hover .trick__button {
  right: 0;
}
/* DISCOUNT */
.discount__container {
  background: var(--container-color);
  border-radius: 1rem;
  padding: 2.5rem 0 1.5rem;
  row-gap: 0.75rem;
}
.discount__data {
  text-align: center;
}
.discount__title {
  font-size: var(--h2-font-size);
  margin-bottom: var(--mb-2);
}
.discount__img {
  width: 200px;
  justify-self: center;
}
/* NEW ARRIVALS */
.new__container {
  padding-top: 1rem;
}
.new__img {
  width: 120px;
  margin-bottom: var(--mb-0-5);
  transition: 0.3s;
}
.new__content {
  position: relative;
  background: var(--container-color);
  width: 242px;
  padding: 2rem 0 1.5rem 0;
  border-radius: 0.75rem;
  text-align: center;
  overflow: hidden;
}
.new__tag {
  position: absolute;
  top: 8%;
  left: 8%;
}
.new__title {
  font-size: var(--normal-font-size);
  font-weight: var(--font-medium);
}
.new__subtitle {
  display: block;
  font-size: var(--small-font-size);
  margin-bottom: var(--mb-0-5);
}
.new__prices {
  display: inline-flex;
  align-items: center;
  column-gap: 0.5rem;
}
.new__price {
  font-weight: var(--font-medium);
  color: var(--title-color);
}
.new__discount {
  color: var(--first-color);
  font-size: var(--smaller-font-size);
  text-decoration: line-through;
  font-weight: var(--font-medium);
}
.new__button {
  display: inline-flex;
  padding: 0.5rem;
  border-radius: 0.25rem 0.25rem 0.75rem 0.25rem;
  position: absolute;
  bottom: 0;
  right: -3rem;
}
.new__icon {
  font-size: 1.25rem;
}
.new__content:hover .new__img {
  transform: translateY(-0.5rem);
}
.new__content:hover .new__button {
  right: 0;
}
/* NEWSLETTER */
.newsletter__description {
  text-align: center;
  margin-bottom: var(--mb-1-5);
}
.newsletter__form {
  background: var(--container-color);
  padding: 1rem;
  display: flex;
  justify-content: space-between;
  border-radius: 0.75rem;
}
.newsletter__input {
  width: 70%;
  padding: 0 0.5rem;
  background: none;
  color: var(--title-color);
}
.newsletter__input::placeholder {
  color: var(--text-color);
}
/* FOOTER */
.footer {
  position: relative;
  overflow: hidden;
}
.footer__img-one,
.footer__img-two {
  position: absolute;
  transition: 0.3s;
}
.footer__img-one {
  width: 100px;
  top: 6rem;
  right: -2rem;
}
.footer__img-two {
  width: 150px;
  bottom: 4rem;
  right: 4rem;
}
.footer__img-one:hover,
.footer__img-two:hover {
  transform: translateY(-0.5rem);
}
.footer__container {
  row-gap: 2rem;
}
.footer__logo {
  display: flex;
  align-items: center;
  column-gap: 0.5rem;
  margin-bottom: var(--mb-1);
  font-weight: var(--font-medium);
  color: var(--title-color);
}
.footer__logo-img {
  width: 20px;
}
.footer__description {
  margin-bottom: var(--mb-2-5);
}
.footer__social {
  display: flex;
  column-gap: 0.75rem;
}
.footer__social-link {
  display: inline-flex;
  background: var(--container-color);
  padding: 0.25rem;
  border-radius: 0.25rem;
  color: var(--title-color);
  font-size: 1rem;
}
.footer__social-link:hover {
  background: var(--body-color);
}
.footer__title {
  font-size: var(--h3-font-size);
  margin-bottom: var(--mb-1);
}
.footer__links {
  display: grid;
  row-gap: 0.35rem;
}
.footer__link {
  font-size: var(--small-font-size);
  color: var(--text-color);
  transition: 0.3s;
}
.footer__link:hover {
  color: var(--title-color);
}
.footer__copy {
  display: block;
  text-align: center;
  font-size: var(--smaller-font-size);
  margin-top: 4.5rem;
}
/* SCROLL UP */
.scrollup {
  position: fixed;
  background: var(--container-color);
  right: 1rem;
  bottom: -20%;
  display: inline-flex;
  padding: 0.3rem;
  border-radius: 0.25rem;
  z-index: var(--z-tooltip);
  opacity: 0.8;
  transition: 0.4s;
}
.scrollup__icon {
  font-size: 1.25rem;
  color: var(--title-color);
}
.scrollup:hover {
  background: var(--container-color);
  opacity: 1;
}
/* Show Scroll Up*/
.show-scroll {
  bottom: 3rem;
}
/* SCROLL BAR */
::-webkit-scrollbar {
  width: 0.6rem;
  background: #413e3e;
}
::-webkit-scrollbar-thumb {
  background: #272525;
  border-radius: 0.5rem;
}
/*  BREAKPOINTS */
/* For small devices */
@media screen and (max-width: 320px) {
  .container {
    margin-left: var(--mb-1);
    margin-right: var(--mb-1);
  }
  .home__img {
    height: 200px;
  }
  .home__buttons {
    flex-direction: column;
    width: max-content;
    row-gap: 1rem;
  }
  .category__container,
  .trick__container {
    grid-template-columns: 0.8fr;
    justify-content: center;
  }
}
/* For medium devices */
@media screen and (min-width: 576px) {
  .about__container {
    grid-template-columns: 0.8fr;
    justify-content: center;
  }
  .newsletter__container {
    display: grid;
    grid-template-columns: 0.7fr;
    justify-content: center;
  }
  .newsletter__description {
    padding: 0 3rem;
  }
}
@media screen and (min-width: 767px) {
  body {
    margin: 0;
  }

  .section {
    padding: 7rem 0 2rem;
  }
  .nav {
    height: calc(var(--header-height) + 1.5rem);
  }
  .nav__img,
  .nav__close,
  .nav__toggle {
    display: none;
  }
  .nav__list {
    flex-direction: row;
    column-gap: 3rem;
  }
  .nav__link {
    text-transform: initial;
    font-weight: initial;
  }
  .home__content {
    padding: 8rem 0 2rem;
    grid-template-columns: repeat(2, 1fr);
    gap: 4rem;
  }
  .home__img {
    height: 300px;
  }
  .swiper-pagination {
    margin-top: var(--mb-2);
  }

  .category__container {
    grid-template-columns: repeat(3, 200px);
    justify-content: center;
  }

  .about__container {
    grid-template-columns: repeat(2, 1fr);
    align-items: center;
  }
  .about__title,
  .about__data {
    text-align: initial;
  }
  .about__img {
    width: 250px;
  }
  .jurusan {
    grid-template-columns: repeat(2, 200px);
    justify-content: center;
    gap: 2rem;
  }
  .trick__container {
    grid-template-columns: repeat(3, 200px);
    justify-content: center;
    gap: 2rem;
  }
  .discount__container {
    grid-template-columns: repeat(2, max-content);
    justify-content: center;
    align-items: center;
    column-gap: 3rem;
    padding: 3rem 0;
    border-radius: 3rem;
  }
  .discount__img {
    width: 350px;
    order: -1;
  }
  .discount__data {
    padding-right: 6rem;
  }
  .newsletter__container {
    grid-template-columns: 0.5fr;
  }
  .footer__container {
    grid-template-columns: repeat(4, 1fr);
    justify-items: center;
    column-gap: 1rem;
  }
  .footer__img-two {
    right: initial;
    bottom: 0;
    left: 15%;
  }
}
/* For large devices */
@media screen and (min-width: 992px) {
  .container {
    margin-left: auto;
    margin-right: auto;
  }
  .section__title {
    font-size: var(--h1-font-size);
    margin-bottom: 3rem;
  }
  .home__content {
    padding-top: 9rem;
    gap: 3rem;
  }
  .home__group {
    padding-top: 0;
  }
  .home__img {
    height: 400px;
    transform: translateY(-3rem);
  }
  .home__indicator {
    top: initial;
    right: initial;
    bottom: 15%;
    left: 45%;
  }
  .home__indicator::after {
    top: 0;
    height: 75px;
  }
  .home__details-img {
    bottom: 0;
    right: 58%;
  }
  .home__title {
    margin-bottom: var(--mb-1-5);
  }
  .home__description {
    margin-bottom: var(--mb-2-5);
    padding-right: 2rem;
  }
  .category__container {
    column-gap: 8rem;
  }
  .category__img {
    width: 200px;
  }
  .about__container {
    column-gap: 7rem;
  }
  .about__img {
    width: 350px;
  }
  .about__description {
    padding-right: 2rem;
  }
  .trick__container {
    gap: 3.5rem;
  }
  .trick__content {
    border-radius: 1.5rem;
  }
  .trick__img {
    width: 110px;
  }
  .trick__title {
    font-size: var(--h3-font-size);
  }
  .discount__container {
    column-gap: 7rem;
  }
  .new__content {
    width: 310px;
    border-radius: 1rem;
    padding: 2rem 0;
  }
  .new__img {
    width: 150px;
  }
  .new__img,
  .new__subtitle {
    margin-bottom: var(--mb-1);
  }
  .new__title {
    font-size: var(--h3-font-size);
  }
  .footer__copy {
    margin-top: 6rem;
  }
}
@media screen and (min-width: 1200px) {
  .home__img {
    height: 420px;
  }
  .swiper-pagination {
    margin-top: var(--mb-2-5);
  }
  .footer__img-one {
    width: 120px;
  }
  .footer__img-two {
    width: 180px;
    top: 30%;
    left: -3%;
  }
}
/* KEYFRAMES */
@keyframes floating {
  0% {
    transform: translate(0, 0px);
  }
  50% {
    transform: translate(0, 15px);
  }
  100% {
    transform: translate(0, -0px);
  }
}
.skull-blur {
  position: absolute;
  width: 680px;
  height: 632px;
  left: -79px;
  top: 75%;
  background: linear-gradient(
    142.97deg,
    rgba(0, 255, 133, 0.3) 17.43%,
    rgba(63, 239, 60, 0.22) 73.23%
  );
  filter: blur(157.708px);
}
.main-container {padding: 150px 0 30px 0}
        </style>

    </head>
    <body>
        @include('components.nav-user')
              
               <div class="main-container"> {{ $slot }}
                </div>
          
            
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/4.0.9/scrollreveal.min.js"></script>
        

<script>
  /* SHOW MENU */
const navMenu = document.getElementById("nav-menu"),
  navToggle = document.getElementById("nav-toggle"),
  navClose = document.getElementById("nav-close");

/* MENU SHOW */
/* Validate if constant exists */
if (navToggle) {
  navToggle.addEventListener("click", () => {
    navMenu.classList.add("show-menu");
  });
}

/* MENU HIDDEN */
/* Validate if constant exists */
if (navClose) {
  navClose.addEventListener("click", () => {
    navMenu.classList.remove("show-menu");
  });
}

/* REMOVE MENU MOBILE */
const navLink = document.querySelectorAll(".nav__link");

function linkAction() {
  const navMenu = document.getElementById("nav-menu");
  // When we click on each nav__link, we remove the show-menu class
  navMenu.classList.remove("show-menu");
}
navLink.forEach((n) => n.addEventListener("click", linkAction));

/* HOME SWIPER */
let homeSwiper = new Swiper(".home-swiper", {
  spaceBetween: 30,
  loop: "true",

  pagination: {
    el: ".swiper-pagination",
    clickable: true
  }
});

/* change body's background color */

let root = document.documentElement;

homeSwiper.on("transitionEnd", function (e) {
  if (this.activeIndex == 1) {
    root.style.setProperty(
      "--body-color",
      "linear-gradient(to right, #2E0916, #200A2B)"
    );
    root.style.setProperty("--sub", "#ff5b79");
    root.style.setProperty("--title-color", "#ffffff");
    root.style.setProperty(
      "--container-color",
      "linear-gradient(136deg, #2E0916, #200A2B)"
    );
  }
  if (this.activeIndex == 2) {
    root.style.setProperty(
      "--body-color",
      "linear-gradient(to right, #E8CAFB, #6A4FB6)"
    );
    root.style.setProperty("--sub", "#303056");
    root.style.setProperty("--title-color", "#303056");
    root.style.setProperty(
      "--container-color",
      "linear-gradient(136deg, #E8CAFB, #6A4FB6)"
    );
  }
  if (this.activeIndex == 3) {
    root.style.setProperty(
      "--body-color",
      "linear-gradient(to right, #5B874B, #0C3720)"
    );
    root.style.setProperty("--sub", "#ffffff");
    root.style.setProperty("--title-color", "#ffffff");
    root.style.setProperty(
      "--container-color",
      "linear-gradient(136deg, #5B874B, #0C3720)"
    );
  }
});
/* CHANGE BACKGROUND HEADER */
function scrollHeader() {
  const header = document.getElementById("header");
  // When the scroll is greater than 50 viewport height, add the scroll-header class to the header tag
  if (this.scrollY >= 50) header.classList.add("scroll-header");
  else header.classList.remove("scroll-header");
}
window.addEventListener("scroll", scrollHeader);

/* NEW SWIPER */
let newSwiper = new Swiper(".new-swiper", {
  centeredSlides: true,
  slidesPerView: "auto",
  loop: "true",
  spaceBetween: 16
});

/* SCROLL SECTIONS ACTIVE LINK */
const sections = document.querySelectorAll("section[id]");

function scrollActive() {
  const scrollY = window.pageYOffset;

  sections.forEach((current) => {
    const sectionHeight = current.offsetHeight,
      sectionTop = current.offsetTop - 58,
      sectionId = current.getAttribute("id");

    if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
      document
        .querySelector(".nav__menu a[href*=" + sectionId + "]")
        .classList.add("active-link");
    } else {
      document
        .querySelector(".nav__menu a[href*=" + sectionId + "]")
        .classList.remove("active-link");
    }
  });
}
window.addEventListener("scroll", scrollActive);

/* SHOW SCROLL UP */
function scrollUp() {
  const scrollUp = document.getElementById("scroll-up");
  // When the scroll is higher than 460 viewport height, add the show-scroll class to the a tag with the scroll-top class
  if (this.scrollY >= 460) scrollUp.classList.add("show-scroll");
  else scrollUp.classList.remove("show-scroll");
}
window.addEventListener("scroll", scrollUp);

/* SCROLL REVEAL ANIMATION */
const sr = ScrollReveal({
  origin: "top",
  distance: "60px",
  duration: 2500,
  delay: 400
  // reset: true
});

sr.reveal(`.home-swiper, .new-swiper, .newsletter__container`);
sr.reveal(`.category__data, .trick__content, .footer__content`, {
  interval: 100
});
sr.reveal(`.about__data, .discount__img`, { origin: "left" });
sr.reveal(`.about__img, .discount__data`, { origin: "right" });

</script>
      
    </body>
</html>