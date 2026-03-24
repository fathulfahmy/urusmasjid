<!-- https://github.com/othneildrew/Best-README-Template -->

<a id="readme-top"></a>

<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![Apache License 2.0][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/fathulfahmy/urusmasjid">
    <img src="public/favicon.png" alt="Logo" width="80" height="80">
  </a>

<h3 align="center">Urus Masjid</h3>

  <p align="center">
    A platform to manage digital displays, record donations and spendings, and to track appliances service history and stock supply level.
    <br />
    <a href="https://github.com/fathulfahmy/urusmasjid"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/fathulfahmy/urusmasjid/issues/new?template=bug-report.yml">Report Bug</a>
    &middot;
    <a href="https://github.com/fathulfahmy/urusmasjid/issues/new?template=feature-request.yml">Request Feature</a>
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->

## About The Project

[![Product Name Screen Shot][product-screenshot]](https://urusmasjid.fathulfahmy.com)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built With

- [Laravel](https://laravel.com)
- [Livewire](https://livewire.laravel.com)
- [Filament](https://filamentphp.com)
- [Alpine.js](https://alpinejs.dev)
- [Tailwind CSS](https://tailwindcss.com)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->

## Getting Started

### Prerequisites

- [PHP](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/download/)
- [Node](https://nodejs.org/en/download)
- [NPM](https://nodejs.org/en/download)

### Installation

1. Clone the project repo

    ```sh
    git clone https://github.com/fathulfahmy/urusmasjid.git
    ```

2. Navigate to the project directory

    ```sh
    cd urusmasjid
    ```

3. Copy and update configuration

    ```
    cp .env.example .env
    vim .env
    # code .env (Visual Studio Code)
    ```

4. Install dependencies

    ```sh
    composer install
    npm install
    ```

5. Generate app key

    ```
    php artisan key:generate
    php artisan storage:link
    ```

6. Migrate database

    ```
    php artisan migrate --force
    php artisan db:seed --class=UserSeeder
    ```

7. Build app

    ```
    npm run build --force
    php artisan optimize:clear
    php artisan filament:clear
    php artisan optimize
    php artisan filament:optimize
    php artisan serve
    ```

8. Launch app
    - http://localhost:8000/admin  

    - http://localhost:8000/display  

    - http://localhost:8000/report  

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- USAGE EXAMPLES -->

## Usage

Admin: http://localhost:8000/admin  

Digital Display: http://localhost:8000/display  

Report: http://localhost:8000/report  

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTRIBUTING -->

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'feat: add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Top contributors:

<a href="https://github.com/fathulfahmy/urusmasjid/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=fathulfahmy/urusmasjid" alt="contrib.rocks image" />
</a>

<!-- LICENSE -->

## License

Distributed under the Apache License 2.0. See `LICENSE.md` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTACT -->

## Contact

Fathul Fahmy - [LinkedIn](https://linkedin.com/in/fathulfahmy) - fathulfahmy@protonmail.com

Project Link:

- [https://urusmasjid.fathulfahmy.com](https://urusmasjid.fathulfahmy.com)

- [https://github.com/fathulfahmy/urusmasjid](https://github.com/fathulfahmy/urusmasjid)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- ACKNOWLEDGMENTS -->

## Acknowledgments

- [Aladhan API](https://aladhan.com/prayer-times-api#get-/timingsByAddress/-date-)
- [Filament](https://filamentphp.com)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[contributors-shield]: https://img.shields.io/github/contributors/fathulfahmy/urusmasjid.svg?style=for-the-badge
[contributors-url]: https://github.com/fathulfahmy/urusmasjid/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/fathulfahmy/urusmasjid.svg?style=for-the-badge
[forks-url]: https://github.com/fathulfahmy/urusmasjid/network/members
[stars-shield]: https://img.shields.io/github/stars/fathulfahmy/urusmasjid.svg?style=for-the-badge
[stars-url]: https://github.com/fathulfahmy/urusmasjid/stargazers
[issues-shield]: https://img.shields.io/github/issues/fathulfahmy/urusmasjid.svg?style=for-the-badge
[issues-url]: https://github.com/fathulfahmy/urusmasjid/issues
[license-shield]: https://img.shields.io/github/license/fathulfahmy/urusmasjid.svg?style=for-the-badge
[license-url]: https://github.com/fathulfahmy/urusmasjid/blob/master/LICENSE.md
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/fathulfahmy
[product-screenshot]: public/images/admin.png
