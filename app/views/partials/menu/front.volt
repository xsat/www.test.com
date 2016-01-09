{% if places is defined %}
    <ul class="left-menu">
        {% for placeItem in places %}
            {{ partial('partials/menu/item') }}
        {% endfor %}
    </ul>
{% endif %}