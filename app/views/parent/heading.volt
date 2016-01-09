<div class="panel-heading">
    <div class="row">
        <div class="col-sm-6">
            <form action="{{ url(router.getControllerName()~'/search') }}"  method="get">
                <div class="input-group input-group-sm">
                    {{ form.render('s') }}
                    <span class="input-group-btn">
                        <a href="{{ url(router.getControllerName()) }}" class="btn btn-default">
                            <span class="glyphicon glyphicon-refresh"></span>
                        </a>
                        <button id="search" class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-sm-6 text-right">
            {% block heading_rigth %}
                <a href="{% if id %}{{ url(router.getControllerName()~'/add/'~id) }}{% else %}{{ url(router.getControllerName()~'/add') }}{% endif %}" class="btn btn-success btn-sm">
                    <span class="glyphicon glyphicon-plus"></span> Додати
                </a>
            {% endblock %}
        </div>
    </div>
</div>