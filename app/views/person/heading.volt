{% extends "parent/heading.volt" %}

{% block heading_rigth %}
    {% if (id and items|length == 0) or not id %}
        <a href="{{ url(router.getControllerName()~'/add/'~id) }}" class="btn btn-success btn-sm">
            <span class="glyphicon glyphicon-plus"></span> Додати
        </a>
    {% endif %}
{% endblock %}