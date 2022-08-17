<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About

### Feature

1. Set `timezone` using key in `.env` file.
1. Set login attempt max `3 times` and wait for `5 minutes` to retry.
1. Filament relation manager.
1. Filament employees widget.
1. Api get for employees.

### Boilerplate

-   Install `Laravel v9.24.0` on `PHP v8.1.9`.
-   Install `breeze`.
-   Install `Laravel Debugbar`.
-   Install `Filament Admin v2`

### Model, Migration and Relationship

-   Country model, has many states, has many employees.
-   State model, belongs to country, has many cities, employees.
-   City model, belongs to state, has many employees.
-   Department model, has many employees.
-   Employee model, belongs to country, state, city and department.

### Filament Resources

-   Country resource. CRUD, sortable, searchable and custom per page selections.
-   State resource. CRUD, sortable, searchable and custom per page selections.
-   City resource. CRUD, sortable, searchable and custom per page selections.
-   Department resource. CRUD, sortable, searchable and custom per page selections.
-   Employee resource. CRUD, sortable, searchable and custom per page selections.
-   User resource. CRUD, sortable, searchable and custom per page selections.

    -   Dependant options country to states to cities.
    -   Dehydrated options name, title to Str::title()
    -   Dehydrated options code in country to Str::upper()
    -   Dehydrated options email in employee to Str::lower()

### Filament Navigation

-   Add Navigation Group.
-   Add Icons to navigation.

### Filament Widget

-   Add Employee Widget

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
