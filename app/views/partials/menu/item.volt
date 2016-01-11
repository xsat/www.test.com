<li {% if place.id is defined and placeItem.id == place.id %}class="active"{% endif %}>
    <a href="{{ url(placeItem.id) }}">
        {{ placeItem.name }}
    </a>
    {% if placeItem.places|length  %}
        <ul>
            {% for placeItem in placeItem.getPlacesOrder() %}
                {{ partial('partials/menu/item') }}
            {% endfor %}
        </ul>
    {% endif %}
</li>