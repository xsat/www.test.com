{% if pagination is defined and pagination %}
    <nav>
        <ul class="pagination pagination-sm">
            {% for item in pagination %}
                <li{% if item['active'] %} class="active"{% endif %}>
                    <a href="?page={{ item['page'] }}">
                        {{ item['name'] }}
                    </a>
                </li>
            {% endfor %}
            <li>
                <a href="javascript:void(0);">
                    Більше
                </a>
            </li>
        </ul>
    </nav>
{% endif %}