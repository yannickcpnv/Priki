@props(['roles'])

<div class="navbar-item has-dropdown is-hoverable" data-target="roles-dropdown">
    <a class="navbar-link">
        Role
    </a>

    <div id="roles-dropdown" class="navbar-dropdown">
        @foreach ($roles as $role)
            <a class="navbar-item">
                {{ $role->name }}
            </a>
        @endforeach
    </div>
</div>
