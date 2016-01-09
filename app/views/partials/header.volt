{% if user is defined %}
    <a class="admin" href="{{ url('user') }}">
        Адмін панель
    </a>
{% endif %}

<div class="row header">
    <div class="col-md-12">
        <a class="logo" href="/">
            {{  image("img/logo.png") }}
        </a>
        <form class="search" action="{{ url('search')}}"  method="get">
            <input placeholder="Пошук..." name="s" type="text">
            <input id="search" value="Пошук" type="submit">
        </form>
        <ul class="list-inline header-menu">
            <li>
                <a href="#">
                    Катег 1
                </a>
            </li>
            <li>
                <a href="#">
                    Катег 1
                </a>
            </li>
            <li>
                {% if user is defined %}
                    <a class="active" href="{{ url('logout') }}">
                        Вийти
                    </a>
                {% else %}
                    <a class="active" href="{{ url('login') }}">
                        Зайти
                    </a>
                {% endif %}
            </li>
        </ul>
    </div>
</div>