{% if breadcrumbs is defined %}
    <div class="breadcrumbs">
        <ul class="list-inline">
            {% for url, name in breadcrumbs %}
                <li>
                    <a href="{{ url }}">
                        {{ name }}
                    </a>
                </li>
                {% if not loop.last %}
                    <li>&#9658;</li>
                {% endif %}
            {% endfor %}
        </ul>
    </div>
{% endif %}