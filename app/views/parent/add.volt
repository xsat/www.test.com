<div class="panel panel-success">
    <div class="panel-heading">
        <h1 class="panel-title">{{ get_title()|striptags }}</h1>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" enctype="multipart/form-data" method="post">
            {{ form.messages() }}
            {% for name, item in form.getElements() %}
                <div class="form-group">
                    {{ form.label(name, ['class': 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
                        {{ form.render(name) }}
                        {{ form.message(name) }}
                    </div>
                </div>
            {% endfor %}
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {% if router.getActionName() == 'add' %}
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-plus"></span> Додати
                        </button>
                    {% else %}
                        <button type="submit" class="btn btn-warning ">
                            <span class="glyphicon glyphicon-pencil"></span> Оновити
                        </button>
                    {% endif %}
                    {{ form.additional() }}
                </div>
            </div>
        </form>
    </div>
</div>