<div class="list-group">
    <a href="{{ url('') }}" class="list-group-item list-group-item-success">
        <span class="glyphicon glyphicon-home"></span> Головна сторінка
    </a>
</div>
<div class="list-group">
    <a href="{{ url('user') }}" class="list-group-item list-group-item-success{% if router.getControllerName() == 'user' %} active{% endif %}">
        <span class="glyphicon glyphicon-lock"></span> Користувачі
    </a>
    <a href="{{ url('place') }}" class="list-group-item list-group-item-success{% if router.getControllerName() == 'place' %} active{% endif %}">
        <span class="glyphicon glyphicon-globe"></span> Місця
    </a>
    <a href="{{ url('position') }}" class="list-group-item list-group-item-success{% if router.getControllerName() == 'position' %} active{% endif %}">
        <span class="glyphicon glyphicon-briefcase"></span> Посади
    </a>
    <a href="{{ url('person') }}" class="list-group-item list-group-item-success{% if router.getControllerName() == 'person' %} active{% endif %}">
        <span class="glyphicon glyphicon-user"></span> Особи
    </a>
    <a href="{{ url('phone') }}" class="list-group-item list-group-item-success{% if router.getControllerName() == 'phone' %} active{% endif %}">
        <span class="glyphicon glyphicon-phone-alt"></span> Телефони
    </a>
</div>