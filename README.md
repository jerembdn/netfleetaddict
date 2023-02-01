<p align="center">
  <a href="https://www.needfor-school.com/">
      <picture>
        <source media="(prefers-color-scheme: dark)" srcset="https://www.needfor-school.com/wp-content/uploads/2021/09/logo_Need_For_School.jpg">
        <img src="https://www.needfor-school.com/wp-content/uploads/2021/09/logo_Need_For_School.jpg" width="128">
      </picture>
    <h1 align="center">
      Netfleet Addict
    </h1>
  </a>
</p>

<p align="center">
  <a aria-label="License" href="https://github.com/needforschool/kikoolol-server/blob/master/LICENSE" target="_blank">
    <img alt="" src="https://img.shields.io/npm/l/next.svg?style=for-the-badge&labelColor=000000">
  </a>
</p>

## Description

[Netfleet Addict](https://github.com/jerembdn/netfleetaddict) is a school project made for [Need For School](https://www.needfor-school.com/).

## Getting Started

### Prerequisites

For this project we installed:

	* Symfony 6.2
	* Apache 2.4.41
	* PHP 7.4.x
	* MariaDB Server (MySQL)


### Implementation Details

2) Using bundles: 	

       * DoctrineBundle
       * NelmioCorsBundle
       * FakerPHP/Faker
       * SerializerBundle
       * Symfony/Validator

### Installation

1. Clone the repo

```sh
git clone https://github.com/jerembdn/netfleetaddict
```

2. Install Composer packages

```sh
composer install
```

3. Create a .env.local file and set your database informations

```sh
DATABASE_URL=database_url
```

3. Initialize the database

```sh
php bin/console doctrine:database:create
```

```sh
// Verify migrations status by using :
// php bin/console doctrine:migrations:status

php bin/console doctrine:migrations:migrate
```

3.1. (Optional) Load fixtures

```sh
php bin/console doctrine:fixtures:load
```

4. Run the server

```sh
symfony server:start
```

## Contributing

Please see our [contributing rules](https://docs.onruntime.com/contributing/introduction).

## Authors

- Jérémy Baudrin ([@jerembdn](https://github.com/jerembdn))

## License

NetfleetAddict is [MIT licensed](LICENSE).