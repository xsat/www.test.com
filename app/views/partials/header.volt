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
            {% if user is defined %}
                <li>
                    <a href="{{ url('user') }}">
                        Адмін панель
                    </a>
                </li>
                <li>
                    <a href="{{ url('logout') }}">
                        Вийти
                    </a>
                <li>
            {% else %}
                <li>
                    <a href="#">
                        Катег 2
                    </a>
                </li>
                <li>
                    <a href="{{ url('login') }}">
                        Зайти
                    </a>
                <li>
            {% endif %}
        </ul>
    </div>
</div>